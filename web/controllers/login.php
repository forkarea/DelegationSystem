<?php
/**
 * Created by PhpStorm.
 * User: Kondziu
 * Date: 2016-02-06
 * Time: 15:30
 */

require_once '/../models/user.php';
use \models\User;

$user = $request->get('login');
$password = $request->get('password');
$user = User::getUserByUsername($user);
if(isSet($user))
{
	if(password_verify($password,$user->password))
	{
		$_SESSION['user'] = $user->login;
		$_SESSION['admin'] = $user->admin;
		$_SESSION['loggedIn'] = true;
		header('Location: '.str_replace('/login','/',$request->getUri()));
	}
	else
	{
		$_SESSION['loggedIn'] = false;
		header('Location: '.str_replace('/login','/',$request->getUri()));
	}
}
die();
