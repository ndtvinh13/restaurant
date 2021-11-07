<?php 
    include "../classes/category.php";

?>

<?php 
    $cat = new category();

    if(!isset($_GET['catid']) || $_GET['catid']==NULL){
        echo "<script>window.location='catlist.php'</script>";
    }else{
        $id=$_GET['catid'];
        $deleteCat=$cat->delete_category($id);
        header("Location: catlist.php");
    }
    


?>