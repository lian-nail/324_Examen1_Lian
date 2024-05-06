<?php

namespace Model;

class TipoCuenta extends ActiveRecord {

    protected static $tabla = 'tipocuenta';
    protected static $columnasDB= ['id', 'tipocuenta'];

    public $id;
    public $tipocuenta;

    public function __construct( $args = [] ){
        $this->id = $args['id'] ?? NULL;
        $this->tipocuenta = $args['tipocuenta'] ?? '';
    }
}