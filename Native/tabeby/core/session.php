<?php 

session_start();

// set new value in session
function setSession(string $key, $value)
{
  $_SESSION[$key] = $value;
}

function endSession()
{
  // superglobal $_SESSION, cookie (session id), file on server (session id)

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