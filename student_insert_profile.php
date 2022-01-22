<?php
session_start();
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "sms");

$query = "insert into student_info(enrollment_no,surname,father_name,department_name,birth_date,gender,phone_no,address,remark)values
('" . $_SESSION["enroll"] . "','" . $_POST["surname"] . "',
'" . $_POST["father_name"] . "','" . $_POST["department_name"] . "',
'" . $_POST["birth_date"] . "',
'" . $_POST["gender"] . "','" . $_POST["phone_no"] . "',
'" . $_POST["address"] . "',
'" . $_POST["remark"] . "')";

$q1 = "update student_info set email= '" . $_POST["email"] . "',student_name= '" . $_POST["student_name"] . "'where enrollment_no = '" . $_SESSION["enroll"] . "'";
$q2 = "update student set email= '" . $_POST["email"] . "',student_name= '" . $_POST["student_name"] . "'where enrollment_no = '" . $_SESSION["enroll"] . "'";

$query_run = mysqli_query($con, $query);
$query_run = mysqli_query($con, $q1);
$query_run = mysqli_query($con, $q2);


?>
<script>
    alert("data add successfully");
    window.location.href = "student_dashboard.php";
</script>