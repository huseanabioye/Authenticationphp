<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Signup</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto shadow p-5">

                <?php

                session_start();

                if (isset($_SESSION['message'])) {
                    echo "<div class='alert alert-danger text-center'>" . $_SESSION['message'] . "</div>";
                }

                session_unset();
                ?>


                <form action="process_signup.php" method="post">
                    <h6 class="display-6 text-muted text-center">SIGN UP</h6>
                    <input type="text" class="form-control mb-3" placeholder="full_name" name="name">
                    <input type="text" class="form-control mb-3" placeholder="Email" name="email">
                    <input type="text" class="form-control mb-3" placeholder="phone Number" name="phone_no">
                    <input type="text" class="form-control mb-3" placeholder="Address" name="address">
                    <input type="text" class="form-control mb-3" placeholder="password" name="password">
                    <input type="submit" class="btn btn-info w-100" placeholder="Submit" name="submit">
                </form>

            </div>
        </div>
    </div>

</body>

</html>