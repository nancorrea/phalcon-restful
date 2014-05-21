<?php
namespace App\Modules\Frontend\Controllers;

use Phalcon\Mvc\Controller;
class IndexController extends Controller
{
	public function indexAction() 
	{
		$this->response->redirect('galeria/');	
	}
}