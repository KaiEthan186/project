<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Alert</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="inputField" placeholder="Enter something">
        <button type="submit" name="submit">Yes</button>
        <button type="submit" onclick="showAlert()" name="submit1">No</button>
    </form>
</body>
</html>

<?php 
if(isset($_POST['submit'])) {
    $input = $_POST['inputField'];
    echo "<script>
            swal({
                title: 'Input Received',
                text: 'You entered: $input',
                icon: 'success',
                button: 'OK',
            });
          </script>";
}

else if(isset($_POST['submit1'])) {
    echo "<script>
            swal({
                title: 'Action Cancelled',
                text: 'You clicked No',
                icon: 'error',
                button: 'OK',
            });
          </script>";
}

?>