<?php
namespace App\Controllers;

use Framework\Database;

class HomeController
{
    public $db = null;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        //instatiate database connection
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $listings = $this->db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

        loadView('home', compact('listings'));
    }
}