<?php 
namespace controllers;

use util\PswUtil as PswUtil;
use model\User as User;
use dao\db\UserDAO as UserDAO;


class UserController {

	private $dao;
	private $pswUtil;

	public function __construct() {
		$this->dao = new UserDAO();
		$this->pswUtil= new PswUtil();
		if (!isset($_SESSION)) { session_start(); }
	}


	/* INDEX */
	public function index() {
        $user= $this->checkSession();

        if(isset($user) && $user != false) {

        	$userList= $this->pagination();
            include VIEWS_ROOT. '/index.php';
        }else{               
            include VIEWS_ROOT. '/login.php';
        }
    }

    /* This method is in charge of paging the users on the page. */

    public function pagination(){
   		//define total number of results you want per page  
   		$results_per_page = 7;  
   		//find the total number of results stored in the database  
    	$number_of_result = count($this->getAll());
    	//determine the total number of pages available  
    	$number_of_page = ceil ($number_of_result / $results_per_page);  
  
    	//determine which page number visitor is currently on  
   		 if (!isset ($_GET['page']) ) {  
      		  $page = 1;  
    	} else {  
      		  $page = $_GET['page'];  
    	}  
  
    	//determine the sql LIMIT starting number for the results on the displaying page  
    	$page_first_result = ($page-1) * $results_per_page;    
   		//retrieve the selected results from database   
   		$userList= $this->getAllPagination($page_first_result, $results_per_page);
      
    	//RENDER

   		//If the number of users is less than what is shown per page
    	if ($number_of_result < $results_per_page ) {
    		$results_per_page= $number_of_result;
    	}

    	echo '<div class="clearfix" style="position: absolute; bottom:40px; right: 160px;">
				<div class="hint-text" style >Showing <b>'.$results_per_page. '</b> out of <b>'.$number_of_result .'</b> entries &nbsp; &nbsp;</div>
					<ul class="pagination">';

		$previous_page= $page-1;

		//If there is no previous I disable it
		if ($page > 1 ) {
				echo '<li class="page-item"><a class="page-link" href="'. FRONT_ROOT.'/user/index?page=' . $previous_page . '">Previous</a></li>' ;
		}else{
				echo'<li class="page-item disabled"><a class="page-link" href="'. FRONT_ROOT.'/user/index?page=' . $previous_page . '">Previous</a></li>' ;
		}

		//Active actual page
		for($count = 1; $count<= $number_of_page; $count++) {  
			if ($page == $count) {
				echo '<li class="page-item active"><a class="page-link" href = "'. FRONT_ROOT.'/user/index?page=' . $count . '">' . $count . ' </a></li>';  
			}else{
				echo '<li class="page-item"><a class="page-link" href = "'. FRONT_ROOT.'/user/index?page=' . $count . '">' . $count . ' </a></li>';  
			}       				 
   		}  

    	$page= $page+1;
    	
    	//If there is no later I disable it
    	if ($number_of_page >= $page) {
    		echo '<li class="page-item"><a class="page-link" href = "'. FRONT_ROOT.'/user/index?page=' . $page . '">Next</a></li>
				</ul>
			</div>';
    	}else{
			echo '<li class="page-item disabled"><a class="page-link" href = "'. FRONT_ROOT.'/user/index?page=' . $page . '">Next</a></li>
				</ul>
			</div>';
		}

    	
    	return $userList;
	}

	/*  Retrieve the list of users per page   */

	public function getAllPagination($start, $page_limit) {
		return $this->dao->retrievePagination($start, $page_limit);
	}

	/* LOGIN */

    public function login($email, $password) {

		$user =  $this->dao->retrieveByEmail($email);
		if(isset($user)) {
			//compare the supplied password with a hash
			if($this->pswUtil->compare($password, $user->getPassword())) {
				//set session
				$this->setSession($user);	
			}else{
				echo '<script>alert ("Password incorrect..");</script>'; 
			}
		}else{
			echo '<script>alert ("Email incorrect..");</script>'; 
		}
		
		$this->index();
	}

	/* CREATE */	

	public function add($name, $email, $password) {

        if($this->dao->retrieveByEmail($email) == null) {

        	if ($this->pswUtil->validate($password)) {
        		//encrypt the password before saving it
        		$hash = $this->pswUtil->hash($password);
        	
            	$user = new User(null, $name, $email, $hash);
            	try {
            		if ($this->dao->create($user)) {
            			echo '<script>alert ("Successful registration!");</script>'; 
            		}
			
				} catch(\PDOException $ex) {
					throw $ex;
				}
			}

        } else{ echo '<script>alert ("There is already a user with that email.");</script>';  }

        return $this->index();
    }

	/* DELETE */

	public function delete($id) {
		if ($id != null) {
			$this->dao->delete($id);
		}

		$this->index();
	}

	/* DELETE USERS */

	public function deleteUsers($checkbox_options = null) {
		if ($checkbox_options != null) {
			foreach ($checkbox_options as $value) {
				$this->dao->delete($value);
			}
		}		
		$this->index();
	}

	/* UPDATE */

	public function edit($id,$name, $email, $password) {

		if ($this->pswUtil->validate($password)) {
			//encrypt the password before saving it
        	$hash = $this->pswUtil->hash($password);
			$updatedUser = new User($id,$name ,$email, $hash);

			if($this->dao->update($updatedUser)){
				echo '<script>alert ("User updated Successfully!");</script>'; 
			}else{
				echo '<script>alert ("Error.");</script>'; 
			}
		}
		$this->index();
	}


  	/* This method checks if there is a user in session */

  	public function checkSession() {

  		if (session_status() == PHP_SESSION_NONE){ session_start(); }

  		if(isset($_SESSION['userLogedIn'])) {

   			return $_SESSION['userLogedIn'];
  		} else {
  			return false;
  		}
  	}

  	/* Create Session */

  	public function setSession($user) {
  		$_SESSION['userLogedIn'] = $user;
  	}

  	/* Create Delete */

  	public function logout() {
  		if (session_status() == PHP_SESSION_NONE){ session_start(); }
		unset($_SESSION['userLogedIn']);
		$this->index();
  	}

  	/* Getters */

  	public function getAll() {
		return $this->dao->retrieveAll();
	}
	
	public function getUser($id) {
		return $this->dao->retrieveById($id);
	}

}

?>
