<?php
session_start();
if (isset($_SESSION['stu_id']) && $_SESSION['stu_accesslevel'] == 'Student') {
} else {
    header("Location: login.php?msg= Student must login first");
}
