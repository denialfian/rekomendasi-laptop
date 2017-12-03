<?php

class Validation{
	private $_passed = false;
    private $_errors = array();
    private $_db = null;

    public $_file = array();

    public function __construct(){
    	$this->_db = new DB();
    }

    public function check($source, $items = array()){
    	foreach ($items as $item => $rules) {
    		foreach ($rules as $rule => $rule_value) {
    			$value = $source[$item];
    			
    			if($rule === 'required' && empty($value)) {
                    $this->addError("{$item} is required");
                }else if(!empty($value)){
                	switch ($rule) {
                		case 'min':
                            if(strlen($value) < $rule_value) {
                                $this->addError("{$item} must be a minimum of {$rule_value} characters.");
                            }
                            break;

                        case 'email':
                            if(!filter_var($value,FILTER_VALIDATE_EMAIL)){
                                $this->addError("{$item} must be a email.");
                            }
                            break;

                        case 'url':
                            if(!filter_var($value,FILTER_VALIDATE_URL)){
                                $this->addError("{$item} must be a url.");
                            }
                            break;
                		
                		case 'max':
                            if(strlen($value) > $rule_value) {
                                $this->addError("{$item} must be a maximum of {$rule_value} characters.");
                            }
                            break;

                       	case 'matches':
                            if($value != $source[$rule_value]) {
                                $this->addError("{$rule_value} must match {$item}.");
                            }
                            break;

                       	case 'unique':
                            $check = $this->_db->table($rule_value)->where($item, '=', $value);

                            if($check->count()) {
                                $this->addError("{$item} already exists.");
                            }
                            break;
                		
                	}
                }

    		}
    	}

    	if (empty($this->_errors)) {
    		$this->_passed = true;
    	}

    	return $this;
    }

    public function uploadFile($file_field = null, $check_image = false, $random_name = false, $paths = "upload/"){
        //Config Section    
        //Set file upload path
        $path = $paths; //with trailing slash
        //Set max file size in bytes
        $max_size = 1000000;
        //Set default file extension whitelist
        $whitelist_ext = array('jpg','png','gif');
        //Set default file type whitelist
        $whitelist_type = array('image/jpeg', 'image/png','image/gif');

        //The Validation
                       
        if (!$file_field) {
            $this->addError("Please specify a valid form field name");           
        }

        if (!$path) {
            $this->addError("Please specify a valid upload path");               
        }
               
        if (empty($this->_errors)) {
            $this->_passed = true;
        }

        //Make sure that there is a file
        if((!empty($_FILES[$file_field])) && ($_FILES[$file_field]['error'] == 0)) {
         
            // Get filename
            $file_info = pathinfo($_FILES[$file_field]['name']);
            $name = $file_info['filename'];
            $ext = $file_info['extension'];
               
            //Check file has the right extension           
            if (!in_array($ext, $whitelist_ext)) {
                $this->addError("Invalid file Extension");
            }
                       
            //Check that the file is of the right type
            if (!in_array($_FILES[$file_field]["type"], $whitelist_type)) {
                $this->addError("Invalid file Type");
            }
                       
            //Check that the file is not too big
            if ($_FILES[$file_field]["size"] > $max_size) {
                $this->addError("File is too big");
            }
                       
            //If $check image is set as true
            if ($check_image) {
                if (!getimagesize($_FILES[$file_field]['tmp_name'])) {
                    $this->addError("Uploaded file is not a valid image");
                }
            }

            //Create full filename including path
            if ($random_name) {
                // Generate random filename
                $tmp = str_replace(array('.',' '), array('',''), microtime());
                               
                if (!$tmp || $tmp == '') {
                    $this->addError("File must have a name");
                }     
                $newname = $tmp.'.'.$ext;     
            }else{
                $newname = $name.'.'.$ext;
            }
               
            //Check if file already exists on server
            if (file_exists($path.$newname)) {
                $this->addError("A file with this name already exists");
            }

            if (empty($this->_errors)) {
                $this->_passed = true;
            } 

            if (move_uploaded_file($_FILES[$file_field]['tmp_name'], $path.$newname)) {
                //Success
                $this->_file['filepath'] = $path;
                $this->_file['filename'] = $newname;
                //return $out;
            }else {
                $this->addError("Server Error!");
            }
         
        }else{
            $this->addError("No file uploaded");
            if (empty($this->_errors)) {
                $this->_passed = true;
            }
        }   
        return $this;   
    }

    private function addError($error) {
        $this->_errors[] = $error;
    }

    public function errors() {
        return $this->_errors;
    }

    public function passed() {
        return $this->_passed;
    }




}