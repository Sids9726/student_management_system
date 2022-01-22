<!DOCTYPE html>
<html lang="en">

<head>
    <title>login page</title>
</head>

<body>
    <center>
        <h2>student management system </h2>
        <form action="" method="POST">
            <input type="submit" name="admin_login" value="admin login">
            <input type="submit" name="student_login" value="student login">
        </form>
        <?php

        if (isset($_POST["admin_login"])) {
            header("Location: admin_login.php");
        }

        if (isset($_POST["student_login"])) {
            header("Location: student_login.php");
        }
        ?>

    </center>

</body>

</html>
