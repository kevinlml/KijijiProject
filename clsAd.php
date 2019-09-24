<?php

class Ad
{
    private  $db;
    
    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }
    
    public function register($adTitle,$adDescription,$adPrice,$articleQuantity,$adPostedDate, $adExpiredDate, $adPicture, $idCategory, $idMember)
    {
        try
        {
            
            $stmt = $this->db->prepare("INSERT INTO ads(adTitle,adDescription,adPrice,articleQuantity,adPostedDate, adExpiredDate, adPicture, idCategory, idMember)
              VALUES(:adTitle, :adDescription, :adPrice, :articleQuantity, :adPostedDate, :adExpiredDate, :adPicture, :idCategory, :idMember)");
            
            $stmt->bindparam(":adTitle", $adTitle);
            $stmt->bindparam(":adDescription", $adDescription);
            $stmt->bindparam(":adPrice", $adPrice);
            $stmt->bindparam(":articleQuantity", $articleQuantity);
            $stmt->bindparam(":adPostedDate", $adPostedDate);
            $stmt->bindparam(":adExpiredDate", $adExpiredDate);
            $stmt->bindparam(":adPicture", $adPicture);
            $stmt->bindparam(":idCategory", $idCategory);
            $stmt->bindparam(":idMember", $idMember);
            $stmt->execute();
            
            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    
    public function displayAds()   {
        try
        {
              $stmt = $this->db->prepare("SELECT * from ads");
             
            return $stmt;
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
 
