<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function esUltimo (string $actual, string $proximo) : bool {
    if ($actual !== $proximo) {
        return true;
    }
    return false;
}

// Escapa / Sanitizar el HTML
function sanitizar($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

//Revisa si el usuario esta autenticado
function isAuth() : void {
    if( !isset($_SESSION['login']) ) {
        header('Location: /');
    }
}

function isAdmin() : void {
    if( !isset($_SESSION['admin']) ) {
        header('Location: /');
    }
}