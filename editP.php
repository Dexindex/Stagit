<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}

require 'db.php';
$supId = $_SESSION['id'];
$sql = 'SELECT * FROM supervisor WHERE id=:supId';
$statement = $connection->prepare($sql);
$statement->execute([':supId' => $supId]);
$person = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && isset($_POST['email'])&& isset($_POST['tel'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];

        $sql = 'UPDATE supervisor SET name=:name, email=:email ,phone=:tel WHERE id=:supId'; 
        $statement = $connection->prepare($sql);
        $result = $statement->execute([':name' => $name, ':email' => $email,':tel' => $tel, ':supId' => $supId]);

        if ($result) {
            header("Location: ./index.php");
            exit;
        } else {
            echo '<script>alert("Failed to update Supervisor")</script>';
        }
    } else {
        echo '<script>alert("Please Fill All The Fields")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>➕ Update Supervisor</title>
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
            <input  value="<?= $person->name; ?>" type="text" class="form-control" id="floatingInput" placeholder="Jhon" name="name">
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input  value="<?= $person->email; ?>" type="email" class="form-control" id="floatingInput" placeholder="name@example.com"name="email">
            <label for="floatingInput">Email</label>
        </div>
        
        <div class="form-floating mb-6">
            <input type="tel" value="<?= $person->phone; ?>" class="form-control" id="floatingInput" placeholder="name@example.com" name="tel">
            <label for="floatingInput">Phone Number</label>
        </div>
        <button class="btn btn-outline-success" style="width: 100%;" type="submit" name="submit"><i class="fas fa-sync"></i> Update</button>

          
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