<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    function mostrar(){
        return '<h2> Mostrando Texto del controlador en la Web </h2>';
    }

    function verAriculos($id,$num=1){
        return 'Blog Número: '.$id .'</br> Artículo: ' .$num;
    }

    function mostrarProducts(){
        return 'Bienvenido(a) al Listado de productos';
    }

    function sinToken(){
        return 'Lo siento, no tiene acceso';
    }
}
