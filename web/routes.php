<?php
/**
 * Created by PhpStorm.
 * User: Kondziu
 * Date: 2016-02-06
 * Time: 15:02
 */

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();


$routes->add('home', new Route('/'));
$routes->add('login', new Route('/login'));
$routes->add('logout', new Route('/logout'));

$routes->add('showList', new Route('/list/{page}'), array( 'page' => 1));

return $routes;