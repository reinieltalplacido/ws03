<?php 

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
class ListingController
{
    protected $db;
    public function __construct() {
        $config = require basePath('config/db.php');

        $this->db = new Database($config);
    }

    public function index (){
        $listings = $this->db->query('SELECT * FROM listings')->fetchAll();
        loadView('listings/index', ['listings' => $listings]);
    }

    public function create () {
        loadView('listings/create');
    }
    
    public function show ($params) {
        
        $id = $params['id'] ?? '';
        $queryParams = ['id' => $id];

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $queryParams)->fetch();

        //Check if listing exist 
        if (! $listing) {
            ErrorController::notFound('Listing not found');
            return;
        }
        loadView('listings/show', [
            'listing' =>  $listing
        ]);

    }
    /**
 * Store Data in database
 * 
 * @return void
 */

public function store (){

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
    $newListingData = array_map('sanitize', $newListingData);

    $requiredFields = ['title', 'description','salary', 'email', 'city', 'state'];

    $errors = [];

    foreach ($requiredFields as $field) {
        if(empty($newListingData[$field]) || !Validation::string($newListingData[$field])) {
            $errors[$field] = ucfirst($field) . ' is required'; 
        }
    }  

    if (!empty($errors)) {
     //Reload view with Errors
     loadView('listings/create', [
        'errors' => $errors,
        'listing' => $newListingData 
     ]);
        
    } else {
        //Submit data 
        

        $fields = [];
        $values = [];

        foreach ($newListingData as $field => $value) {
            $fields[] = $field;
            // Convert empty strings to null
            if ($value === '') {
                $newListingData[$field] = null;
            }
            $values[] = ':' . $field;
        }

        $fields = implode(', ', $fields);
        $values = implode(', ', $values);

        $query = "INSERT INTO listings ({$fields}) VALUES ({$values})";

        $this->db->query($query, $newListingData);

        redirect('/listings');
    }
       
       
    }

    /**
     * Delete a Listing
     * 
     * @param array $params
     * @return void
     */
    public function destroy ($params) {
        $id = $params['id'];
       
        $params = [
            'id' => $id
        ];

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        if (! $listing) {
            ErrorController::notFound('Listing not found');
            return;
        }

        $this->db->query('DELETE FROM listings WHERE id = :id', $params);

        // Set Flash Message
        $_SESSION['success_message'] = 'Listing deleted successfully';

        redirect('/listings');
    }

    public function edit ($params) {
        
        $id = $params['id'] ?? '';
        $queryParams = ['id' => $id];

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $queryParams)->fetch();

        //Check if listing exist 
        if (! $listing) {
            ErrorController::notFound('Listing not found');
            return;
        }
        loadView('listings/edit', [
            'listing' =>  $listing
        ]);

    }

    /**
     * Update Listing
     * 
     * @param array $params
     * @return variant
     */

    public function update ($params) {

        $id = $params['id'] ?? '';
        $queryParams = ['id' => $id];

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $queryParams)->fetch();

        //Check if listing exist 
        if (! $listing) {
            ErrorController::notFound('Listing not found');
            return;
        }

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
    $updatedValues = [];

    $updatedValues = array_intersect_key($_POST, array_flip($allowedFields));

    $updatedValues = array_map('sanitize', $updatedValues);

    $requiredFields = ['title', 'description','salary', 'email', 'city', 'state'];

    $errors = [];

    foreach ($requiredFields as $field) {
        if(empty($updatedValues[$field]) || !Validation::string($updatedValues[$field])) {
            $errors[$field] = ucfirst($field) . ' is required'; 
        }
    }  
    
    if(!empty($errors)) {
        loadView('listings/edit', [
            'listing' => $listing,
            'errors' => $errors
        ]);
        exit;
    } else{
        //Submit to DB 
        inspectAndDie($errors);
    }
}
}