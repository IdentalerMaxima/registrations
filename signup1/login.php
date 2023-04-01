<?php
$invalid = false;
$login = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('connect.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `registration` WHERE `username` = '$username' and `password` = '$password'";

    $result = mysqli_query($connection, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $login = true;
            session_start();
            $_SESSION['username'] = $username;
            header("location: home.php");
            
        } else {
            $invalid = true;
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

    <title>Login page</title>
</head>

<body>
    <?php
    if ($invalid) {
        echo '<div class="alert alert-warning" role="alert">
    Invalid username or password!
    </div>';
    } elseif ($login) {
        echo '<div class="alert alert-success" role="alert">
    You have successfully logged in!
    </div>';
    }
    ?>
    <h1 class="text-center">Login to our website</h1>
    <div class="container mt-5">
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter ur name" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>

</html>