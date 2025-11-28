<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->get('okres/(:num)', 'Main::okres/$1');
$routes->get('okres/(:num)/pag(:num)', 'Main::vesnice/$1');