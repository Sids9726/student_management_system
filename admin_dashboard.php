<!DOCTYPE html>
<html lang="en">

<head>
    <title>admin_dashboard</title>
    <style>
        #header {
            background-color: black;
            position: fixed;
            height: 18%;
            width: 100%;


        }

        #left_side {
            background-color: lightyellow;
            position: fixed;
            width: 15%;
            height: 73%;
            top: 25%;
            border: 2px solid black;
        }

        #right_side {
            background-color: lightcyan;
            position: fixed;
            width: 80%;
            height: 73%;
            left: 18%;
            top: 25%;
            border: 2px black solid;
        }

        a {
            color: white;
            text-align: right;
            border: 2px solid white;
            position: fixed;
            left: 95%;
            top: 15%;
        }

        #marquee {
            position: fixed;
            background-color: blanchedalmond;
            color: red;
            top: 20%;
            width: 100%;
            font-size: 20px;
        }
    </style>

</head>

<?php

session_start();
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "sms");
//mysqli_close($con);
?>

<body>
    <div id="marquee">
        <marquee direction="left">
            Note : please fill up your details up to till 2021.
        </marquee>
    </div>

    <div id="header">

        <center style="color: white;">
            <h2>student management system </h2>
            email : <?php echo $_SESSION["email"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            name : <?php echo $_SESSION["name"]; ?>
        </center>
        <br><a href="logout.php">log out</a>
    </div>
    <div id="left_side">

        <form action="" method="POST">
            <table>
                <tr><br>
                    <td>
                        <br>
                    </td>
                    <td>
                        <input type="submit" name="search_student" value="Search student">
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td>
                        <br>
                    </td>
                    <td>
                        <input type="submit" name="edit_student" value="Edit student">
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td><br></td>
                    <td>
                        <input type="submit" name="add_new" value="Add new"><br>
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td><br></td>
                    <td>
                        <input type="submit" name="delete_student" value="Delete student"><br>
                    </td>
                </tr>
            </table>
        </form>

    </div>
    <div id="right_side"><br><br>
        <div id="demo">
            <?php
            if (isset($_POST["search_student"])) {
            ?>
                <center>
                    <form action="" method="POST">
                        <b>Search : </b><input type="text" name="enrollment_no" placeholder="Enrollment No.">
                        <input type="submit" name="search_by_enrollment_no_for_search" value="search">
                    </form>
                </center>
            <?php
            }
            ?>
            <?php
            if (isset($_POST["search_by_enrollment_no_for_search"])) {


                $query = "select * from student_info where enrollment_no= '" . $_POST["enrollment_no"] . "'";
                $query_run = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($query_run);
                if ($row["enrollment_no"] == $_POST["enrollment_no"]) {
            ?>
                    <table>
                        <form action="" method="POST">
                            <tr>
                                <td>enrollment no :</td>
                                <td><input type="text" value="<?php echo $row["enrollment_no"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td> department :</td>
                                <td><input type="text" value="<?php echo $row["department_name"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>surname :</td>
                                <td><input type="text" value="<?php echo $row["surname"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>student name :</td>
                                <td><input type="text" value="<?php echo $row["student_name"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>father name :</td>
                                <td><input type="text" value="<?php echo $row["father_name"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>birth date :</td>
                                <td><input type="text" value="<?php echo $row["birth_date"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>gender :</td>
                                <td><input type="text" value="<?php echo $row["gender"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>phone no :</td>
                                <td><input type="text" value="<?php echo $row["phone_no"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>email :</td>
                                <td><input type="text" value="<?php echo $row["email"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td> address :</td>
                                <td><textarea rows="3" cols="40" disabled><?php echo $row["address"] ?></textarea></td>
                            </tr>
                            <tr>
                                <td> remark :</td>
                                <td><input type="text" value="<?php echo $row["remark"] ?>" disabled></td>
                            </tr>
                        </form>
                    </table>

            <?php
                } else {
                    echo "<h3>data is not available!!!!</h3>";
                }
            }

            ?>



            <?php
            if (isset($_POST["edit_student"])) {
            ?>
                <center>
                    <form action="" method="POST">
                        <b>Search : </b><input type="text" name="enrollment_no" placeholder="Enrollment No.">
                        <input type="submit" name="search_by_enrollment_no_for_edit" value="edit">
                    </form>
                </center>
            <?php
            }
            ?>
            <?php
            if (isset($_POST["search_by_enrollment_no_for_edit"])) {


                $query = "select * from student_info where enrollment_no= '" . $_POST["enrollment_no"] . "'";
                $query_run = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($query_run);
                if ($row["enrollment_no"] == $_POST["enrollment_no"]) {
                    $_SESSION["enroll"] = $row["enrollment_no"];
            ?>
                    <table>
                        <form action="admin_edit_student.php" method="POST">
                            <tr>
                                <td>enrollment no :</td>
                                <td><input type="text" disabled name="enrollment_no" value="<?php echo $row["enrollment_no"] ?>"></td>
                            </tr>

                            <tr>
                                <td> department :</td>
                                <td><input type="text" name="department_name" value="<?php echo $row["department_name"] ?>"></td>
                            </tr>
                            <tr>
                                <td>surname :</td>
                                <td><input type="text" name="surname" value="<?php echo $row["surname"] ?>"></td>
                            </tr>
                            <tr>
                                <td>student name :</td>
                                <td><input type="text" name="student_name" value="<?php echo $row["student_name"] ?>"></td>
                            </tr>
                            <tr>
                                <td>father name :</td>
                                <td><input type="text" name="father_name" value="<?php echo $row["father_name"] ?>"></td>
                            </tr>
                            <tr>
                                <td>birth date :</td>
                                <td><input type="text" name="birth_date" value="<?php echo $row["birth_date"] ?>"></td>
                            </tr>
                            <tr>
                                <td>gender :</td>
                                <td><input type="text" name="gender" value="<?php echo $row["gender"] ?>"></td>
                            </tr>
                            <tr>
                                <td>phone no :</td>
                                <td><input type="text" name="phone_no" value="<?php echo $row["phone_no"] ?>"></td>
                            </tr>
                            <tr>
                                <td>email :</td>
                                <td><input type="text" name="email" value="<?php echo $row["email"] ?>"></td>
                            </tr>
                            <tr>
                                <td> address :</td>
                                <td><textarea rows="3" cols="40" name="address"><?php echo $row["address"] ?></textarea></td>
                            </tr>
                            <tr>
                                <td> remark :</td>
                                <td><input type="text" name="remark" value="<?php echo $row["remark"] ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="edit" value="save"></td>
                            </tr>
                        </form>
                    </table>

            <?php
                } else {
                    echo "<h3>data is not available!!!!</h3>";
                }
            }

            ?>



            <?php
            if (isset($_POST["add_new"])) {
            ?>
                <center>
                    <form action="" method="POST">
                        <input type="text" name="enrollment_no" placeholder="Enrollment No.">
                        <input type="submit" name="search_by_enrollment_no_for_add" value="add">
                    </form>
                </center>
            <?php
            }
            ?>

            <?php
            if (isset($_POST["search_by_enrollment_no_for_add"])) {

                $query = "select * from student_info where enrollment_no= '" . $_POST["enrollment_no"] . "'";
                $query_run = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($query_run);
                if ($row["enrollment_no"] != $_POST["enrollment_no"]) {
                    $_SESSION["enroll"] = $_POST["enrollment_no"];

            ?>
                    <table>
                        <form action="admin_add_student.php" method="POST">
                            <tr>
                                <td>enrollment no :</td>
                                <td><input type="text" disabled value="<?php echo $_POST["enrollment_no"] ?>"></td>
                            </tr>

                            <tr>
                                <td> department :</td>
                                <td><input type="text" name="department_name"></td>
                            </tr>
                            <tr>
                                <td>surname :</td>
                                <td><input type="text" name="surname"></td>
                            </tr>
                            <tr>
                                <td>student name :</td>
                                <td><input type="text" name="student_name"></td>
                            </tr>
                            <tr>
                                <td>father name :</td>
                                <td><input type="text" name="father_name"></td>
                            </tr>
                            <tr>
                                <td>birth date :</td>
                                <td><input type="text" name="birth_date" placeholder="dd/mm/yyyy"></td>
                            </tr>
                            <tr>
                                <td>gender :</td>
                                <td><input type="text" name="gender"></td>
                            </tr>
                            <tr>
                                <td>phone no :</td>
                                <td><input type="text" name="phone_no"></td>
                            </tr>
                            <tr>
                                <td>email :</td>
                                <td><input type="text" name="email"></td>
                            </tr>
                            <tr>
                                <td> address :</td>
                                <td><textarea rows="3" cols="40" name="address"></textarea></td>
                            </tr>
                            <tr>
                                <td> remark :</td>
                                <td><input type="text" name="remark"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="add" value="save"></td>
                            </tr>
                        </form>
                    </table>

                <?php
                } else {
                ?>
                    <script>
                        alert("data is already exist..");
                    </script>
            <?php
                    //echo "<h3>data is already exist</h3>";
                }
            }

            ?>




            <?php
            if (isset($_POST["delete_student"])) {
            ?>
                <center>
                    <form action="" method="POST">
                        <b>Search : </b><input type="text" name="enrollment_no" placeholder="Enrollment No.">
                        <input type="submit" name="search_by_enrollment_no_for_delete" value="delete">
                    </form>
                </center>
            <?php
            }
            ?>
            <?php
            if (isset($_POST["search_by_enrollment_no_for_delete"])) {


                $query = "select * from student_info where enrollment_no= '" . $_POST["enrollment_no"] . "'";
                $query_run = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($query_run);
                if ($row["enrollment_no"] == $_POST["enrollment_no"]) {
                    $_SESSION["enroll"] = $row["enrollment_no"];
            ?>
                    <table>
                        <form action="admin_delete_student.php" method="POST">
                            <tr>
                                <td>enrollment no :</td>
                                <td><input type="text" value="<?php echo $row["enrollment_no"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td> department :</td>
                                <td><input type="text" value="<?php echo $row["department_name"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>surname :</td>
                                <td><input type="text" value="<?php echo $row["surname"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>student name :</td>
                                <td><input type="text" value="<?php echo $row["student_name"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>father name :</td>
                                <td><input type="text" value="<?php echo $row["father_name"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>birth date :</td>
                                <td><input type="text" value="<?php echo $row["birth_date"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>gender :</td>
                                <td><input type="text" value="<?php echo $row["gender"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>phone no :</td>
                                <td><input type="text" value="<?php echo $row["phone_no"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>email :</td>
                                <td><input type="text" value="<?php echo $row["email"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td> address :</td>
                                <td><textarea rows="3" cols="40" disabled><?php echo $row["address"] ?></textarea></td>
                            </tr>
                            <tr>
                                <td> remark :</td>
                                <td><input type="text" value="<?php echo $row["remark"] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="delete" value="delete"></td>
                            </tr>
                        </form>
                    </table>

            <?php
                } else {
                    echo "<h3>data is already unavailable... !!!</h3>";
                }
            }

            ?>


        </div>
    </div>
</body>

</html>