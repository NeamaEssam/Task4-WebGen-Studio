<?php
    include_once "database.php";
    class user extends database 
    {

         var $name; var $phone; var $email; var $password; var $address; var$ID;
           
        public function GetUserName()
        {
            return $this->name;
        }
        public function GetUserPhone()
        {
            return $this->phone;
        }  
        public function GetUserEmail()
        {
            return $this->email;
        }  
        public function GetUserAddress()
        {
            return $this->address;
        }
        public function GetUserPassword()
        {
            return $this->password;
        }





        public function setUserName($n)       
        {
            $this->name=$n;
        }
        public function setUserPhone($p)       
        {
            $this->phone=$p;
        }
        public function setUserEmail($e)       
        {
            $this->email=$e;
        }
        public function setUserPassword($pas)       
        {
            $this->password=$pas;
        }
        public function setUserAddress($ad)       
        {
            $this->address=$ad;
        }
        

        


        public function GetID()
        {
            return $this->ID;
        } 
       
        public function setID($n)       
        {
            $this->ID=$n;
        }


       public function add()
       {
        return parent::DML("insert into user values(Default,'".$this->GetUserName()."','".$this->GetUserEmail()."','".$this->GetUserPassword()."','".$this->GetUserPhone()."','".$this->GetUserAddress()."')");      
       }
     

       public function login()
       {
    
           $log=parent::isExist("select * from user where (email='".$this->GetUserEmail()."' and password='".$this->GetUserPassword()."')");
            return $log;
       }
     
    
    }

?>