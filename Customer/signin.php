<?php
if(!isset($_SESSION))
{
    session_start();
}
require_once "../admin/dbconnect.php";
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ulogin']))
{
    $password = $_POST['password'];
    $email = $_POST['email'];

    try{
        $sql = "select * from users where email=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $userInfo = $stmt->fetch(); // user record
        if($userInfo) // if email exists
        { // need to verify password is correct
            if(password_verify($password, $userInfo['password'])) // password is correct
            {
                $_SESSION['email'] = $userInfo['email'];
                $_SESSION['profilePath'] = $userInfo['profilePath'];
                $_SESSION['loginSuccess'] = "login success!!";
                header("Location:customerView.php");
            }
            else{ // incorrect password
                $errorMessage = "password is incorrect";

            }
        }
        else{ // if email does not exist
            $errorMessage = "Email does not exist.";
            
        } // end of userinfo
    }catch(PDOException $e)
    {
        echo $e->getMessage();
    }

    
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            require_once("navi.php");


            ?>
        </div>


     <div class="row">
        <div class="col-md-6 mx-auto py-5">
        <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post" calss="form bg-light border-1">

            <?php 
                if(isset($errorMessage))
                {
                    echo "<p class='alert alert-danger'>$errorMessage</p>";

                }
            ?>


            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">

            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-outline-primary" name="ulogin">Login</button>
        </form>
        </div>

    </div>

</body>
</html>