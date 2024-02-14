<html>
<style>
    /* Body and text styles */
    body {
        background-color: #1c1c1c;
        color: #fff;
        font-family: Arial, sans-serif;
        text-align: center;
    }

    /* Headings */
    h1 {
        color: #fff;
        margin-top: 50px;
    }

    h4 {
        color: #fff;
        margin-bottom: 10px;
    }

    /* Table styles */
    table {
        margin: 0 auto;
        margin-top: 50px;
        border-collapse: collapse;
        width: 80%;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #333;
        color: white;
    }

    /* Link styles */
    a {
        color: #fff;
        text-decoration: none;
    }

    a:hover {
        color: #4CAF50;
    }

    /* Button styles */
    input[type="button"] {
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin: 10px auto;
        display: block;
        margin-top: 20px;
    }

    input[value="Return to Search"] {
        background-color: #4CAF50;
        color: white;
    }

    input[value="LogOut"] {
        background-color: #f44336;
        color: white;
    }
</style>

<head>
    <title>RS898 Search output</title>
</head>

<body>
    <?php
    // The items found by the search should be returned in a table with the title, “rs898 suggests the following:”
    echo "<h1>RS898 suggests the following:</h1>";
    echo "<h4>Please click on the ID column for an action</h4>";
    echo "<table border='1' style='float: left; margin-left: 20px'>";
    echo "<tr><th>Product</th><th>Price</th><th>ID</th></tr>";
    if ($results != NULL) {
        foreach ($results as $result) {
            // The HTML table should include the following fields from the Stock SQL table: “product”, “price” and “Id”.
            // kentmart/buy/Id is where authenticated customers make purchases. It is linked from the HTML table returned by the search
            echo "<tr><td>" . $result->product . "</td><td>" . $result->price . "</td><td><a href='buy/" . $result->Id . "'>" . $result->Id . "</a></td></tr>";
        }
    }
    echo "</table>";
    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";
    echo '<input type="button" onclick="window.location.href = \'http://raptor.kent.ac.uk/proj/comp5390/kentmart/rs898/index.php/Kentmart/search\'" value="Return to Search">';
    echo '<input type="button" onclick="window.location.href = \'http://raptor.kent.ac.uk/proj/comp5390/kentmart/rs898/index.php/Kentmart/logout\'" value="LogOut">';

    ?>
</body>

</html>