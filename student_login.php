<html>

<head>
    <title>student login</title>

    <style>
        fieldset {
            width: 260px;
            background-color: aquamarine;
        }

        input {
            margin: 2px;
            padding: 2px;
        }

        form {
            background-color: aquamarine;
        }
    </style>

</head>
<?php
session_start();
?>

<body><br><br><br><br><br><br><br>
    <center>
        <fieldset>
            <legend><b>student login</b></legend>

            <form action="" method="POST">

                Email id:&nbsp;&nbsp;&nbsp;<input type="text" placeholder="email" name="email" required><br><br>
                password:&nbsp;<input type="password" placeholder="password" name="password" required><br><br>
                <input type="submit" name="submit" style="background-color: bisque;">

            </form>
        </fieldset>
        <?php

        if (isset($_POST["submit"])) {

            $con = mysqli_connect("localhost", "root", "");
            mysqli_select_db($con, "sms");

            $query = "select * from student where email='" . $_POST["email"] . "'";
            $query_run = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($query_run);
            if ($row) {
                if ($row["email"] == $_POST["email"]) {
                    if ($row["password"] == $_POST["password"]) {
                        $_SESSION["e"] = $row["email"];
                        $_SESSION["n"] = $row["student_name"];
                        $_SESSION["enroll"] = $row["enrollment_no"];
                        $_SESSION["s_name"] = $row["student_name"];

                        header("location:student_dashboard.php");
                    } else {
                        echo "wrong password";
                    }
                }
            } else echo "wrong email id";

            mysqli_close($con);
        }
        ?>
        <p>if you have not an account ? <a href="create_account.php">Create account</a></p>
    </center>

</body>

</html>