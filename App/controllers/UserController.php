<?php 

namespace  App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;

class UserController
{
    protected $db;
    public function __construct() {
        $config = require basePath('config/db.php');

        $this->db = new Database($config);
    }

    /**
     * Show Login Page
     * 
     * @return void
     *
    */

    public function login(){
        loadview('users/login');
    }

     /**
     * Show Create Page
     * 
     * @return void
     *
    */

    public function create(){
        loadview('users/create');
    }

    /**
     * Store user to db
     * 
     * @return void
     * 
     * 
     */ 
     


    public function store (){
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';    
        $city = $_POST['city'] ?? '';
        $state = $_POST['state'] ?? '';
        $password = $_POST['password'] ?? '';
        $passwordConfirmation = $_POST['password_confirmation'] ?? '';

        $errors = [];

        if(!Validation::email($email)){
            $errors['email'] = 'Please Enter a valid email address';
        }  

         if(!Validation::string($name, 2 , 50)){
            $errors['name'] = 'Name must be 2 and 50 characters';
        }  

        if(!Validation::string($password, 6 , 50)){
            $errors['password'] = 'Password must be 6 and 50 characters';
        }  

        if(!Validation::match($password, $passwordConfirmation)){
            $errors['password_confirmation'] = 'Password do not match';
        }  


        if(!empty($errors)){
            loadview('users/create', [
              'errors' => $errors,
              'user' => [
                'name' => $name,
                'email' => $email,
                'city' => $city,
                'state' => $state,
                'password' => $password,
                'password_confirmation' => $passwordConfirmation
              ]  
            ]);
            exit;
        } 

        //Check if email exist
        $params = [
            'email' => $email
        ];

        $user = $this->db->query('SELECT * FROM users WHERE email = :email' , $params)->fetch();

        if($user){
            $errors['email'] = 'That Email already exists';
            loadView('users/create', [
                'errors' => $errors,
                
            ]);
            exit;
        }

        //Create user account
        $params = [
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'state' => $state,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        $this->db->query('INSERT INTO users (name, email, city, state, password) VALUES (:name, :email, :city, :state, :password)', $params);

        // Get new user Id

        $userId = $this->db->conn->lastInsertId();

        
        Session::set('user', [
            'id' => $userId,
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'state' => $state,
            
        ]); 
        

        redirect('/'); 
    } 

    /***
     * Logout a  user and kill session
     * 
     * @return void
     */

    public function logout (){
        Session::clearAll('user');

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 86400,  $params['path'], $params['domain']

        );
       
        redirect('/');
        
    }
    
}   
    
