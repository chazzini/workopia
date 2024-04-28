<?php

namespace Framework;

class Session
{
    /**
     * Start the session
     * 
     * @return void
     */
    public static function start()
    {
        if (session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
    }

    /**
     * Set a session
     * 
     * @param string $key
     * @param mixed $value
     * 
     * @return void
     */
    public static function set($key, $value): void
    {
        $_SESSION[$key] = $value;
    }


    /**
     * Get a session
     * 
     * @param string $key
     * 
     * @return mixed $value
     */
    public static function get($key, $default = ''): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    /**
     * Check to see if session exist
     * 
     * @param string $key
     * 
     * @return bool
     */
    public static function has($key)
    {
        return isset($_SESSION[$key]) ? true : false;
    }
    /**
     * clear session
     * 
     * @param string $key
     * 
     * @return void
     */
    public static function clear($key): void
    {
        if (isset($_SESSION[$key]))
            unset($_SESSION[$key]);
    }

    /**
     * clear all session
     * 
     * 
     * @return void
     */
    public static function clearAll(): void
    {
        session_unset();
        session_destroy();
    }


    /**
     * Set flash message
     * 
     * @param string $key
     * @param string $message
     * 
     * @return void
     */
    public static function setFlashMessage($key, $message)
    {
        self::set('flash_' . $key, $message);
    }
    /**
     * Get flash message
     * 
     * @param string $key
     * 
     * @return string 
     */
    public static function getFlashMessage(string $key)
    {
        $message = self::get('flash_' . $key);
        self::clear('flash_' . $key);
        return $message;
    }
}