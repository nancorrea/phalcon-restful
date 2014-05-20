<?php
namespace App\Modules\Frontend\Controllers;

use \App\Models\Services\Services as Services;
use Phalcon\Mvc\Controller;

class UserController extends Controller
{
	public function indexAction()
	{
		$this->response->redirect('user/get');
		/*
		 * Backend example call
		 *
		 * *
		$options = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'GET',
		    ),
		);
		$context  = stream_context_create($options);
		$result = file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/api/crud/user', false, $context);
		
		header('Content-Type: application/json');
		echo $result;
		exit;*/
	}
	public function getAction() {
	}
	public function postAction() {
	}
	public function putAction() {
	}
	public function deleteAction() {
	}
}

