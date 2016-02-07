<?php
/**
 * Created by PhpStorm.
 * User: Kondziu
 * Date: 2016-02-06
 * Time: 21:06
 */
if($_SESSION['loggedIn'])
{
	$_SESSION['loggedIn'] = null;
}
header('Location: '.str_replace('/logout','/',$request->getUri()));
die();