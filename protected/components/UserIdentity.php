<?php

class UserIdentity extends CUserIdentity
{
	private $_id;

	public function authenticate()
	{
		$user = User::model()->findByAttributes(array('email'=>$this->username));
		if($user===null){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}else if(!$user->validatePassword($this->password)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else{
			$this->_id = $user->id;
			$this->username = $user->email;
			$this->setState('role', $user->role->name);
			$this->setState('name', $user->first_name);
			$this->errorCode=self::ERROR_NONE;
		}

		return $this->errorCode==self::ERROR_NONE;
	}

	public function getId()
	{
		return $this->_id;
	}
}