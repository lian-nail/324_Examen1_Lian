<?php

namespace Model;

class Persona extends ActiveRecord{

    protected static $tabla = 'persona';
    protected static $columnasDB= ['id', 'nombre', 'apellido', 'ci', 'rol', 'departamento', 'nick', 'password'];

    public $id;
    public $nombre;
    public $apellido;
    public $ci;
    public $rol;
    public $departamento;
    public $nick;
    public $password;

    public function __construct( $args = [] ) {
        $this->id = $args['id'] ?? NULL;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->ci = $args['ci'] ?? '';
        $this->rol = $args['rol'] ?? '';
        $this->rol = $args['departamento'] ?? '';
        $this->nick = $args['nick'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    //Mensajes de validacion para la creacion de una persona
    public function validar() {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if (!$this->apellido) {
            self::$alertas['error'][] = 'El apellido es obligatorio';
        }
        if (!$this->ci) {
            self::$alertas['error'][] = 'Ingresa tu CI';
        }
        if (!$this->rol) {
            self::$alertas['error'][] = 'Debes elegir un rol';
        }
        if (!$this->departamento) {
            self::$alertas['error'][] = 'Debes seleccionar tu departamento';
        }
        if (!$this->nick) {
            self::$alertas['error'][] = 'El nick es obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'El password es obligatorio';
        }
        if ( strlen($this->password) <6 ) {
            self::$alertas['error'][] = 'El password debe de tener al menos 6 caracteres';
        }

        return self::$alertas;
    }

    public function validarLogin() {
        if (!$this->nick) {
            self::$alertas['error'][] = 'Ingresa tu Nick';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'El password es obligatorio';
        }

        return self::$alertas;
    }

    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function comprobarPassVerificado($password) {
        
        $resultado = password_verify($password, $this->password);
        
        if (!$resultado) {
            self::$alertas['error'][] = 'El Password es incorrecto';
        } else {
            return true;
        }

    }
    //Revisa si el usuario o persona ya existe
    public function existeUsuario () {
        $query = " SELECT * FROM " . self::$tabla . " WHERE ci = '" . $this->ci . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El usuario ya esta registrado';
        }
        return $resultado;
    }
}