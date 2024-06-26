<?php
namespace App\Controllers;

use Framework\Database;
use Framework\Session as Session;
use Framework\Validation;
use Framework\Authorization as Authorization;
use PDO;

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
        $listings = $this->db->query('SELECT * FROM listings order by id desc')->fetchAll();
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
     * edit listing
     *
     * @return void
     */
    public function edit($params)
    {
        $this->db->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $listings = $this->db->query('SELECT * FROM listings where id = :id', $params)->fetch();

        if (!$listings)
        {
            ErrorController::notfound('Listing not found');
        }


        loadView('listings/edit', compact('listings'));
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
        $newListingData['user_id'] = Session::get('user')['id'];
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


    /**
     * store data
     *
     * @return void
     */
    public function update($params): void
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

        $listing = $this->db->query('select * from listings where id= :id', ['id' => $params['id']])->fetch();

        //check if listing exist
        if (!$listing)
        {
            ErrorController::notfound("Listing not found");
            return;
        }
        //Authorized
        if (!Authorization::isOwner($listing->user_id))
        {
            Session::setFlashMessage(
                'error_message',
                "You are not authorized to update this post"
            );
            redirect('/listings/' . $params['id']);
            return;
        }



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
            loadView('listings/edit/{' . $params['id'] . '}', ['errors' => $errors, 'listings' => $newListingData]);
        } else
        {
            $values = [];
            foreach ($newListingData as $key => $value)
            {

                $values[] = $key . '= :' . $key;

            }
            $newListingData['id'] = $params['id'];

            $values = implode(', ', $values);


            $query = "UPDATE listings SET {$values}  WHERE id= :id";



            $this->db->query($query, $newListingData);

            Session::setFlashMessage(
                'success_message',
                "Listing updated  successfully"
            );

            redirect('/listings');
            return;
        }
    }


    /**
     * delete a listing
     *
     * @param  array $params
     * @return void
     */
    public function destroy($params)
    {
        $id = $params['id'];

        $listing = $this->db->query('select * from listings where id= :id', ['id' => $id])->fetch();

        //check if listing exist
        if (!$listing)
        {
            ErrorController::notfound("Listing not found");
            return;
        }

        //Authorized
        if (!Authorization::isOwner($listing->user_id))
        {
            Session::setFlashMessage(
                'error_message',
                "You are not authorized to delete this post"
            );
            return redirect('/listings/' . $id);
        }


        $this->db->query('delete from listings where id=:id', ['id' => $id])->rowCount();

        Session::setFlashMessage(
            'success_message',
            "Listing deleted successfully"
        );



        redirect('/listings');

    }


    /**
     * Search Listings
     * 
     * @return void
     */
    public function search()
    {
        $keywords = trim($_GET['keywords'] ?? '');
        $location = trim($_GET['location'] ?? '');

        $params = [
            'keywords' => "%{$keywords}%",
            'location' => "%{$location}%",
        ];
        //if you database suppose fulltext
        // $search_result = $this->db
        //     ->query(
        //         "SELECT * FROM listings 
        //         WHERE MATCH (title, description) AGAINST(:keywords IN NATURAL LANGUAGE MODE) 
        //         OR MATCH (city,state) AGAINST(:location IN NATURAL LANGUAGE MODE)",
        //         $params
        //     )->fetch();

        $search_result = $this->db
            ->query(
                "SELECT * FROM listings WHERE (title like :keywords OR description like :keywords OR tags like :keywords) or (state like :location OR city like :location)",
                $params
            )->fetchAll();

        loadView('/listings/index', ['listings' => $search_result]);
    }
}