<?php

class App
{

    protected $notFoundErrorController = "NotFoundErrorController";
    protected $controllerFilePath = "../app/controllers/";
    protected $method = "index";

    public function __construct()
    {
        $controller = $this->notFoundErrorController;
        $arr = $this->getUrl();
        $fileName = $this->controllerFilePath . ucfirst($arr[0]) . "Controller.php";
        if (file_exists($fileName)) {
            require $fileName;
            $controller = ucfirst($arr[0]) . "Controller";
            unset($arr[0]);
        } else {
            require $this->controllerFilePath . $this->notFoundErrorController . ".php";
        }

        $myController = new $controller;

        if (isset($arr[1]) && method_exists($myController, strtolower($arr[1]))) {
            $this->method = strtolower($arr[1]);
            unset($arr[1]);
        }

        if (isset($arr[1])) {
            if (method_exists($myController, strtolower($arr[1]))) {
                $this->method = strtolower($arr[1]);
                unset($arr[1]);
            } else {
                $this->method = "notFound";
            }
        }

        $arr = array_values($arr);
        call_user_func_array([$myController, $this->method], $arr);

    }

    private function getUrl()
    {
        $url = $_GET['url'] ?? "home";
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $arr = explode("/", trim($url, '/'));
        return $arr;
    }

}
