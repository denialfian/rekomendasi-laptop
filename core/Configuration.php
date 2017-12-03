<?php

session_start();

// Database 
$GLOBALS['config']['mysql']['host'] 		= "localhost";
$GLOBALS['config']['mysql']['username'] 	= "root";
$GLOBALS['config']['mysql']['password'] 	= "";
$GLOBALS['config']['mysql']['db'] 			= "srl_data_test";

// session dan token
$GLOBALS['config']['session']['user_session'] 	= "user";
$GLOBALS['config']['token']['token_name'] 		= "token";

// url
$root  = "http://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
$GLOBALS['config']['url']['base_url'] 	= $root;