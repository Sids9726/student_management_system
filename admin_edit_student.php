<?php
session_start();
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "sms");

$query = "update student_info set surname= '" . $_POST["surname"] . "',
father_name= '" . $_POST["father_name"] . "',department_name= '" . $_POST["department_name"] . "',
student_name= '" . $_POST["student_name"] . "',birth_date= '" . $_POST["birth_date"] . "',
gender= '" . $_POST["gender"] . "',phone_no= '" . $_POST["phone_no"] . "',
email= '" . $_POST["email"] . "',address= '" . $_POST["address"] . "',
remark= '" . $_POST["remark"] . "' where enrollment_no = '" . $_SESSION["enroll"] . "'";
$query_run = mysqli_query($con, $query);

?>
<script>
    alert("data update successfully");
    window.location.href = "admin_dashboard.php";
</script>