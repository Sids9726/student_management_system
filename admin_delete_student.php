<?php
session_start();
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "sms");

$query = "delete from student_info where enrollment_no ='" . $_SESSION["enroll"] . "'";
$query_run = mysqli_query($con, $query);


?>
<script>
    alert("data deleted successfully");
    window.location.href = "admin_dashboard.php";
</script>