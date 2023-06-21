<?php
include '../database.php';

$id = $_POST["id"];
$title = $_POST["title"];
$description = $_POST["description"];
$odate =  $_POST["odate"];
$piority = $_POST["piority"];
$sql = "UPDATE `list` SET `title` = '$title', `description` = '$description', `odate` = '$odate', `piority` = '$piority' WHERE `list`.`id` = '$id' " or die("sql Query");
if (mysqli_query($conn , $sql)) {
	echo 1;
}
else{
	echo 0;
}
?>
