<?php 
include "connection_database.php";
$b = 'iloveyou';
echo sha1($conn->real_escape_string($b));
echo "____";
$a = 'testuser2';
echo sha1($conn->real_escape_string($a));
//echo password_verify("1245678",'$2y$10$YPNThuJmYWxmqn8sCat3DOXpv8dJJyIk.q/Qj2Gv7q2');
?>