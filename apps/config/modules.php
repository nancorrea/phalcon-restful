<?php
/**
 * Register application modules
 */
$application->registerModules(array(

    'frontend' => array(
        'className' => 'App\Modules\Frontend\Module',
        'path' => __DIR__ . '/../modules/frontend/Module.php'
    ), 
    'api' => array(
        'className' => 'App\Modules\Api\Module',
        'path' => __DIR__ . '/../modules/api/Module.php'
    )
));
