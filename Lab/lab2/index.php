<?php
require_once 'student.php';
//khởi tạo đối tượng thuộc class
$st1 = new student();
$st2 = new student();
$st3 = new student();
$st4 = new student();

echo $st1->setName("Quân");
echo $st1->getName();
echo $st1->getEmail();
echo '<pre>';
// var_dump($st1);
// var_dump($st2); 
// var_dump($st3);
// var_dump($st4);


?>