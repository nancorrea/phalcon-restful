<?php
namespace App\Modules\Api;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    /**
     * Registers the module auto-loader
     */
    public function registerAutoloaders()
    {
    	$config = include __DIR__ . "/../../config/constants.php";
        $loader = new Loader();
		

        $loader->registerNamespaces(array(
            'App\Modules\Api\Controllers' 	   => __DIR__ . '/controllers/',
            'App\Library' 	   				   => __DIR__ . '/../library/',
            'App\Models\Entities' 			   => $config->application->modelsEntitiesDir,
            'App\Models\Services' 			   => $config->application->modelsServicesDir,
            'App\Models\Repositories' 		   => $config->application->modelsRepositoriesDir
        ));

        $loader->register();
    }

    /**
     * Registers the module-only services
     *
     * @param Phalcon\DI $di
     */
	public function registerServices($di)
    {
		$config = include __DIR__ . "/../../config/constants.php";
		
		//Redefining Dispatcher
		$di['dispatcher'] = function() {
			$dispatcher = new \Phalcon\Mvc\Dispatcher();
			$dispatcher->setDefaultNamespace("App\Modules\Api\Controllers");
			return $dispatcher;
		};

        //Setting UP View component
        $di['view'] = function () {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/views/');
            return $view;
        };
		
		//Databse Connection
        $di['db'] = function () use ($config) {
            return new DbAdapter(array(
                "host" 		=> $config->database->host,
                "username" 	=> $config->database->username,
                "password" 	=> $config->database->password,
                "dbname" 	=> $config->database->dbname,
            ));
        };
    }
}
