<?php 
namespace App\Models\Repositories;

use App\Models\Repositories\Exceptions;

abstract class Repositories
{
    public static function getRepository($name)
    {
    	$className = "\\App\\Models\\Repositories\\Repository\\{$name}";
		
        if ( ! class_exists($className)) {
            throw new Exceptions\InvalidRepositoryException("Repository {$className} doesn't exists.");
        }
        
        return new $className();
    }
	
	
	
	
	
	
	/**
	 * Throw Model Exeception
	 * */
	public static function throwModelExeception($messages) 
	{
		$e = new \App\Models\Repositories\Exceptions\ModelException();
		$e->_messages = $messages;
		throw $e;
	} 
}
