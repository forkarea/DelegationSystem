<?php
/**
 * Created by PhpStorm.
 * User: Kondziu
 * Date: 2016-02-06
 * Time: 13:38
 */

require(__DIR__ . "/../vendor/autoload.php");

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

function myDump($a)
{
	echo"<pre>";
	var_dump($a);
	echo"</pre>";
}

// deleteIt... and use autoloader
require('libs/sqlConnector.php');
require('models/user.php');

session_start();
$domain = 'localhost';

$request = Request::createFromGlobals();
$routes = include 'routes.php';

$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

$response = new Response();

$tpl = new Smarty;
$tpl->template_dir = __DIR__ . "/../templates/";
$tpl->compile_dir = __DIR__ . "/../templates_c/";
$tpl->assign('tpl_dir', $request->getBasePath());
$siteName = 'DelegationSystem';
$tpl->assign('siteName', $siteName);
$tpl->assign('pageName', $siteName);
$Username = '';
$loggedIn = false;
if($_SESSION['loggedIn'])
{
	$loggedIn = true;
	$userLoggedIn = new \models\User();
	$Username = $_SESSION['user'];
	$admin = $_SESSION['admin'];
}
$tpl->assign('loggedIn', $loggedIn);
$tpl->assign('Username', $Username);
$tpl->assign('admin', $admin);

$sql = new libs\sqlConnector();

try {
	extract($matcher->match($request->getPathInfo(), EXTR_SKIP));
	ob_start();

	include sprintf('controllers/%s.php', $_route);
	$response = new Response(ob_get_clean());
} catch (Routing\Exception\RouteNotFoundException $e) {
	$response->setStatusCode(404);
	$response->setContent($e->getMessage());
} catch (Exception $e) {
	$response->setStatusCode(500);
	$response->setContent($e->getMessage());
}

$response->send();
