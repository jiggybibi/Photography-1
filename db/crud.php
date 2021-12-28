<?php
    class crud{
        //private database object\
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;

        }
        // function to insert a new record into the attendee database
        public function insertphotgraphers($fname, $lname, $address, $email, $contact, $brand, $doa, $avatar_path){
            try {
                //define sql statement to be executed
                $sql = "INSERT INTO photgraphers (firstname,lastname, address,emailaddress,contactnumber,brand_id,dateofacquisition,avatar_path) VALUES (:fname, :lname, :email, :contact, :brand, :doa, :avatar_path)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                //bind all placeholders to the actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':address',$address);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':brand',$brand);
                $stmt->bindparam(':doa',$doa);
                $stmt->bindparam(':avatar_path',$avatar_path);
                //execute statement
                $stmt->execute();
                return  true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                
            }
        }

        public function editphotgraphers($id, $fname, $lname, $dob, $email, $contact, $brand){
            try{
                $sql = "UPDATE `photgraphers` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`emailaddress`=:email,`contactnumber`=:contact,`brand_id`=:brand WHERE attendee_id =:id";

                $stmt = $this->db->prepare($sql);
                    //bind all placeholders to the actual values
                    $stmt->bindparam(':id',$id);
                    $stmt->bindparam(':fname',$fname);
                    $stmt->bindparam(':lname',$lname);
                    $stmt->bindparam(':dob',$dob);
                    $stmt->bindparam(':email',$email);
                    $stmt->bindparam(':contact',$contact);
                    $stmt->bindparam(':brand',$brand);
                    //execute statement
                    $stmt->execute();
                    return  true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
                
        public function getPhotgrapher(){
            try{
                $sql = "SELECT * FROM `photgraphers` a inner join brand s on a.brand_id = s.brand_id";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getphotphotographer($id){
            try{
                $sql = "select * from photgraphers a inner join brand s on a.brand_id = s.brand_id where photographer_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;     
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        
        public function deletephotgraphers($id){
            try{
                $sql = "delete from photgraphers where photographer_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }

        public function getbrand(){
            try{
                $sql = "SELECT * FROM `brand`;";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                }
            }
           
    
        public function getbrandById($id){
            try{
                $sql = "SELECT * FROM `brand` where brand_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();          
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                }
            }
    }
?>