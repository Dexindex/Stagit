<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location: index.php");
}


require 'db.php'; 

if(isset($_POST["submit"])){
    if(isset($_POST['name']) && isset($_POST['tel']) && isset($_POST['email']) && isset($_POST['password']) ) {
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO supervisor(name, email, phone, password) VALUES(:name, :email,:tel, :hash)'; 
        $statement = $connection->prepare($sql); 
        try { 
            $statement->execute([':name'=> $name, ':email'=> $email , ':tel'=> $tel, ':hash'=> $hash]); 
            header("Location: login.php");
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo '<script>alert("This Email Is Alredy Used") </script>'; 
            } else { 
                echo '<script>alert("An Error Ocured,Try Again") </script>'; 
            } 
        } 
    } 
    else{
        echo '<script>alert("All Fields Are Required") </script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    <form method="post">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Jhon" name="name">
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="tel" class="form-control" id="floatingInput" placeholder="Jhon" name="tel">
            <label for="floatingInput">Phone Number</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="Jhon" name="email">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com" name="password">
            <label for="floatingInput">Password</label>
        </div>
        <div class="form-floating mb-3">
            <a href="login.php" class="has-text-link-dark">I'Alredy Have An Account</a>
        </div>

        <button type="submit" class="btn btn-outline-success" style="width: 100%;" name="submit">Register</button>

          
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