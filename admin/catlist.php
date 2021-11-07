<?php 
  include 'includes/header.php';
  include 'includes/sidebar.php';
  include '../classes/category.php';
?>

<?php 
  $cat = new category();
  $showCat=$cat->show_category();

  // if(!isset($_GET['catid']) || $_GET['catid']==NULL){
  //   echo "<script>window.location='catlist.php'</script>";
  // }else{
  //   $id=$_GET['catid'];
  //   $deleteCat=$cat->delete_category($id);
// }
?>
        <!-- page content goes here -->
        <!-- Home page -->
        <div class="container-fluid page-ti-co p-0 col-11 col-sm-8 col-md-8">
          <!-- <div class="wrapper-container"> -->
          <div class="page-title">Category List</div>
          <div class="page-content">
            <table class="table table-sm table-hover table-responsive">
              <thead>
                <tr class="bg-warning tbl-header p-0">
                  <th scope="col">Serial Number</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Action*</th>
                </tr>
              </thead>
              <tbody>

                <!-- Loop to display created cateogry from catadd.php -->
                <?php 
                  if($showCat){
                    $i=0;
                    while($result=$showCat->fetch_assoc()){
                      $i++;

                ?>
                  <tr class="tbl-content">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['catName'] ?></td>
                    <td>
                      <a href="catedit.php?catid=<?php echo $result['catid']?>" class="btn btn-primary">Edit</a>
                      <a onclick="return confirm('Do you want to delete?')" href="catdelete.php?catid=<?php echo $result['catid']?>" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                
                <!-- This php block for ending the loop -->
                <?php
                    }
                  } 
                ?>
              </tbody>
            </table>
          <!-- </div> -->
          </div>
        </div>
      </div>
    </div>

    <!-- <script>
      $('.page-ti-co').each(function(){
      $(this).children('.table').height($(this).height() - $(this).children('.page-title').height()+"px");
      });
    </script> -->
    

<?php 
  include 'includes/footer.php';
?>