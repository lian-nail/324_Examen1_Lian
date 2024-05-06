<?php

namespace Model;

class CuentaBancaria extends ActiveRecord {

    protected static $tabla = 'cuentabancaria';
    protected static $columnasDB= ['id', 'idPersona', 'numeroCuenta', 'tipoCuenta', 'saldo', 'altaBaja'];

    public $id;
    public $idPersona;
    public $numeroCuenta;
    public $tipoCuenta;
    public $saldo;
    public $altaBaja;

    public function __construct( $args = [] ) {
        $this->id = $args['id'] ?? NULL;
        $this->idPersona = $args['idPersona'] ?? '';
        $this->numeroCuenta = $args['numeroCuenta'] ?? '';
        $this->tipoCuenta = $args['tipoCuenta'] ?? '';
        $this->saldo = $args['saldo'] ?? '';
        $this->altaBaja = $args['altaBaja'] ?? 'alta';
    }

    //Mensajes de validacion para la creacion de una persona
    public function validar() {
        if (!$this->numeroCuenta) {
            self::$alertas['error'][] = 'El numero de cuenta es obligatorio';
        }
        if (!$this->tipoCuenta) {
            self::$alertas['error'][] = 'El tipo de cuenta es obligatorio';
        }
        if (!$this->saldo) {
            self::$alertas['error'][] = 'El saldo es obligatorio';
        }

        return self::$alertas;
    }
    public function validarEditar() {
        if (!$this->numeroCuenta) {
            self::$alertas['error'][] = 'El numero de cuenta es obligatorio';
        }
        if (!$this->tipoCuenta) {
            self::$alertas['error'][] = 'El tipo de cuenta es obligatorio';
        }

        return self::$alertas;
    }

}