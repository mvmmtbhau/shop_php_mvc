<?php

class Session {
    public static function init(){
        session_start();
    }

    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        } else {
            return FALSE;
        }
    }

    public static function checkSesssion(){
        // self::init();
        if(self::get('login') == FALSE ){
            self::destroy();
            header("Location:".BASE_URL."LoginController");
        } else {

        }
    }

    public static function destroy(){
        session_destroy();
    }

    public static function unset($key){
        unset($_SESSION[$key]);
    }
}

?>