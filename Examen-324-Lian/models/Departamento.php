<?php

namespace Model;

class Departamento extends ActiveRecord {

    protected static $tabla = 'departamento';
    protected static $columnasDB= ['id', 'departamento'];

    public $id;
    public $departamento;

    public function __construct( $args = [] ){
        $this->id = $args['id'] ?? NULL;
        $this->departamento = $args['departamento'] ?? '';
    }
}