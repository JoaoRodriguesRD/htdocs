<?php

define('DEBUG',false);
define('__ROOT__', realpath(dirname(__FILE__)));
class App{

    public function execute(){
        

        //verificando url..
        if(isset($_GET['url'])){
            //definir url apenas com a raiz
            $url = explode('/',$_GET['url'])[0];
        }else{
            $url = 'Home';
        }
        //primeira letra da url em maiuscula
        $url = ucfirst($url);

        $url.="Controller";
        if(DEBUG){
            echo 'URL='.$url.'<br>';
        }
        if(file_exists('Controllers/'.$url.'.php')){
            $className = 'Controllers\\'.$url;
            $controller = new $className();
            $controller->execute();
        }else{
            include("Views/pages/templates/ERROR404.php");
            die();
        }
    }

}
