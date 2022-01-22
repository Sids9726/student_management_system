<?php
session_start();
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "sms");

$query = "insert into student_info(enrollment_no,surname,father_name,department_name,student_name,birth_date,gender,phone_no,email,address,remark)values
('" . $_SESSION["enroll"] . "','" . $_POST["surname"] . "',
'" . $_POST["father_name"] . "','" . $_POST["department_name"] . "',
'" . $_POST["student_name"] . "','" . $_POST["birth_date"] . "',
'" . $_POST["gender"] . "','" . $_POST["phone_no"] . "',
'" . $_POST["email"] . "','" . $_POST["address"] . "',
'" . $_POST["remark"] . "')";
$query_run = mysqli_query($con, $query);


?>
<script>
    alert("data add successfully");
    window.location.href = "admin_dashboard.php";
</script>