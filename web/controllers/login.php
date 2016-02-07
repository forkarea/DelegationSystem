<?php
/**
 * Created by PhpStorm.
 * User: Kondziu
 * Date: 2016-02-06
 * Time: 15:30
 */

$user = $request->get('login');
$password = $request->get('password');
$result = $sql->query("SELECT * FROM users WHERE username='{$user}'");
if(isSet($result))
{
	if(password_verify($password,$result['password']))
	{
		$_SESSION['user'] = $user;
		$_SESSION['admin'] = $result['admin'];
		$_SESSION['loggedIn'] = true;
		header('Location: '.str_replace('/login','/',$request->getUri()));
	}
	else
	{
		$_SESSION['loggedIn'] = false;
		header('Location: '.str_replace('/login','/',$request->getUri()));
	}
}

header('Location: '.str_replace('/login','/',$request->getUri()));
die();