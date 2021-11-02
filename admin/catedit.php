<?php 
  include 'includes/header.php';
  include 'includes/sidebar.php';
  include '../classes/category.php';
?>

<?php 
    $cat=new category();
    if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
        // header("Location: catlist.php"); cannot use header
        //because the header and the HTML have been sent
        echo "<script>window.location='catlist.php'</script>";
    }else{
        $id=$_GET['catid'];
    }
?>

        <!-- page content goes here -->
        <!-- Category Add -->
        <div class="container-fluid page-ti-co p-0 col-10 col-sm-8 col-md-8">
          <div class="page-title">Category Edit</div>
          <div class="page-content d-flex p-5 flex-column">
            <?php 
              if(isset($insertCat)){
                echo $insertCat;
              }
            ?>
            <?php 
                $getCatName=$cat->getCatById($id);
                if($getCatName){
                    while($result=$getCatName->fetch_assoc()){

            ?>
            <form action="catadd.php" method="post" class="container-fluid">
              <div class="mb-3 col-auto">
                <input type="text" value="<?php echo $result['catName'] ?>" class="form-control" placeholder="Please edit product category here" name="catName">
              </div>
              <div class="cont-btn">
                <button type="submit" class="btn btn-danger" name="submit" value="Edit">Edit</button>
              </div>
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