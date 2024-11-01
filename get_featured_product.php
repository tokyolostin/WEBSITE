<?php
 include ('connection.php');
 $stmt=$conn->prepare("SELECT * FROM products ");
 $stmt->execute();
 $featured_product=$stmt->get_result();


 ?>