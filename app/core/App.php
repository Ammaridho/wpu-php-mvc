<?php

class App
{

    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // url = CONTROLLER/METHOD/PARAMETER

        //CONTROLLER ===========================
        if (file_exists('../app/controllers/' . $url[0] . '.php')) { //cek apakah ada controller? kalo gapake default
            $this->controller = $url[0]; //set controller
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php'; //require file controllernya
        $this->controller = new $this->controller; //instansiasi object

        //METHOD ===========================
        if (isset($url[1])) { // cek method
            if (method_exists($this->controller, $url[1])) { // cek is method exist in controller
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //PARAMETER ==========================
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // Jalankan controller dan method, serta kirimkan parameter
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL() //memecah url
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
