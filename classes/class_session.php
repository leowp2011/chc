<?php

class Session 
{    
    public static function Start() 
    {
        session_start();
        ob_start();
    }

    public static function Destroy() 
    {
        session_unset();
        session_destroy();
    
        header("Location: ../login.php");
    }

    // Método para definir uma variável de sessão
    public static function setSession($name, $value) 
    {
        $_SESSION[$name] = $value;
    }
    
    // Método para obter o valor de uma variável de sessão
    public static function getSession($name) 
    {
        if(isset($_SESSION[$name]) AND ($_SESSION[$name] <> '')) {
            return $_SESSION[$name];
        } else {
            return null;
        }
    }
}