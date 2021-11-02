<?php 
  include 'includes/header.php';
  include 'includes/sidebar.php';
  include '../classes/category.php';
?>

<?php 
  $cat = new category();
  $showCat=$cat->show_category();
?>
        <!-- page content goes here -->
        <!-- Home page -->
        <div class="container-fluid page-ti-co p-0 col-10 col-sm-8 col-md-8">
          <div class="page-title">Category List</div>
          <div class="page-content">
            <table class="table table-sm table-hover">
              <thead>
                <tr class="bg-warning">
                  <th scope="col">Serial Number</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Action*</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  if($showCat){
                    $i=0;
                    while($result=$showCat->fetch_assoc()){
                      $i++;

                ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['catName'] ?></td>
                    <td>
                      <a href="catedit.php?catid=<?php echo $result['catid']?>" class="btn btn-primary">Edit</a>
                      <a href="?catid=<?php echo $result['catid']?>" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                
                <!-- This php block for ending the loop -->
                <?php
                    }
                  } 
                ?>
              </tbody>
            </table>
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