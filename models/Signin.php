<?php
class Signin extends Model
{
    private $db;
    public function __construct() {
        parent::__construct();
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }
    public function run()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $statement = $this->db->prepare("select id, role FROM Employee WHERE username=:username AND password= :password");
        $statement->execute(array(
            ':username' => $username,
            ':password' => Hash::create('md5', $password , HASH_PASSWORD_KEY)
        ));

        $data = $statement->fetch();

        $count = $statement->rowCount();
        if($count > 0)
        {
            Session::init();
            Session::set('role', $data['role']);
            Session::set('id', $data['id']);
            Session::set('signedIn', true);
            if($data['role'] == 'admin')
            {
                header('location: '.basePath.'admin');
            }
            else {
                header('location: '.basePath.'employee');
            }
        }
        else
        {
            header('location: '.basePath.'signin');
        }
    }
    
    
}

