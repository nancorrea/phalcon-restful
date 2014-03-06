<?php
return new \Phalcon\Config(array(
    
    'database' => array(
        'adapter'  	=> 'Mysql',
        'host'     	=> 'localhost',
        'username' 	=> 'root',
        'password' 	=> 'root',
        'dbname'    => 'rest',
    ),
    
    'application' => array(
    	/**
		 * DIRECTORIES
		 * */
        'modelsEntitiesDir' 	=> __DIR__ . '/../models/entities/',
        'modelsServicesDir' 	=> __DIR__ . '/../models/services/',
        'modelsRepositoriesDir'	=> __DIR__ . '/../models/repositories/',
        'libraryDir' 			=> __DIR__ . '/../library/', 
    	
    	/**
		 * APPLICATION VARS
		 * */
    	'baseUri' 		=> 	'/'
    ),
));