<?php
namespace App\Models\Services\Service;

use App\Models\Repositories\Repositories;
use \App\Models\Services\Services as Services;

class Galeria extends Services
{
	/**
	 * gets all records
	 * */
	public function getAll()
	{
		$results = Repositories::getRepository('Galeria')->getAll();
		
		$data = array();
		foreach( $results as $r ) {
			$data[] = array_merge(
				$r->toArray(),
				array('images' => $r->GaleriaFoto->toArray())
			);
		}
		
		return $data;
	}
	
	/**
	 * gets unique record
	 * */
	 public function getById($id)
	 {
		//@TODO
	 }
	
	/**
	 * inserts a record
	 * */	
	public function save($data)
	{
		if(!empty($data)) {
			try{
				$Galeria = Repositories::getRepository('Galeria')->save($data);
				$data = $Galeria->toArray();
				$data['images'] = $Galeria->GaleriaFoto->toArray();

				$response = array(
					'status' => 'success',
					'message' => sprintf("Galeria added with success, ID: %s.", $Galeria->cd_galeria),
					'data'	 => array($data),
				);
			} catch ( \App\Models\Repositories\Exceptions\ModelException $e ) {
				$response = $this->handleModelExeception($e);
			}	
		} else $response = array(
			'status' => 'error',
			'message' => 'Your request reached with no data.'
		);

		return $response;
	}
	
	/**
	 * updates a record
	 * */	
	public function update($data, $id)
	{
		//@TODO
	}
	
	/**
	 * deletes a record
	 * */
	 public function delete($id) 
	 {
		//@TODO
	 }
}
