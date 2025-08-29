<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer View</title>
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
            <div class="col-md-2">

            </div>
            <div class="col-md-10">
                <?php if(isset($_SESSION["loginSuccess"])): ?>
                    <h3>Welcome <?php echo $_SESSION['email']; ?></h3>
                <?php else: ?>
                    <h3>Welcome Guest</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>