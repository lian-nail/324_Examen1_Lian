<?php

namespace Controllers;

use MVC\Router;
use Model\Persona;
use Model\CuentaBancaria;
use Model\TipoCuenta;

class PersonaController {

    public static function index(Router $router) {

        $cuentas = CuentaBancaria::belongsTo('idPersona', $_SESSION['id']);
        // debuguear($cuentas);

        $router->render('persona/index', [
            'cuentas' => $cuentas
        ]);
    }

    public static function agregar(Router $router) {
        session_start();
        $cuenta = new CuentaBancaria;
        $alertas = [];
        $tipoCuentas = TipoCuenta::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cuenta->sincronizar($_POST);
            $alertas = $cuenta->validar();

            if( empty($alertas) ) {
                $cuenta->idPersona = $_SESSION['id'];
                $resultado = $cuenta->guardar();
                if($resultado) {
                    header('Location: /persona');
                }
            }
        }

        $alertas = CuentaBancaria::getAlertas();

        $router->render('persona/agregar', [
            'alertas' => $alertas,
            'cuenta' => $cuenta,
            'tipoCuentas' => $tipoCuentas
        ]);
    }
    
    public static function editar(Router $router) {

        if( is_numeric($_GET['idCuenta']) ) {
            $idCuenta =  $_GET['idCuenta'] ;
        } else {
            header('Location: /persona');
        }

        $cuenta = CuentaBancaria::find($idCuenta);
        $alertas = [];
        if($cuenta) {
            $tipoCuentas = TipoCuenta::all();
            if($_SERVER['REQUEST_METHOD'] === "POST") {

                $cuenta->sincronizar($_POST);
                $alertas = $cuenta->validarEditar();
    
                if( empty($alertas) ) {

                    $cuenta->guardar();
                    header('Location: /persona');
                }
            }
        } else {
            header('Location: /persona');
        }

        $alertas = CuentaBancaria::getAlertas();

        $router->render('persona/editar', [
            'cuenta' => $cuenta,
            'alertas' => $alertas,
            'tipoCuentas' => $tipoCuentas
        ]);
    }

    public static function eliminar( ) {
        
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $id = $_POST['id'];
            $cuenta = CuentaBancaria::find($id);
            if($cuenta) {
                $cuenta->altaBaja = $_POST['altaBaja'];
                $resultado = $cuenta->guardar();
                header('Location: /persona');
            }
        }
    }
}