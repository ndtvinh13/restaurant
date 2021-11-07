<?php 
  include 'includes/header.php';
  include 'includes/sidebar.php';
  include '../classes/category.php';
?>

<?php 
    // this category is from the class from category.php
    //$class prepresents category class not function
    $cat = new category();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $catName=$_POST['catName'];
        // $class Object to call function
        //values will be passed in this argument
        $insertCat=$cat->insert_category($catName);
    }
?>

        <!-- page content goes here -->
        <!-- Category Add -->
        <div class="container-fluid page-ti-co p-0 col-11 col-sm-8 col-md-8">
          <div class="page-title">Add New Category</div>
          <div class="page-content d-flex p-5 flex-column">
            <?php 
              if(isset($insertCat)){
                echo $insertCat;
              }
            ?>
            <form action="catadd.php" method="post" class="container-fluid">
              <div class="mb-3 col-auto">
                <input type="text" class="form-control" placeholder="Please add product category here" name="catName">
              </div>
              <div class="cont-btn">
                <button type="submit" class="btn btn-success" name="submit" value="Save">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

<?php 
  include 'includes/footer.php';
?>