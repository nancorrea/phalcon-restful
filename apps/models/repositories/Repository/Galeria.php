<?php
namespace App\Models\Repositories\Repository;
use App\Models\Repositories\Repositories;


class Galeria extends Repositories
{
	public function getAll()
	{
		return \Galeria::find(array(
			"order"=>"cd_galeria DESC"
		));
	}
	
	public function getById($id)
	{
		//@TODO
	}
	
	public function save($data)
	{
		$record = new \Galeria();
		foreach($data as $key => $value) {
			if($key == 'images') {
				$fotos = array();
				foreach($value as $image) {
					$result = \Util::base64save($image,'galeria',bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)));
					$foto = new \GaleriaFoto();
					$foto->cm_dir = $result['dir'];
					$foto->cm_foto = $result['name'];
					$fotos[] = $foto;
				}
				$record->GaleriaFoto = $fotos;		
			} 
			else $record->{$key} = $value;
		}
		return $record->save() ? $record : $this->throwModelExeception($record->getMessages());
	}
	
	public function update($data, $id)
	{
		//@TODO
	}
	
	public function delete($id) 
	{
		//@TODO
	}
	
}
