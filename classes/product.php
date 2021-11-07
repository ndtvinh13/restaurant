<?php 
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>

<?php 
    class product{
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Insert product
        public function insert_product($data,$files){
            //if passing multiple value -> $data -> $data['abcd']
            
            $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
            $category    = mysqli_real_escape_string($this->db->link,$data['category']);
            $productDesc = mysqli_real_escape_string($this->db->link,$data['productDesc']);
            $price       = mysqli_real_escape_string($this->db->link,$data['price']);
            $type        = mysqli_real_escape_string($this->db->link,$data['type']);

            // $productName = $data['productName'];
            // $category    = $data['category'];
            // $productDesc = $data['productDesc'];
            // $price       = $data['price'];
            // $type        = $data['type'];


            //Check images and input them into folder upload
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            //If these values are NULL or empty
            if($productName == "" || $category == "" || $productDesc == "" || $price == "" || $type == "" || $file_name == ""){
                $alert="<span class='text-warning'>All fields must not be empty</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO product(productName, catid, productDesc, price, type, image) VALUES ('$productName','$category','$productDesc','$price','$type','$unique_image')";
                $result=$this->db->insert($query);
                if($result){  //Means if $result==true
                    $alert="<span class='text-success'>Insert Product Sucessfully</span>";
                    return $alert;
                }else {
                    $alert="<span class='text-danger'>Insert Product NOT Sucessfully</span>";
                    return $alert;
                }
            }
        }
    }
?>