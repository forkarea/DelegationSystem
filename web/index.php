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

// deleteIt... and use autoloader
require('libs/sqlConnector.php');
require('models/user.php');

session_start();

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
$user;
$Username = '';
$loggedIn = false;
if($_SESSION['loggedIn'])
{
	$loggedIn = true;
	$user = new \models\User($_SESSION['user'], $_SESSION['admin']);
	$Username = $user->login;
}
$tpl->assign('loggedIn', $loggedIn);
$tpl->assign('Username', $Username);

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
