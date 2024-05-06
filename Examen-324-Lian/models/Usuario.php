<?php 

namespace Model;

class Usuario extends ActiveRecord{
    
    protected static $tabla = 'usuarios';
    protected static $columnasDB= ['id', 'idPersona', 'nick', 'password', 'persona', 'ci', 'rol'];

    public $id;
    public $idPersona;
    public $nick;
    public $password;
    public $persona;
    public $ci;
    public $rol;

    public function __construct( $args = [] ) {

        $this->id = $args['id'] ?? NULL;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? 0;
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? '';
    }

    //Mensajes de validacion para la creacion de una cuenta
    public function validar() {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if (!$this->apellido) {
            self::$alertas['error'][] = 'El apellido es obligatorio';
        }
        if (!$this->telefono) {
            self::$alertas['error'][] = 'Ingresa tu telefono';
        }
        if (!$this->email) {
            self::$alertas['error'][] = 'Ingresa tu E-mail';
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
        if (!$this->email) {
            self::$alertas['error'][] = 'Ingresa tu E-mail';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'El password es obligatorio';
        }

        return self::$alertas;
    }

    public function validarEmail() {
        if (!$this->email) {
            self::$alertas['error'][] = 'Ingresa tu E-mail';
        }

        return self::$alertas;
    }
    public function validarPassword() {
        if (!$this->password) {
            self::$alertas['error'][] = 'Ingresa Tu nuevo Password';
        }
        if ( strlen($this->password) < 6 ) {
            self::$alertas['error'][] = 'El Password debe de tener al menos 6 caracteres';
        }
        
        return self::$alertas;
    }

    //Revisa si el usuario ya existe
    public function existeUsuario () {
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El usuario ya esta registrado';
        }
        return $resultado;
    }

    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
    public function generarToken() {
        $this->token = uniqid();
    }
    public function comprobarPassVerificado($password) {
        
        $resultado = password_verify($password, $this->password);
        
        if (!$resultado) {
            self::$alertas['error'][] = 'El Password es incorrecto';
        } elseif (!$this->confirmado) {
            self::$alertas['error'][] = 'El usuario no esta confirmado';
        } else {
            return true;
        }

    }
    public function confirmarUsuario() {
        $this->confirmado = '1';
        $this->token = NULL;
    }
}