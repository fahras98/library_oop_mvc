<?php 

//heritage
class UserController extends Controller
{

    public function __construct()
    {
        //instanciation du model
        $this->callModel = $this->model('UserModel');
    }

    public function index()
    {
        $data = $this->callModel->getUser();
        $this->view('pages/Home' ,$data);
    }

    public function crud()
    {
        $data =$this->callModel->getUser();
        $this->view('pages/booksPage' ,$data);
    }
    
    public function Admin()
    {
       
        $this->view('pages/Signin');
     
    }

    public function Home()
    {
        $data = $this->callModel->getUser();
        $this->view('pages/Home', $data);
        

    }


    public function insert()
    {

        if (isset($_POST['submit_add'])) {
            //load the view insert
            $data = [
                'titre' => $_POST['titre'],
                'auteur' => $_POST['auteur'],
                'catégorie' => $_POST['catégorie'],
                'résumé' => $_POST['résumé']
           ];
           var_dump($data);
            //consomation du data
            $this->callModel->addUser($data);
            header('location: ' . URLROOT . '/' . 'UserController/crud');
            
        }
        // else {
        //     //array qui retourn le resultat envoyé par $_POST
          
        // }
      
    }


    public function delete()
     {
            
        $data = [
            'id' => $_GET['id']
        ];

        $this->callModel->deleteUser($data);

        header('location:' . URLROOT . '/' . 'UsersController/crud');
    
    
    }

            public function update($id)
            {
                
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $params =[ 
                        'id'=>$id,
                        'titre' => $_POST['titre'],
                        'auteur' => $_POST['auteur'],
                        'date' => $_POST['date'],
                        'categorie' => $_POST['categorie'],
                        'resume' => $_POST['resume'],
                        ];
                        $this->callModel->updatePost($params);
                        header('location:'.URLROOT.'/' . 'pages/crud'); 
                }else{
                    

                  $data = $this->callModel->getPostbyId($id);

                    $this->view('pages/Edit',$data);
                }
               
            }



            public function login()
    {
        // Check for POST
        // $_SERVER — Variables de serveur et d'exécution
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                       // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // die("oups");
            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];
            
            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            
            // Check for user/email
            if ($this->callModel->findUserByEmail($data['email'])) {

                // User found
            } else {
                // User not found
                $data['email_err'] = 'No user found';
            }
            

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->callModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    
                    $this->callModel->getUser();
                    // $this->view('pages/BlogsPage', $data);
                    header('location:'.URLROOT.'/' . 'UserController/crud'); 
                } else {
                    $data['password_err'] = 'Password incorrect';
                    $this->view('pages/Signin', $data);
                }
            } else {

                // Load view with errors
                $this->view('pages/Signin', $data);
            }
        } else {
            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('pages/booksPage', $data);
            // header('location:'.URLROOT.'/' . 'UserController/crud'); 
        }
    }
          
}














