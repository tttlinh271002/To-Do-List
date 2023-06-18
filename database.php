<?php
$conn = new mysqli("localhost","root","","todolist");
// Check connection
if ($conn->connect_errno) {
  echo "Lỗi kết nối MySQL" . $conn->connect_error;
  exit();
}
?>