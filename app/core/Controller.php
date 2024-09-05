<?php

class Controller
{
    // kelola view
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php'; //ambil view
    }

    // kelola model
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php'; //ambil model
        return new $model; //instansiasi
    }
}
