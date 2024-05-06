<?php

namespace Model;

class Rol extends ActiveRecord {

    protected static $tabla = 'rol';
    protected static $columnasDB= ['id', 'rol'];

    public $id;
    public $rol;

    public function __construct( $args = [] ){
        $this->id = $args['id'] ?? NULL;
        $this->rol = $args['rol'] ?? '';
    }
}