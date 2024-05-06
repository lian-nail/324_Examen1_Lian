<?php

namespace Controllers;

use Model\Persona;
use MVC\Router;

class LoginController {

    public static function login(Router $router) {

        $auth = new Persona();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Persona($_POST);
            $alertas = $auth->validarLogin();

            if ( empty($alertas) ) {
                $usuario = Persona::where('nick', $auth->nick);

                if ( empty ($usuario) )  {
                    $alertas = Persona::setAlerta('error', 'El usuario o persona no existe');
                } else {
                    //Verificar Password

                    if ( $usuario->comprobarPassVerificado($auth->password) ) {
                        //Autenticaar al usuario
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['persona'] = $usuario->nombre . " " .$usuario->apellido;
                        $_SESSION['nick'] = $usuario->nick;
                        $_SESSION['login'] = true;

                        //Redireccionamiento
                        if ( $usuario->rol === '3' ) {
                            $_SESSION['admin'] = $usuario->rol ?? NULL;
                            header('Location: /admin');
                        } else {
                            header('Location: /persona');
                        }   

                    } else {
                        $alertas = Persona::setAlerta('error', 'Password requeridooooooooo');
                    }
                }

            }
        }

        $alertas = Persona::getAlertas();

        $router->render('auth/login', [
            'alertas' => $alertas,
            'auth' => $auth
        ]);
    }

    public static function logout() {
        session_destroy();
        $_SESSION = [];
        header('Location: /');
    }

    // public static function crearCuenta(Router $router) {
        
    //     $usuario = new Usuario;
    //     $alertas = [];

    //     if($_SERVER['REQUEST_METHOD'] === 'POST') {

    //         $usuario->sincronizar($_POST);
    //         $alertas = $usuario->validar();

    //         if ( empty($alertas) ){
    //             //Verificar que el usuario  no este registrado
    //             $resultado = $usuario->existeUsuario();
    //             if ($resultado->num_rows) {
    //                 $alertas = Usuario::getAlertas();
    //             } else {
    //                 //No esta registrado, hasshear password
    //                 $usuario->hashPassword();
    //                 //Generar un token
    //                 $usuario->generarToken();
    //                 //Enviar el email
    //                 $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
    //                 $email->enviarConfirmacion();
    //                 //Crear el usuario
    //                 $resultado = $usuario->guardar();
    //                 if ($resultado) {
    //                     header('Location: /mensaje');
    //                 }
    //             }
    //         }

    //     }
        
    //     $router->render('auth/crear-cuenta', [
    //         'usuario' => $usuario,
    //         'alertas' => $alertas
    //     ]);
    // } 

}