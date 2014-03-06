<?php 
namespace App\Models\Services;

use App\Models\Services\Exceptions;

abstract class Services
{
    public static function getService($name)
    {
    	$className = "\\App\\Models\\Services\\Service\\{$name}";
		
        if ( ! class_exists($className)) {
            throw new Exceptions\InvalidServiceException("Class {$className} doesn't exists.");
        }
        
        return new $className();
    }
	
	
	
	
	
	
	/**
	 * Response template for ModelExeception throwned inside Respositories
	 * */	
	public function handleModelExeception(\Exception $e) 
	{
		$response = array(
			'status' => 'error',
			'message' => array(),
		);
		foreach($e->_messages as $m){
			$response['message'][] = str_replace("'",'',$m->getType().' - '.$m->getField().' - '.$m->getMessage());
		}
		return $response;
	}
}
