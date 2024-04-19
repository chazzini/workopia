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

        $listing = $this->db->query('SELECT * FROM listings where id = :id', $params)->fetch();

        if (!$listing)
        {
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


    /**
     * store data
     *
     * @return void
     */
    public function store(): void
    {
        $allowedFields = [
            'title',
            'description',
            'salary',
            'tags',
            'company',
            'address',
            'city',
            'state',
            'phone',
            'email',
            'requirements',
            'benefits'
        ];

        $newListingData = array_intersect_key($_POST, array_flip($allowedFields));
        $newListingData['user_id'] = 1;
        $newListingData['created_at'] = 'now()';

        $newListingData = array_map('sanitize', $newListingData);

        $requiredFields = ['title', 'description', 'email', 'city', 'state'];
        $errors = [];

        foreach ($requiredFields as $field)
        {
            if (empty($newListingData[$field]) || !Validation::string($newListingData[$field]))
            {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }


        if ($errors)
        {
            loadView('listings/create', ['errors' => $errors, 'listings' => $newListingData]);
        } else
        {
            $fields = [];
            $values = [];
            foreach ($newListingData as $key => $value)
            {
                $fields[] = $key;

                //for value convert empty strings to null
                if ($value === '')
                {
                    $newListingData[$key] = null;
                }
                $values[] = ':' . $key;

            }

            $fields = implode(', ', $fields);
            $values = implode(', ', $values);

            $query = "insert into listings ({$fields}) values ({$values})";

            $this->db->query($query, $newListingData);

            redirect('/listings/create');

        }
    }
}