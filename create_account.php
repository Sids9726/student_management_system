<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create account</title>
    <style>

    </style>
</head>

<body>

    <div>
        <div id="page1"><br><br><br><br><br><br><br><br>
            <center>
                <h1>Create your account</h1>
                <form action="" method="POST">
                    <table>
                        <tr>
                            <td>enrollment no : </td>
                            <td><input type="text" name="enrollment_no" required></td>
                        </tr>
                        <tr>
                            <td>student name : </td>
                            <td><input type="text" name="student_name" placeholder="single name" required></td>
                        </tr>
                        <tr>
                            <td>email id &nbsp;&nbsp;: </td>
                            <td><input type="text" name="email" required></td>
                        </tr>
                        <tr>
                            <td>password : </td>
                            <td><input type="text" name="password1" required></td>
                        </tr>
                        <tr>
                            <td>confirm password : </td>
                            <td><input type="text" name="password2" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="sign-up" value="sign-up"></td>
                        </tr>
                    </table>
                </form>


            </center>
        </div><br><br>
        <div id="page2">
            <center>
                <?php

                if (isset($_POST["sign-up"])) {
                    if ($_POST["password1"] != $_POST["password2"]) {
                        echo "password is not matched ! please check and Re-enter your password...";
                    } else {
                        $con = mysqli_connect("localhost", "root", "");
                        mysqli_select_db($con, "sms");

                        $q1 = "insert into student(enrollment_no,student_name,email,password)values
                         ('" . $_POST["enrollment_no"] . "','" . $_POST["student_name"] . "','" . $_POST["email"] . "'," . $_POST["password1"] . ")";
                        mysqli_query($con, $q1);
                ?>
                        <script>
                            alert("your account created successfully !");
                            window.location.href = "student_login.php";
                        </script>
                <?php
                    }
                }
                ?>
            </center>
        </div>
    </div>

</body>

</html>