<?php

include 'student.php';

$sv1 = new student("Nguyễn Văn A", "PH001", "Phát triển web");
$sv2 = new student("Trần Thị B", "PH002", "Khoa học dữ liệu");

echo "<h2>Thông tin sinh viên:</h2>";
echo "<p>" . $sv1->getinfo() . "</p>";
echo "<p>" . $sv2->getinfo() . "</p>";

?>