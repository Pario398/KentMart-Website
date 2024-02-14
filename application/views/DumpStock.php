<?php

   echo "<title>Current Stock</title>";

   echo "<table border='1' style='float: left; margin-left: 20px'>";
   echo "<tr><th>Description</th><th>Id</th><th>Price</th><th></th></tr>";

   foreach ($Stock as $item) {
      echo "<tr>";
      echo "<td>" . $item->product . "</td>";
      echo "<td>" . $item->Id . "</td>";
      echo "<td>" . $item->price . "</td>";
      echo "</tr>";
   }

?>
