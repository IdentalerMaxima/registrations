<?php
$failure = false;
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('connect.php');

    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM `registration` WHERE `username` = '$username'";

    $result = mysqli_query($connection, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $failure = true;
        } else {
            $sql = "INSERT INTO `registration` (`username`, `password`) VALUES ('$username', '$password')";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                $success = true;
            } else {
                echo mysqli_error($connection);
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <title>Signup page</title>
</head>

<body>
<?php
if ($failure) {
    echo '<div class="alert alert-warning" role="alert">
    User already exists
    </div>';
} elseif ($success) {
    echo '<div class="alert alert-success" role="alert">
    You have successfully signed up
    </div>';
}
?>
    <h1 class="text-center">Sign up page</h1>
    <div class="container mt-5">
        <form action="sign.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter ur name" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign up</button>
        </form>
    </div>
</body>



</html>