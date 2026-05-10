<?php 

namespace App\Controllers;

class ErrorController
{
    /**
     * Error 404
     * @return void
     */
    public static function notFound ($message = "Page not Found"){
       http_response_code(404);
       loadView('error', ['status' => '404', 'message' => $message]);
    }

     /**
     * Error 403
     * @return void
     */
    public static function unauthorized ($message = "You are not authorized to view this page"){
       http_response_code(403);
       loadView('error', ['status' => '403', 'message' => $message]);
    }   
}