<?php
namespace models;
/**
 * Created by PhpStorm.
 * User: Kondziu
 * Date: 2016-02-06
 * Time: 16:11
 */
class User
{
	public $login;
	public $admin;

	public function __construct($login, $admin)
	{
		$this->login = $login;
		$this->admin = $admin;
	}

	public function isAdmin()
	{
		if($this->admin == 1) return true;
		return false;
	}

	public static function getUser($id)
	{
		global $sql;

		return $sql->query('SELECT * FROM users WHERE userId = {$id}');
	}
}