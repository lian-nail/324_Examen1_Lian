<?php

namespace Model;

class Montos extends ActiveRecord {

    protected static $tabla = 'rol';
    protected static $columnasDB= ['total_lapaz', 'total_tarija', 'total_pando', 'total_cochabamba', 'total_santacruz', 'total_chuquisaca', 'total_oruro', 'total_beni', 'total_potosi'];

    public $total_lapaz;
    public $total_tarija;
    public $total_pando;
    public $total_cochabamba;
    public $total_santacruz;
    public $total_chuquisaca;
    public $total_oruro;
    public $total_beni;
    public $total_potosi;

    public function __construct( $args = [] ){
        $this->total_lapaz = $args['total_lapaz'] ?? '';
        $this->total_tarija = $args['total_tarija'] ?? '';
        $this->total_pando = $args['total_pando'] ?? '';
        $this->total_cochabamba = $args['total_cochabamba'] ?? '';
        $this->total_santacruz = $args['total_santacruz'] ?? '';
        $this->total_chuquisaca = $args['total_chuquisaca'] ?? '';
        $this->total_oruro = $args['total_oruro'] ?? '';
        $this->total_beni = $args['total_beni'] ?? '';
        $this->total_potosi = $args['total_potosi'] ?? '';
    }
}