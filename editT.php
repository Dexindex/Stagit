<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}

require 'db.php';

$id = $_GET['id'];
$sql = 'SELECT * FROM trainee WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id]);
$person = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['submit'])) {
    if (isset($_POST['nEvalD']) && isset($_POST['stat'])) {
        $nEvalD = $_POST['nEvalD'];
        $stat = $_POST['stat'];

        $sql = 'UPDATE trainee SET status=:stat, nextevaluationDate=:nEvalD WHERE id=:id'; 
        $statement = $connection->prepare($sql);
        $result = $statement->execute([':nEvalD' => $nEvalD, ':stat' => $stat, ':id' => $id]);

        if ($result) {
            header("Location: ./index.php");
            exit;
        } else {
            echo '<script>alert("Failed to update trainee")</script>';
        }
    } else {
        echo '<script>alert("Please Fill All The Fields")</script>';
    }
}

// Set error reporting to only show fatal errors
error_reporting(E_ERROR);

// Turn off error display
ini_set('display_errors', 0);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>➕ Update Trainee</title>
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



        <div class="box">
            <form method="post">
                <div class="form-floating mb-3">
                    <input disabled value="<?= $person->name; ?>" type="text" class="form-control" id="floatingInput" placeholder="Jhon">
                    <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input disabled value="<?= $person->email; ?>" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" value="<?= $person->nextevaluationDate; ?>" class="form-control" id="floatingInput" placeholder="name@example.com" name="nEvalD">
                    <label for="floatingInput">Next Evaluation Date</label>
                </div>
                <div class="form-floating mb-6">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="stat">
                        <option disabled selected>Status</option>
                        <option value="Complet">Complet</option>
                        <option value="Active">Active</option>
                        <option value="Leave">Leave</option>
                    </select>
                </div>
                <button class="btn btn-outline-success" style="width: 100%;" type="submit" name="submit"><i class="fas fa-sync"></i> Update</button>


            </form>
        </div>




    </div>









    <!--Script Linking-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/tailwind-min.3.3.3.js"></script>


    <!--Script Linking End -->
</body>

</html>