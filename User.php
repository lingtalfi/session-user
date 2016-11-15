<?php


Class User
{

    /**
     * The idea of user_connexion_time is to
     * compute/refresh the logout time on each page refresh
     */
    public static function connect($item)
    {
        $_SESSION['user_id'] = $item['id'];
        $_SESSION['user_pseudo'] = $item['pseudo'];
        $_SESSION['user_photo'] = $item['url_photo'];
        $_SESSION['user_connexion_time'] = time();
    }

    public static function isConnected()
    {
        if (array_key_exists('user_id', $_SESSION)) {
            // has it expired?
            if (time() < $_SESSION['user_connexion_time'] + USER_SESSION_TIMEOUT) {
                return true;
            }
        }
        return false;
    }

    public static function refresh()
    {
        if (self::isConnected()) {
            $_SESSION['user_connexion_time'] = time();
        }
    }


    public static function disconnect()
    {
        $_SESSION = [];
        session_destroy();

    }

    public static function getPseudo()
    {
        return $_SESSION['user_pseudo'];
    }

    public static function getId()
    {
        return $_SESSION['user_id'];
    }

    public static function getUrlPhoto()
    {
        return $_SESSION['user_photo'];
    }

}