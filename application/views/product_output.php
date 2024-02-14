<?php
echo "<title>Request Output</title>";

echo "<table border='1' style='float: left; margin-left: 20px'>";
echo "<tr><th>Description</th><th>Id</th><th>Price</th></tr>";
if ($Item != NULL){ 
    echo "<tr><td>" . $Item->product . "</td><td>" . $Item->Id . "</td><td>" . $Item->price . "</td></tr>";
}

echo "</table>"
/*
foreach($Item as $product){
    echo gettype($product);
}*/
?>