<?php 
  include 'includes/header.php';
  include 'includes/sidebar.php';
  include_once '../classes/category.php';
  include_once '../classes/product.php';
?>


<?php 
  $pd = new product();
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    // $productName=$_POST['productName'];

    //$_FILES -> because of having images
    //$_POST -> passing all values with POST method
    $insertProduct=$pd->insert_product($_POST, $_FILES);
  }
?>
        <!-- page content goes here -->
        <!-- Home page -->
        <div class="container-fluid page-ti-co p-0 col-11 col-sm-8 col-md-8">
          <div class="page-title">Add New Product</div>
          <div class="page-content">
            <!-- Error message either successful or fail -->
            <?php 
              if(isset($insertProduct)){
                echo $insertProduct;
              }
            ?>

            <!-- enctype is a MUST to import images -->
            <form action="prodadd.php" method="post" enctype="multipart/form-data">
              <table class="table table-borderless tbl-product">

                <!-- Name section -->
                <tr>
                  <td>Name</td>
                  <td><input type="text" class="form-control" placeholder="Enter a Product Name" name="productName"></td>
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
                      <option value="<?php echo $result['catid'] ?>"><?php echo $result['catName']?></option>

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
                    <textarea class="form-control" placeholder="Leave a description" id="floatingTextarea" name="productDesc"></textarea>
                  </td>
                </tr>

                <!-- Price Section -->
                <tr>
                  <td>Price</td>
                  <td><input type="text" class="form-control" placeholder="Enter a Price" name="price"></td>
                </tr>

                <!-- Image Section -->
                <tr>
                  <td>Image Upload</td>
                  <td><input type="file" name="image" /></td>
                </tr>

                <!-- Type section -->
                <tr>
                  <td>Product Type</td>
                  <td>
                  <select class="form-select" aria-label="Default select example" name="type" >
                      <option selected>Select a Type</option>
                      <option value="1">Featured</option>
                      <option value="0">Non-Featured</option>
                    </select>
                  </td>
                </tr>

                <!-- Button Section -->
                <tr>
                  <td></td>
                  <td><button type="submit" class="btn btn-success" name="submit" value="Save">Save</button></td>
                </tr>

              </table>
            </form>
          </div>
        </div>
      </div>
    </div>

<?php 
  include 'includes/footer.php';
?>