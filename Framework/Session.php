<?php

namespace Framework;

class Session {
    /**
     * Start a Session
     * 
     * @return void
     */

    public static function start(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Set a Session key/value pair
     * 
     * @param string $key
     * @param mixed $value
     * 
     */
     
    public static function set ($key, $value){
        $_SESSION[$key] = $value;
    }
    
    /**
     * Summary of get
     * @param mixed $key
     * @param mixed $default
     * @return mixed
     */
    public static function get ($key, $default = null) {
        return isset ($_SESSION[$key]) ? $_SESSION[$key] : $default;        
    }

    /***
     * Check if session key exits 
     * 
     * @param string key 
     * @return bool
     */

    public static function has ($key) {
        return isset($_SESSION[$key]);
    }

    /***
     * Clear session by key
     * 
     * @param string $key
     * @return void 
     * 
     */

    public static function clear ($key) {
        if(isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * Clear all session data
     * 
     * @return void
     */

    public static function clearAll() {
       session_unset();
       session_destroy();
    }
    /**
     * Set a flash Message
     * 
     * @param string $key
     * @param string $message
     * @return void
     */

    public static function setFlashmessage($key, $message){
        self::set('flash_'. $key, $message);
    }

    /***
     * Get a flash message and unset
     * 
     * @param string $key
     * @param string $default
     * @return void
     */

    public static function getFlashMessage($key, $default = null){
        $message = self::get('flash_'. $key, $default);
        self::clear('flash_'. $key);
        return $message;
       
        
    }
    
}