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
	public $deleted;
	public $password;
	public $id;

	public function __construct()
	{
	}

	public function mapFromDbArray($result)
	{
		$this->id = $result['userId'];
		$this->login = $result['username'];
		$this->password = $result['password'];
		$this->admin = $result['admin'];
	}

	public function isAdmin()
	{
		if($this->admin == 1) return true;
		return false;
	}

	public static function getUser($id)
	{
		global $sql;

		$result = $sql->query("SELECT * FROM users WHERE userId = {$id}");
		$user = new User();
		$user->mapFromDbArray($result[0]);
		return $user;
	}

	public static function getUserByUsername($uid)
	{
		global $sql;
		$result = $sql->query("SELECT * FROM users WHERE username = '{$uid}'");

		$user = new User();
		$user->mapFromDbArray($result[0]);
		return $user;
	}

	public static function getAll()
	{
		global $sql;
		$result = $sql->query("SELECT * FROM users");
		$resultArr = array();
		foreach ($result as $res) {
			$user = new User();
			$user->mapFromDbArray($res);
			$resultArr[] = $user;
		}

		return $resultArr;
	}

}