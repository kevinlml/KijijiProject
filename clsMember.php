<?php

class MEMBER
{
    private $db;
 
    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }
 
    public function register($name,$address,$city,$state,$phone, $email, $password)
    {
       try
       {
          //$password = md5($password);
   
           $stmt = $this->db->prepare("INSERT INTO member(name,address,city, state, phone, email, password) 
              VALUES(:name, :address, :city, :state, :phone, :email, :password )");
              
           $stmt->bindparam(":name", $name);
           $stmt->bindparam(":address", $address);
           $stmt->bindparam(":city", $city);
           $stmt->bindparam(":state", $state);
           $stmt->bindparam(":phone", $phone);
           $stmt->bindparam(":email", $email);
           $stmt->bindparam(":password", $password);            
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
 
    public function login($email,$password)
    {
        try
        {
            //$password = md5($password);
            $stmt = $this->db->prepare("SELECT * FROM member WHERE email=:email AND password=:password LIMIT 1"); 
            $stmt->execute(array(':email'=>$email, ':password'=>$password));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            
            if($stmt->rowCount() > 0)
            {
                $_SESSION['member_id'] = $row['member_id'];
                return true;
                
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
   
  public function is_loggedin()
  {
      if(isset($_SESSION['member_id']))
      {
         return true;
      }
  }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>
 
