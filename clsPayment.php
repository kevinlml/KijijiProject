<?php


class Payment
{
    private $db;
    
    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }
    
    public function register($cardName,$cardType,$cardNumber,$cardCvc,$expiredMonth, $expiredYear, $idmember)
    {
        try
        {
              
            $stmt = $this->db->prepare("INSERT INTO payment(cardName,cardType,cardNumber,cardCvc,expiredMonth, expiredYear, idmember)
              VALUES(:cardName, :cardType, :cardNumber, :cardCvc, :expiredMonth, :expiredYear, :idmember )");
            
            $stmt->bindparam(":cardName", $cardName);
            $stmt->bindparam(":cardType", $cardType);
            $stmt->bindparam(":cardNumber", $cardNumber);
            $stmt->bindparam(":cardCvc", $cardCvc);
            $stmt->bindparam(":expiredMonth", $expiredMonth);
            $stmt->bindparam(":expiredYear", $expiredYear);
            $stmt->bindparam(":idmember", $idmember);
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
            $stmt = $this->db->prepare("SELECT * FROM ad");
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            
            if($stmt->rowCount() > 0)
            {
                $_SESSION['paymentId'] = $row['paymentId'];
                return true;
                
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    
    public function redirect($url)
    {
        header("Location: $url");
    }
}
?>
 
