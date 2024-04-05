<?php
namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

/**
 * ListingController class
 */
class ListingController
{
    public $db = null;


    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
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
        $listings = $this->db->query('SELECT * FROM listings')->fetchAll();
        loadView('listings/index', compact('listings'));
    }
    /**
     * show
     *
     * @return void
     */
    public function show($params)
    {
        inspectAndDie(Validation::string('abd4', 4));
        $listing = $this->db->query('SELECT * FROM listings where id = :id', $params)->fetch();

        if (!$listing) {
            ErrorController::notfound('Listing not found');
        }

        loadView('listings/show', compact('listing'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        loadView('listings/create');
    }
}