<?php
namespace App\Controllers;

use Framework\Database;
use Framework\Session;
use Framework\Validation;

class UserController
{
    protected $db;


    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Show the login page
     * 
     * @return void
     */
    public function login()
    {
        loadView('users/login');
    }
    /**
     * Show the register page
     * 
     * @return void
     */
    public function create()
    {
        loadView('users/create');
    }


    /**
     * Show the register page
     * 
     * @return void
     */
    public function logout()
    {
        Session::clearAll();

        $params = session_get_cookie_params();

        setcookie('PHPSESSID', '', time() - 8640, $params['path'], $params['domain']);
        redirect('/auth/login');
        return;
    }

    /**
     * Store user in database
     * 
     * @return void
     */
    public function store()
    {
        $name = $_POST['name'];
        $city = $_POST['city'];
        $email = $_POST['email'];
        $state = $_POST['state'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];

        $errors = [];

        //Validation
        if (!Validation::email($email))
        {
            $errors['email'] = 'Please enter a valid email address';
        }
        if (!Validation::string($name, 2, 50))
        {
            $errors['name'] = 'Name must be between 2 to 50 characters';
        }

        if (!Validation::string($password, 6, 50))
        {
            $errors['password'] = 'Password must be between 6 to 50 characters';
        }
        if (!Validation::match($password, $password_confirmation))
        {
            $errors['password_confirmation'] = 'Password don\'t match';
        }


        if (!empty($errors))
        {
            loadView('users/create', [
                'errors' => $errors,
                'users' => [
                    'name' => $name,
                    'email' => $email,
                    'city' => $city,
                    'state' => $state,
                ]
            ]);
            return;
        }

        //Check if email exists
        $params = [
            'email' => $email
        ];

        $user = $this->db->query('SELECT * FROM users WHERE email =:email', $params)->rowCount();
        if ($user)
        {
            $errors['email'] = "That email is already taken";
            loadView('users/create', [
                'errors' => $errors,
                'users' => [
                    'name' => $name,
                    'email' => $email,
                    'city' => $city,
                    'state' => $state,
                ]
            ]);
            return;
        }

        //create user
        $params = [
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'state' => $state,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        $this->db->query('insert into users (name,email,city,state,password) values (:name,:email,:city,:state,:password)', $params);
        $id = $this->db->conn->lastInsertId();


        Session::set('user', [
            'id' => $id,
            'name' => $name,
            'email' => $email,
        ]);

        redirect('/');
    }
    /**
     * login validation of user
     * 
     * @return void
     */
    public function authenticate()
    {
        $email = $_POST['email'];

        $password = $_POST['password'];


        $errors = [];

        //Validation
        if (!Validation::email($email))
        {
            $errors['email'] = 'Please enter a valid email address';
        }



        if (!empty($errors))
        {
            loadView('users/create', [
                'errors' => $errors,
                'users' => [

                    'email' => $email,

                ]
            ]);
            return;
        }

        //Check if email exists
        $params = [
            'email' => $email,
        ];

        $user = $this->db->query('SELECT * FROM users WHERE email =:email', $params)->fetch();


        if (!$user || !password_verify($password, $user->password))
        {
            $errors['email'] = "Credential is incorrect!";
            loadView('users/login', [
                'errors' => $errors,
                'users' => [

                    'email' => $email,

                ]
            ]);
            return;
        }



        Session::set('user', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);

        redirect('/');
    }
}