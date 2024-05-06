<?php

namespace Controllers;

use Model\Rol;
use MVC\Router;
use Model\Persona;
use Model\Departamento;
use Model\Montos;

class AdminController {

    public static function index(Router $router) {
        
        session_start();
        isAdmin();

        //Consultar la base para los montos
        $consulta = "SELECT SUM(CASE WHEN departamento.departamento = 'La Paz' THEN cuentabancaria.saldo ELSE 0 END) AS total_lapaz,";
        $consulta .= "SUM(CASE WHEN departamento.departamento = 'Tarija' THEN cuentabancaria.saldo ELSE 0 END) AS total_tarija,";
        $consulta .= "SUM(CASE WHEN departamento.departamento = 'Pando' THEN cuentabancaria.saldo ELSE 0 END) AS total_pando,";
        $consulta .= "SUM(CASE WHEN departamento.departamento = 'Cochabamba' THEN cuentabancaria.saldo ELSE 0 END) AS total_cochabamba,";
        $consulta .= "SUM(CASE WHEN departamento.departamento = 'Santa Cruz' THEN cuentabancaria.saldo ELSE 0 END) AS total_santacruz,";
        $consulta .= "SUM(CASE WHEN departamento.departamento = 'Chuquisaca' THEN cuentabancaria.saldo ELSE 0 END) AS total_chuquisaca,";
        $consulta .= "SUM(CASE WHEN departamento.departamento = 'Oruro' THEN cuentabancaria.saldo ELSE 0 END) AS total_oruro,";
        $consulta .= "SUM(CASE WHEN departamento.departamento = 'Beni' THEN cuentabancaria.saldo ELSE 0 END) AS total_beni,";
        $consulta .= "SUM(CASE WHEN departamento.departamento = 'Potosi' THEN cuentabancaria.saldo ELSE 0 END) AS total_potosi";
        $consulta .= " FROM persona ";
        $consulta .= " INNER JOIN departamento ON persona.departamento = departamento.id";
        $consulta .= " INNER JOIN cuentabancaria ON persona.id = cuentabancaria.idPersona;";

        $montos = Montos::SQL($consulta);
        // debuguear($montos);

        $router->render('admin/index', [
            'montos' => $montos
        ]);
    }

    public static function usuarios(Router $router) {
        
        session_start();
        isAdmin();

        $personas = Persona::all();
        $departamentos = Departamento::all();
        $roles = Rol::all();

        $router->render('admin/usuarios', [
            'personas' => $personas,
            'departamentos' => $departamentos,
            'roles' => $roles
        ]);
    }

    public static function agregarUs(Router $router) {
        session_start();
        isAdmin();

        
        $roles = Rol::all();
        $departamentos = Departamento::all();
        $alertas = [];
        $persona = new Persona;

        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $persona->sincronizar($_POST);
            $alertas = $persona->validar();

            if( empty( $alertas ) ) {
                //Verificar que el usuario  no este registrado
                $resultado = $persona->existeUsuario();
                if ($resultado->num_rows) {
                    $alertas = Persona::getAlertas();
                } else {
                    //No esta registrado, hasshear password
                    $persona->hashPassword();
                    //Crear el usuario
                    $resultado = $persona->guardar();
                    if ($resultado) {
                        header('Location: /admin/usuarios');
                    }
                }
            }
        }   

        $alertas = Persona::getAlertas();

        $router->render('admin/agregarUs', [
            'roles' => $roles,
            'departamentos' => $departamentos,
            'persona' => $persona,
            'alertas' => $alertas
        ]);
    }

    public static function editarUs(Router $router) {
        session_start();
        isAdmin();

        if( is_numeric($_GET['idPersona']) ) {
            $idPersona =  $_GET['idPersona'] ;
        } else {
            header('Location: /admin');
        }
        
        $roles = Rol::all();
        $departamentos = Departamento::all();
        $alertas = [];
        $persona = Persona::find($idPersona);
        if($persona) {
            if($_SERVER['REQUEST_METHOD'] === "POST") {
                $persona->sincronizar($_POST);
                $alertas = $persona->validar();
    
                if( empty( $alertas ) ) {
                    
                    $persona->guardar();
                    header('Location: /admin/usuarios');
                }
            }
        }
        else {
            header('Location: /admin');
        }

        $alertas = Persona::getAlertas();

        $router->render('admin/editarUs', [
            'roles' => $roles,
            'departamentos' => $departamentos,
            'persona' => $persona,
            'alertas' => $alertas
        ]);
    }
}



// $fecha = $_GET['fecha'] ?? date('Y-m-d');
// $verificarFecha = explode('-', $fecha);

// if( !checkdate($verificarFecha[1], $verificarFecha[2], $verificarFecha[0]) ) {
//     header('Location: /404');
// }

// //Consultar la base de datos
// $consulta = "SELECT citas.id, citas.hora, CONCAT( usuarios.nombre, ' ', usuarios.apellido) as cliente, ";
// $consulta .= " usuarios.email, usuarios.telefono, servicios.nombre as servicio, servicios.precio  ";
// $consulta .= " FROM citas  ";
// $consulta .= " LEFT OUTER JOIN usuarios ";
// $consulta .= " ON citas.usuarioId=usuarios.id  ";
// $consulta .= " LEFT OUTER JOIN citasServicios ";
// $consulta .= " ON citasServicios.citaId=citas.id ";
// $consulta .= " LEFT OUTER JOIN servicios ";
// $consulta .= " ON servicios.id=citasServicios.servicioId ";
// $consulta .= " WHERE fecha =  '${fecha}' ";

// $citas = AdminCita::SQL($consulta);


// $router->render('admin/index', [
//     'nombre' => $_SESSION['nombre'],
//     'citas' => $citas,
//     'fecha' => $fecha
// ]);