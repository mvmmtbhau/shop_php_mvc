<?php

class Load{
    public function __construct()
    {
        
    }

    public function view($fileName, $data = [], $message = []){
        if($data == TRUE) {
            extract($data);
        }
        if($message == TRUE) {
            extract($message);
        }
        include 'app/Views/'.$fileName.'.php';
    }

    public function model($fileName){
        include 'app/Models/'.$fileName.'.php';
        return new $fileName();
    }
}


?>