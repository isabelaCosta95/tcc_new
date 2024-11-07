<?php

class Autoload{

    public function __construct(){
        spl_autoload_register(function ($class) {

            if(file_exists(PATH_DAO . $class . '.php'))
                include PATH_DAO . $class . '.php';
            else if(file_exists(PATH_CONTROLLER . $class . '.php'))
                include PATH_CONTROLLER . $class . '.php';
//else if(file_exists(PATH_CSS . $class . '.php'))
//include PATH_CSS . $class . 'php';
            });
    }
}

// Para executar oo script e depois criar o objeto -> se autoexecutar
new Autoload();