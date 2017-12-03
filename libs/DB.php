<?php
/**
DATABASE CLASS PDO

cara pake : 
        // CRUD

        // select
            //$select   = $db->table("users")->select();
            //$select2  = $db->table("users")->select(['email',"id"]);  
        // where 
            //$where    = $db->table("users")->where("password","=","password")->select();
            //$where2 = $db->table("users")->where("password","=","password")->where("id","=",4)->select();
            //$where3 = $db->table("users")->where("password","=","password")->where("id","=",4)->select(['email',"id"]);
        // like
            //$like = $db->table("users")->likeWhere("email","test")->select();
        // first row
            //$first    = $db->table("users")->first();
            //$first2   = $db->table("users")->where("password","=","password")->first();
        // find default kolom id
            // ganti kolom $db->setIdColumn("email");
            //$find = $db->table("users")->find(4);
        // count
            //$count    = $db->table("users")->count();
            //$count2 = $db->table("users")->where("password","=","password")->count();


        // insert
            $insert = $db->table("users")->insert([
                "username" => "deni",
                "password" => "password",
            ]);

        // update
            $update = $db->table('users')->where("id","=",1)->update([
                "username" => "deni",
                "password" => "password",
            ]); 

        // delete 
            $delete = $db->table("users")->where("id","=",1)->delete();
*/
class DB
{
	private static $_instance = null;

    private 
            $_query = "",
            $_count,
            $_error = false,
            $_where = "WHERE",
            $_sql,
            $_value;

    protected 
            $_pdo,
            $_table,
            $_results,
            $_idColumn = "id";

	public function __construct(){
		 // Set DSN
        $dsn = 'mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db');

        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );

         // Create a new PDO instanace
        try{
            $this->_pdo = new PDO($dsn, Config::get('mysql/username'), Config::get('mysql/password'), $options);
        }
        // Catch any errors
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
	}

	public static function getInstance() {
        if(!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function query($sql, $params = []){
        $this->_query = "";
        $this->_where = "WHERE";

        $this->_error = false;
        $this->_table = $params;
        $query = $this->_pdo->prepare($sql);
        if(count($params)) {
            $x = 1;
            foreach($params as $param) {

                if (is_int($param)) {
                    $type = PDO::PARAM_INT;
                }else if (is_bool($param)) {
                    $type = PDO::PARAM_BOOL;
                }else if (is_null($param)) {
                    $type = PDO::PARAM_NULL;
                }else{
                    $type = PDO::PARAM_STR;
                }

                $query->bindValue($x, $param, $type);
                $x++;
            }
        }

        if($query->execute()){
            try
            {
                $this->_results = $query->fetchAll(PDO::FETCH_OBJ);
            }
            catch (\PDOException $e) {}
            
            $this->_sql = $query;
            $this->_count = $query->rowCount();
        }else{
            $this->_error = true;
        }

        return $this;
    }

    public function select($fields = ['*']){
        if($fields != ['*'] && !is_null($this->_idColumn)){
            if(!in_array($this->_idColumn, $fields))
            {
                $fields[$this->_idColumn];
            }
        }

        $sql = "SELECT " . implode(', ', $fields)
            . " FROM {$this->_table} {$this->_query}";

        $this->_query = $sql;
        $value = $this->_value;
        $this->_value = null;

        return $this->query($sql,$value)->results();
    }

    public function insert($values = []){
        if(count($values)) {

            $fields = array_keys($values);

            $value = '';

            $x = 1;
            foreach($values as $field => $v) {
                $value .="?";
                if($x < count($values)) {
                    $value .= ", ";
                }
                $values[$field] = $this->escape($v);
                $x++;
            }

            $sql = "INSERT INTO {$this->_table} (`" . implode('`,`', $fields) ."`)";
            $sql .= " VALUES({$value})";
            // check if query is not have an error
            if(!$this->query($sql, $values)->error()) {
                return true;
            }
        }

        return false;
    }

    public function update($values = []){
        $set = ''; // initialize $set
        $x = 1;
        foreach($values as $i => $row) {
            $set .= "{$i} = ?";
            if($x < count($values)) {
                $set .= " ,";
            }
            $x++;
        }

        $sql = "UPDATE {$this->_table} SET {$set} " . $this->_query;

        $whereValue = $this->_value;
        foreach ($whereValue as $field => $value) {
            $values[$field] = $this->escape($value);
        }

        if(!$this->query($sql, $values)->error()) {
            return true;
        }

        return $values;
    }

    public function delete(){

        $sql = "DELETE FROM $this->_table " . $this->_query;

        $values = $this->_value;
        foreach ($values as $field => $value) {
            $v[$field] = $this->escape($value);
        }
        return $this->query($sql,$v);
    }

    public function where($field, $operator, $value = false){
        $values = $this->escape($value);
        $value = '?';

        $this->_query .= " $this->_where $field $operator $value";
        $this->_where = "AND";
        $this->_value[$field] = $values; 
        return $this;
    }

    public function likeWhere($field, $value){
        $value = $this->escape($value);
        $this->_query .= " $this->_where $field LIKE '%$value%'";
        $this->_where = "AND";
        return $this;
    }

    public function table($table){
        $this->_table = $table;
        return $this;
    }

    public function first(){
        $results = $this->select();
        // $results = $results['results'];

        if(count((array)$results)){
            return $results[0];
        }

        return [];
    }

    public function count(){
        $results = $this->select();
        return count($results);
    }

    public function count2(){
        return $this->_count;
    }

    public function setIdColumn($colId = "id"){
        $this->_idColumn = $colId;
        return $this;
    }

    public function find($id){
        return $result = $this->where($this->_idColumn, "=", $this->escape($id))->first();
    }

    public function results(){
        return $this->_results;
    }

    public function error(){
        return $this->_error;
    }

    public function escape($string) {
        return htmlentities($string, ENT_QUOTES, 'UTF-8');
    }

    public function clearQuery(){
        return $this->_query = "";
    }




}