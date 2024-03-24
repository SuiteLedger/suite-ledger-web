<?php

class Controller
{
    public function view($view, $data = [])
    {

        extract($data);

        $fileName = "../app/views/" . $view . ".view.php";

        if (file_exists($fileName)) {
            require $fileName;

        } else {
            echo "View not found: " . $fileName;
        }

    }

    public function notFound()
    {
        $this->view('404');
    }
}
