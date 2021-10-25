<?php

    interface App
    {
        public function login($email);
        public function register($email,$username);
        public function logout();
    }

    class Facebook implements App
    { 
        private $email=array();
        private $username=array();
        public function login($email)
        {
            $found=false;
            foreach($this->email as $x)
            {      
                if($x == $email)
                {
                    $found=true;
                    break;
                }
            }
            if($found) echo nl2br("You Have Logged In With - $email\n\n");
            else echo "Login Failed | Unknown User - $email". nl2br("\n\n");  
        }

        public function register($email,$username)
        {
            $this->email[count($this->email)] = $email;
            $this->username[count($this->username)] = $username;
        }

        public function logout()
        {
            echo nl2br("You Have Logged Out\n\n");
        }
    }

    $facebook = new Facebook();
    $app = $facebook;

    //Login test
    echo nl2br("--Login Test Before Registering--\n");
    $app->login("OPAIC@gmail.com");

    //Register
    echo nl2br("--Registered User With - OPAIC@gmail.com--\n");
    $app->register("OPAIC@gmail.com","OPAIC");

    //Login Test
    echo nl2br("\n--Login Test After Registered With - OPAIC@gmail.com--\n");
    $app->login("OPAIC@gmail.com");

    //Register 2nd User
    echo nl2br("--Registered User With - AUT@gmail.com--\n");
    $app->register("AUT@gmail.com","AUT");

    //Login Test
    echo nl2br("\n--Login Test With Unregistered User - UOA@gmail.com--\n");
    $app->login("UOA@gmail.com");

    //Login Test
    echo nl2br("--Login Test After Registered With - AUT@gmail.com--\n");
    $app->login("AUT@gmail.com");

    //Login Test
    echo nl2br("--Login Test Again With - OPAIC@gmail.com--\n");
    $app->login("OPAIC@gmail.com");

    //Logout
    $app->logout();

?>