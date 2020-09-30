<?php

class Session 
{
    
    function get(string $key)
    {
       return $_SESSION[$key];
    }

    function set(string $key, $value)
    {
         $_SESSION[$key] = $value;
    }

    function has(string $key):bool
    {
        return isset($_SESSION[$key]);
    }

    function remove(string $key)
    {
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }

    function destroy()
    {

        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
      
        session_destroy();

    }

    function flash(string $key)
    {
        return $_SESSION[$key];
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }

}
