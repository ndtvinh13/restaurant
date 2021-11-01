<?php 
    include '../lib/database.php';
    include '../helpers/format.php';
?>

<?php
    class category
    {
        private $db;
        private $fm;

        function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        
        public function insert_category($catName)
        {
            $catName=$this->fm->validation($catName);

            $catName=mysqli_real_escape_string($this->db->link, $catName);

            if(empty($catName)){
                $alert="<span  class='text-warning'>Category must not be empty</span>";
                return $alert;
            }else{
                $query = "INSERT INTO category(catName) VALUES ('$catName')";
                $result=$this->db->insert($query);
                if($result){  //Means if $result==true
                    $alert="<span class='text-success'>Insert Category Sucessfully</span>";
                    return $alert;
                }else {
                    $alert="<span class='text-danger'>Insert Category NOT Sucessfully</span>";
                    return $alert;
                }
            }

        }
    }
    
?>