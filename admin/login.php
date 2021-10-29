<?php 
    include_once "classes/adminlogin.php";
?>

<?php 
    // this adminlogin function is from the class from adminlogin.php
    //$class prepresents adminlogin class not function
    $class= new adminlogin();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $adminUser=$_POST['adminUser'];
        $adminPass=$_POST['adminPass'];
        // $class Object to call function
        //values will be passed in this para
        $login_check=$class->login_admin($adminUser,$adminPass);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/stylelogin.css" />
        <title>Login</title>
    </head>
    <body>
        <div class="container-login">
            <h1>Admin Login</h1>
            <div class="container">
                <form action="login.php" method="post">
                    <!-- Username -->
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="adminUser">
                    </div>
                    <!-- Password -->
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="adminPass">
                    </div>
                    <div class="cont-btn">
                        <button type="submit" class="btn">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    




    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>