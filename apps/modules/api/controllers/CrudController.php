<?php
namespace App\Modules\Api\Controllers;

use Phalcon\Mvc\Controller;
use \App\Models\Services\Services as Services;

/**
 * CRUD DISPATH CLASS
 * 
 * everything that rides in with the uri://api/crud prefix come to here.
 * (defined on app/config/routes.php)
 * 
 * the main goal of this controller is to dispatch the services
 * reading the client's http header request.
 * 
 * As we have delete, update and insert actions to continue the development
 * of futures funtionalities using this arch in a project
 * you should make this Module::Controller pass through a ACL logic.  
 * 
 * <!-- important -->
 * Regarding that into the Service Layers Pattern used in this arch 
 * all bussiness logic must go inside the Services controllers,
 * and the communication with databases at the Repositories controllers.
 * 
 * 
 * @author Renan Corrêa Pinto - github.com/nancorrea
 * */
class CrudController extends Controller
{
	/**
	 * @var string
	 * */
	protected $_method;
	/**
	 * @var string
	 * */
	protected $_model;
	/**
	 * @var id
	 * */
	protected $_id;
	
	
	/**
	 * dispatch rest
	 * */
    public function indexAction($model, $id = null)
    {
    	$this->_method = $this->request->getMethod();	
    	$this->_model  = \Util::camelize($model);
		$this->_id     = $id;
		
		/**
		 * parsing content of request
		 * */
		parse_str($this->request->getRawBody(), $input);
		
		$response = array();
		
		switch($this->_method) {
			case 'GET':
				if(!empty($id)) {
					if(is_numeric($id)) {
						$response = Services::getService($this->_model)->getById($id);						
					} else {
						switch($id) {
							/**
							 * @TODO
							 * */
							case 'search':
								$response = Services::getService($this->_model)->search($input);
							break;
						}
					}
				} else {
					$response = Services::getService($this->_model)->getAll();	
				}
			break;
			case 'POST':
				$response = Services::getService($this->_model)->save($input);
			break;	
			case 'PUT':
				$response = Services::getService($this->_model)->update($input, $id);
			break;
			case 'DELETE':
				$response = Services::getService($this->_model)->delete($id);
			break;
		} 
		
		echo json_encode(\Util::prepareJson($response));
	}

}
