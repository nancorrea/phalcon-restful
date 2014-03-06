<?php
namespace App\Models\Services\Service;

use App\Models\Repositories\Repositories;
use \App\Models\Services\Services as Services;

class User extends Services
{
	/**
	 * gets all records
	 * */
	public function getAll()
	{
		return Repositories::getRepository('User')->getAll()->toArray();
	}
	
	/**
	 * gets unique record
	 * */
	 public function getById($id)
	 {
	 	$result = Repositories::getRepository('User')->getById($id);
	 	return $result ? $result->toArray() : array();
	 }
	
	/**
	 * inserts a record
	 * */	
	public function save($data)
	{
		if(!empty($data)) {
			try{
				$User = Repositories::getRepository('User')->save($data);
				$response = array(
					'status' => 'success',
					'message' => sprintf("User added with success, ID: %s.", $User->cd_user),
					'data'	 => array($User->toArray()),
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
		if(!empty($data)) {
			if(!empty($id)) {
				$record = $this->getById($id);
				if(!empty($record)) {
					try {
						$User = Repositories::getRepository('User')->update($data, $id);
						$response = array(
							'status' => 'success',
							'message' => sprintf("User ID: %s, updated with success.",$id),
							'data' => array($User->toArray())
						);
					} catch ( \App\Models\Repositories\Exceptions\ModelExeception $e ) {
						$response = $this->handleModelExeception($e);
					}
				}else $response = array(
					'status' => 'error',
					'message' => sprintf('User ID: %s doesnt exists.', $id)
				);
			}else $response = array(
				'status' => 'error',
				'message' => 'You need to provide which record update.'
			);
		}else $response = array(
			'status' => 'error',
			'message' => 'Your request reached with no data.'
		);
		
		return $response;
	}
	
	/**
	 * deletes a record
	 * */
	 public function delete($id) 
	 {
	 	if(!empty($id)) {
	 		try {
	 			$record = $this->getById($id);
				if(!empty($record)) {
					Repositories::getRepository('User')->delete($id);
					$response = array(
						'status' => 'success',
						'message' => sprintf("User ID: %s, deleted with success.", $id),	
					);	
				} else {
					$response = array(
						'status' => 'error',
						'message' => sprintf('User ID: %s doesnt exists.', $id)
					);					
				}
	 		} catch ( \App\Models\Repositories\Exceptions\ModelException $e ) {
	 			$response = $this->handleModelException($e);
	 		}
	 	}else $response = array(
			'status' => 'error',
			'message' => 'You need to provide which record delete.'
		);
		
		return $response;
	 }
}
