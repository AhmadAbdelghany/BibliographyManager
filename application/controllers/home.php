<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index($activeLibId=-1)
    {
    	// getting user libraries
    	if(isset($_SESSION["user"])) {
    		    		
    		$userId = $_SESSION["user"]->id;
    		$unfiledLib = $this->model->getUnfiled($userId);
    		$trashLib = $this->model->getTrash($userId);
    		$ownedLibs = $this->model->getOwnedLibs($userId);
    		$sharedLibs = $this->model->getSharedLibs($userId);
    		
    		if($activeLibId==-1) {
    			$activeLibId = $unfiledLib->id;
    		}
    		
    		$activeLib = $this->model->getLibrary($activeLibId);
    		$activeLibReferences = $this->model->getReferences($activeLib->id);
    		$activeLibViewers = $this->model->getViewers($activeLib->id);
    		
    		$isOwner = $this->model->isOwner($userId, $activeLibId);
    		
    		$_SESSION["activeLib"] = $activeLib;
    		$_SESSION["activeLibReferences"] = $activeLibReferences;
    	}
    	    	   
        // load views
        require APP . 'views/_templates/header.php';
        require APP . 'views/_templates/leftMenu.php';
        require APP . 'views/home/index.php';
        require APP . 'views/_templates/footer.php';
    }

    /**
     * direct user to login page
     */
    public function login()
    {
        // load views
        require APP . 'views/home/login.php';
    }
    
    /**
     * authenticate user
     */
    public function authenticate()
    {
    	$user = $this->model->authenticate($_POST["email"], $_POST["password"]);
    	if($user) {
    		
    		$_SESSION["user"] = $user;
    		header('location: ' . URL_WITH_INDEX_FILE . 'home/index');
    	} else {
    		header('location: ' . URL_WITH_INDEX_FILE . 'home/login');
    	}
    }
    
    /**
     * authenticate user
     */
    public function signup()
    {
    	require APP . 'views/home/signup.php';
    }
	
    /**
     * create a new user
     */
    public function addUser()
    {
    	$newUserId = $this->model->addUser($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["password"]);
    	$this->model->addLibrary($newUserId, "Unfiled", 1);
    	$this->model->addLibrary($newUserId, "Trash", 1);
    	
    	if(isset($newUserId)) {
    		header('location: ' . URL_WITH_INDEX_FILE . 'home/login');
    	} else {
    		header('location: ' . URL_WITH_INDEX_FILE . 'home/signup');
    	}
    }
    
    public function logout()
    {
    	session_unset();
        // load views
        header('location: ' . URL_WITH_INDEX_FILE . 'home/login');
    }
    
    public function editProfile() {
    	$user = $_SESSION["user"];
    	require APP . 'views/_templates/header.php';
    	require APP . 'views/_templates/logo.php';
    	require APP . 'views/home/profile.php';
    	require APP . 'views/_templates/footer.php';
    }
    
    public function updateProfile() {
    	$this->model->updateProfile($_SESSION["user"]->id, $_POST["firstName"], $_POST["surname"], $_POST["email"]);
    	$_SESSION["user"] = $this->model->getUserById($_SESSION["user"]->id);
    	header('location: ' . URL_WITH_INDEX_FILE . 'home/index');
    }
    
}
