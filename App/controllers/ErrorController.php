<?php
namespace App\Controllers;


/**
 * ListingController class
 */
class ErrorController
{
    public $db = null;



    /**
     * 404 not fount error
     *
     * @return void
     */
    public static function notfound($message = "Resoure not found")
    {
        http_response_code(404);
        loadView('error', [
            'status' => '404',
            'message' => $message
        ]);

    }
    /**
     * 403 unauthorized
     *
     * @return void
     */
    public static function unauthorized($message = "You are not authrized to view this resource")
    {
        http_response_code(403);
        loadView('error', [
            'status' => '403',
            'message' => $message
        ]);

    }
}