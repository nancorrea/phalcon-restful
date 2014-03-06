<?php

namespace App\Models\Entities;

class User extends \Phalcon\Mvc\Model
{
	protected $primaryKey = 'cd_user';
	
    public function validation()
    {
        $this->validate(new \Phalcon\Mvc\Model\Validator\Email(array(
            "field"    => "em_user"
        )));
		$this->validate(new \Phalcon\Mvc\Model\Validator\PresenceOf(array(
            "field"    => "username"
        )));
		$this->validate(new \Phalcon\Mvc\Model\Validator\PresenceOf(array(
            "field"    => "nm_user"
        )));
		
        return $this->validationHasFailed() != true;
    }
}
