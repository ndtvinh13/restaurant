<?php 
  include 'includes/header.php';
  include 'includes/sidebar.php';
  include '../classes/product.php';
  include_once '../helpers/format.php';
?>

<?php 
    $pd = new product();
    $fm = new Format();
?>
        <!-- page content goes here -->
        <!-- Home page -->
        <div class="container-fluid page-ti-co p-0 col-11 col-sm-8 col-md-8">
          <!-- <div class="wrapper-container"> -->
          <div class="page-title">Category List</div>
          <div class="page-content">
            <table class="table table-sm table-hover table-responsive-md tbl-prodlist">
              <thead>
                <tr class="bg-warning tbl-header p-0">
                  <th scope="col">ID</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Category</th>
                  <th class="column-display" scope="col">Image</th>
                  <th scope="col">Description</th>
                  <th scope="col">Type</th>
                  <th scope="col">Action*</th>
                </tr>
              </thead>
              <tbody>

                <!-- Loop to display created cateogry from catadd.php -->
                <?php 

                    
                    $productList = $pd -> show_product();
                    if($productList){
                        $i=0;
                        while($result=$productList->fetch_assoc()){
                            $i++;

                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['productName']; ?></td>
                        <td><?php echo $result['price']; ?></td>
                        <!-- get ['catName] from mysql inner join -->
                        <td><?php echo $result['catName']; ?></td>
                        <!-- Outputing image -->
                        <td class="column-display"><img src="uploads/<?php echo $result['image'] ?>" width=65></td>
                        <!-- Outputing product description -->
                        <td>
                            <?php 
                                // echo $result['productDesc'] 
                                echo $fm->textCutoff($result['productDesc'],20);
                            ?>
                        </td>
                        <!-- Ouput type -->
                        <td>
                            <?php 
                                if($result['type']==1){
                                    echo "Featured";
                                }else{
                                    echo "Non-Featured";
                                } 
                            ?>
                        </td>
                        <td>
                            <!-- Edit and Delete buttons -->
                            <a href="prodedit.php?productid=<?php echo $result['productid']?>&image=<?php echo $result['image'] ?>" class="btn btn-primary">Edit</a>
                            <a onclick="return confirm('Do you want to delete?')" href="proddelete.php?productid=<?php echo $result['productid']?>" class="btn btn-danger">Delete</a>
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

    

<?php 
  include 'includes/footer.php';
?>