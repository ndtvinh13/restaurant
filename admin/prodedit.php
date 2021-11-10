<?php 
  include 'includes/header.php';
  include 'includes/sidebar.php';
  include_once '../classes/category.php';
  include_once '../classes/product.php';
?>


<?php 
  $pd = new product();
  //Redirect prodedit.php when no productid is passed
  if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
    // header("Location: prodlist.php"); cannot use header
    //because the header and the HTML have been sent
    echo "<script>window.location='prodlist.php'</script>";
  }else{
      $id=$_GET['productid'];
      $old_image=$_GET['image'];
  }
  if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
      $updateProduct = $pd->update_product($_POST,$_FILES,$id,$old_image);
    }
?>
        <!-- page content goes here -->
        <!-- Home page -->
        <div class="container-fluid page-ti-co p-0 col-11 col-sm-8 col-md-8">
          <div class="page-title">Edit Product</div>
          <div class="page-content">

          <?php 
            echo $id;
            echo " ";
            echo $old_image;
          ?>
            <!-- Error message either successful or fail -->
            <?php 
              if(isset($updateProduct)){
                echo $updateProduct;
              }
            ?>

            <?php 
                //This loop includes whole form
                $get_product_by_id = $pd->getProdById($id);
                if($get_product_by_id){
                    while($result_product=$get_product_by_id->fetch_assoc()){


            ?>

            <!-- enctype is a MUST to import images -->
            <!-- with edit pages -> action="" to submit the form within the SAME page-->
            <form action="" method="post" enctype="multipart/form-data">
              <table class="table table-borderless tbl-product">

                <!-- Name section -->
                <tr>
                  <td>Name</td>
                  <td><input type="text" class="form-control" value="<?php echo $result_product['productName']; ?>" name="productName"></td>
                </tr>

                <!-- Category seciton -->
                <tr>
                  <td>Category</td>
                  <td>
                    <select class="form-select" aria-label="Default select example" name="category">
                        <option selected>Select a Category</option>
                        <!-- set up category class and its method to output data -->
                        <?php 
                            $cat = new category();
                            $showcat = $cat -> show_category();
                            if($showcat){  
                            while ($result=$showcat->fetch_assoc()){
                        ?>

                        <!-- take catid and catName values in database -->
                        <!-- and ouput them to select bar under option -->
                        <!-- catid and catName are in $result[] is identical from the database -->
                        <option 
                        <?php 
                            //This if is to ouput selected in <option> tag
                            //to display the one that is selected
                            if($result['catid'] == $result_product['catid']){ echo 'selected'; }
                        ?>
                        
                        value="<?php echo $result['catid'] ?>"><?php echo $result['catName']?></option>

                        <?php 
                            }
                            }
                        ?>
              
                    </select>
                  </td>
                </tr>

                <!-- Description secton -->
                <tr>
                  <td>Description</td>
                  <td>
                    <!-- textarea tag next to keep liek this -->
                    <!-- orthewise, there is spaces between -->
                    <textarea class="form-control"  id="floatingTextarea" name="productDesc"><?php echo $result_product['productDesc']; ?></textarea>
                  </td>
                </tr>

                <!-- Price Section -->
                <tr>
                  <td>Price</td>
                  <td><input type="text" class="form-control" value="<?php echo $result_product['price']; ?>" name="price"></td>
                </tr>

                <!-- Image Section -->
                <tr>
                    <td>Image Upload</td>
                    <td>
                        <img src="uploads/<?php echo $result_product['image'] ?>" width=100>
                        <input type="file" name="image" />
                    </td>
                </tr>

                <!-- Type section -->
                <tr>
                  <td>Product Type</td>
                  <td>
                  <select class="form-select" aria-label="Default select example" name="type" >
                    <option>Select a Type</option>
                        <?php 
                            if($result_product['type']==0){
                        ?>
                                <option value="1">Featured</option>
                                <option selected value="0">Non-Featured</option>
                        <?php 
                            }else{
                        ?>
                                <option selected value="1">Featured</option>
                                <option value="0">Non-Featured</option>
                        <?php 
                            } 
                        ?>
                    </select>
                  </td>
                </tr>

                <!-- Button Section -->
                <tr>
                  <td></td>
                  <td><button type="submit" class="btn btn-success" name="submit" value="Update">Update</button></td>
                </tr>

              </table>
            </form>

            <?php 
                    }
                }
            ?>

          </div>
        </div>
      </div>
    </div>

<?php 
  include 'includes/footer.php';
?>

<!-- Different from productlist and productedit is that -->
<!-- changing placeholder to value to display the product name -->