<?php 
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>

<?php
    class category
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        
        //Insert Category
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

        //Show category values
        public function show_category(){
            $query="SELECT * FROM category ORDER BY catid DESC";
            $result=$this->db->select($query);
            return $result;
        }

        //Update category
        public function update_category($catName,$id){
            $catName=$this->fm->validation($catName);

            $catName=mysqli_real_escape_string($this->db->link, $catName);
            $id=mysqli_real_escape_string($this->db->link, $id);

            if(empty($catName)){
                $alert="<span  class='text-warning'>Category must not be empty</span>";
                return $alert;
            }else{
                $query = "UPDATE category SET catName='$catName' WHERE catid='$id'";
                $result=$this->db->update($query);
                if($result){  //Means if $result==true
                    $alert="<span class='text-success'>Update Category Sucessfully</span>";
                    return $alert;
                }else {
                    $alert="<span class='text-danger'>Update Category NOT Sucessfully</span>";
                    return $alert;
                }
            }
        }

        //Delete category
        public function delete_category($id){
            $query="DELETE FROM category WHERE catid='$id'";
            $result=$this->db->delete($query);
            if($result){  //Means if $result==true
                $alert="<span class='text-success'>Delete Category Sucessfully</span>";
                return $alert;
            }else {
                $alert="<span class='text-danger'>Delete Category NOT Sucessfully</span>";
                return $alert;
            }
        }


        //Get Category Id
        public function getCatById($id){
            $query="SELECT * FROM category WHERE catid='$id'";
            $result=$this->db->select($query);
            return $result;
        }
    }   
?>