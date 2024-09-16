
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sigin</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto shadow p-5">

                 <?php
session_start();
require "db.php";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the query
    $query = "SELECT * FROM users WHERE email = ?";
    $querydb = $connet->prepare($query);
    $querydb->bind_param("s", $email);

    // Execute the query
    $querydb->execute();
    $result = $querydb->get_result();

    if ($result->num_rows < 1) {
        echo "<div class='alert alert-danger text-center'>No Details Found</div>";
    } else {
        $userDetails = $result->fetch_assoc();
        $hashedPassword = $userDetails['password'];
        $verify = password_verify($password, $hashedPassword);

        if ($verify) {
            $_SESSION['user_id'] = $userDetails['user_id'];
            header("Location: dashboard.php");
            exit; // Exit the script after redirect
        } else {
            echo "<div class='alert alert-danger text-center'>Invalid Password.</div>";
            // header("Location: signup.php");
        }
    }
}
                ?> 


                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <h6 class="display-6 text-muted text-center">SIGN IN</h6>
                    <!-- <input type="text" class="form-control mb-3" placeholder="full_name" name="name"> -->
                    <input type="text" class="form-control mb-3" placeholder="Email" name="email">
                    <!-- <input type="text" class="form-control mb-3" placeholder="phone Number" name="phone_no"> -->
                    <!-- <input type="text" class="form-control mb-3" placeholder="Address" name="address"> -->
                    <input type="text" class="form-control mb-3" placeholder="password" name="password">
                    <input type="submit" class="btn btn-info w-100" placeholder="Submit" name="submit">
                </form>

            </div>
        </div>
    </div>

</body>

</html>