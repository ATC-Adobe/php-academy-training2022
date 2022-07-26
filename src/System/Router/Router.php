<?php

namespace System\Router;

class Router {
    public function add ($route, $file) {

        if(!empty($_REQUEST['uri'])){
            $route = preg_replace("/(^\/)|(\/$)/","",$route);
            $reqUri =  preg_replace("/(^\/)|(\/$)/","",$_REQUEST['uri']);
        }else{
            $reqUri = "/";
        }

        if($reqUri == $route ){

            include($file);

            die();
        }
    }

    public function notFound($file){
        include($file);
        exit();
    }
}