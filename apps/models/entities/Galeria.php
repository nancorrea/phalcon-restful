<?php

class Galeria extends \Phalcon\Mvc\Model
{
	protected $primaryKey = 'cd_galeria';
	
	public function initialize()
	{
		$this->hasMany("cd_galeria", "GaleriaFoto", "cd_galeria");
	}
}
