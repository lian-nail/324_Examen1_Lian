<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AdminController;
use Controllers\LoginController;
use Controllers\PersonaController;

$router = new Router();

//Iniciar Sesion
$router->get( '/', [LoginController::class, 'login'] );
$router->post( '/', [LoginController::class, 'login'] );

$router->get( '/logout', [LoginController::class, 'logout'] );

//AREA PRIVADA
$router->get( '/admin', [AdminController::class, 'index'] );

$router->get( '/admin/usuarios', [AdminController::class, 'usuarios'] );

$router->get( '/admin/agregarUs', [AdminController::class, 'agregarUs'] );
$router->post( '/admin/agregarUs', [AdminController::class, 'agregarUs'] );

$router->get( '/admin/editarUs', [AdminController::class, 'editarUs'] );
$router->post( '/admin/editarUs', [AdminController::class, 'editarUs'] );

//AREA Usuario
$router->get( '/persona', [PersonaController::class, 'index'] );
$router->get( '/persona/agregar', [PersonaController::class, 'agregar'] );
$router->post( '/persona/agregar', [PersonaController::class, 'agregar'] );

$router->get( '/persona/editar', [PersonaController::class, 'editar'] );
$router->post( '/persona/editar', [PersonaController::class, 'editar'] );

$router->get( '/persona/agregar', [PersonaController::class, 'agregar'] );
$router->post( '/persona/agregar', [PersonaController::class, 'agregar'] );

$router->get( '/persona/eliminar', [PersonaController::class, 'eliminar'] );
$router->post( '/persona/eliminar', [PersonaController::class, 'eliminar'] );

// //API de citas
// $router->get( '/api/servicios', [APIController::class, 'index'] );
// $router->post( '/api/citas', [APIController::class, 'guardarCita'] );

// $router->post( '/api/eliminar', [APIController::class, 'eliminar'] );

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();