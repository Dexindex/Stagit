<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location: index.php");
}


require 'db.php';


if(isset($_POST["submit"])){
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = 'SELECT * FROM supervisor WHERE email = :email';
        $statement = $connection->prepare($sql);
        $statement->execute([':email' => $email]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
            // Compare hashed password with password entered in login form
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];
                header("Location: index.php");
            } else {
                echo '<script>alert("Wrong Password") </script>';
            }
        } else {
            echo '<script>alert("No User Found") </script>';
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
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bulma.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/normalize.css">
    <script src="js/jquery-3.6.4.min.js"></script>
    <link rel="shortcut icon" href="images/Stagit-1.png" type="image/x-icon">
    <style>

    </style>
</head>

<body>
    <div class="container p-6 mt-6">



        <!-- Table Section -->
        <div class="box">
            <form action="login.php" method="post">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="Jhon" name="email">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com" name="password">
                    <label for="floatingInput">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <a href="register.php" class="has-text-link-dark">I'Dont Have Account</a>
                </div>

                <button class="btn btn-outline-success" style="width: 100%;" name="submit">Login</button>


            </form>
        </div>
        <!-- Table Section -->




    </div>









    <!--Script Linking-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/tailwind-min.3.3.3.js"></script>


    <!--Script Linking End -->
</body>

</html>