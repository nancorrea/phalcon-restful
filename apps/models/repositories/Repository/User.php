<?php
namespace App\Models\Repositories\Repository;

use App\Models\Repositories\Repositories;
use App\Models\Entities\User as UserEntity;


class User extends Repositories
{
	public function getAll()
	{
		return UserEntity::find();
	}
	
	public function getById($id)
	{
		return UserEntity::findFirstByCd_user($id);
	}
	
	public function save($data)
	{
		$record = new UserEntity();
		foreach($data as $key => $value) {
			$record->{$key} = $value;
		}
		return $record->save() ? $record : $this->throwModelExeception($record->getMessages());
	}
	
	public function update($data, $id)
	{
		$record = $this->getById($id);
		foreach($data as $key => $value) {
			if($key != 'cd_user') $record->{$key} = $value;
		}				
		return $record->save() ? $record : $this->throwModelExeception($record->getMessages());
	}
	
	public function delete($id) 
	{
		$record = $this->getById($id);
		return $record->delete() ? true : $this->throwModelException($record->getMessages());
	}
	
}
