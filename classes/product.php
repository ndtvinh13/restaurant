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


        //Update product
        public function update_product($data,$files,$id,$old_image){
            //if passing multiple value -> $data -> $data['abcd']
            
            $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
            $category    = mysqli_real_escape_string($this->db->link,$data['category']);
            $productDesc = mysqli_real_escape_string($this->db->link,$data['productDesc']);
            $price       = mysqli_real_escape_string($this->db->link,$data['price']);
            $type        = mysqli_real_escape_string($this->db->link,$data['type']);

            //Check images and input them into folder upload
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            //explode function -> devide file name with its extension
            // image   .   jpg
            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            //If these values are NULL or empty
            if($productName == "" || $category == "" || $productDesc == "" || $price == "" || $type == ""){
                $alert="<span class='text-warning'>All fields must not be empty</span>";
                return $alert;
            }else{
                //if there is not emty and 
                //if image is selected
                if(!empty($file_name)){
                    if($file_size > 204800) {
                        $alert = "<span class='text-danger'>Image should be less than 2MB !!!</span>";
                        return $alert;
                    }
                    elseif(in_array($file_ext, $permited) === false){
                        //The implode() function returns a string from the elements of an array.
                        $alert = "<span class='text-danger'>Can only upload:-".implode(', ', $permited)."/span>";
                        return $alert;
                    }
                    // get the path to uploads
                    //and unlink the old image with the following path
                    $old_uploaded_image="uploads/".$old_image;
                    unlink($old_uploaded_image);

                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "UPDATE product SET productName = '$productName', catid = '$category', productDesc = '$productDesc', price = '$price', type = '$type', image = '$unique_image' WHERE productid = '$id'";

                //If no image is selected
                //NO image = '$unique_image'
                }else{
                    $query = "UPDATE product SET productName = '$productName', catid = '$category', productDesc = '$productDesc', price = '$price', type = '$type' WHERE productid = '$id'";
                } 
            }
                
                $result=$this->db->update($query);
                if($result){  //Means if $result==true
                    $alert="<span class='text-success'>Update Product Sucessfully</span>";
                    return $alert;
                }else {
                    $alert="<span class='text-danger'>Update Product NOT Sucessfully</span>";
                    return $alert;
                
            }
        }

        //Show product
        public function show_product(){
            // $query="SELECT * FROM product ORDER BY productid DESC";
            $query="SELECT product.*, category.catName FROM product INNER JOIN category ON product.catid = category.catid ORDER BY product.productid DESC";

            $result=$this->db->select($query);
            return $result;
        }


        //Delete product
        public function delete_product($id){
            $query="DELETE FROM product WHERE productid = '$id'";
            $result=$this->db->delete($query);
            return $result;
        }


        //Get product
        public function getProdById($id){
            $query="SELECT * FROM product WHERE productid = '$id'";
            $result=$this->db->select($query);
            return $result;
        }

    }
?>