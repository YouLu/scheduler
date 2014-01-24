<?php
class Signin extends Model
{

    public function __construct() {
        parent::__construct();
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
            Session::set('signedIn', true);
            header('location: '.basePath.'Dashboard');
        }
        else
        {
            header('location: '.basePath.'Signin');
        }
    }
    
    
}

