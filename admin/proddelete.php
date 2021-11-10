<?php 
    include "../classes/product.php";

?>

<?php 
    $pd = new product();

    if(!isset($_GET['productid']) || $_GET['productid']==NULL){
        echo "<script>window.location='prodlist.php'</script>";
    }else{
        $id=$_GET['productid'];
        $deleteProduct=$pd->delete_product($id);
        header("Location: prodlist.php");
    }
    
?>