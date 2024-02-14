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
    h2 {
        color: #fff;
        margin-top: 50px;
    }

    /* Form styles */
    form {
        display: inline-block;
        background-color: #333;
        padding: 20px;
        border-radius: 10px;
        width: 50%;
        margin-top: 50px;
        text-align: left;
    }

    /* Input and label styles */
    input[type="number"] {
        background-color: #444;
        color: #fff;
        border: none;
        padding: 10px;
        width: 98%;
        border-radius: 5px;
        margin-bottom: 10px;
        display: inline-block;
    }

    label {
        color: #fff;
        font-size: 16px;
        display: inline-block;
        margin-right: 10px;
    }

    /* Button styles */
    button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin: 10px auto;
        display: block;
    }
    
    input[value="Return to Search"] {
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin: 10px auto;
        display: block;
        background-color: #4CAF50;
        color: white;
    }

    input[value="LogOut"] {
        background-color: #f44336;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin: 10px auto;
        display: block;
    }
</style>
<title>RS898 Restock</title>
<?php
    echo '<h2>How much of ID:' . $parameter . ' would you like to restock from RS898</h2>';
    echo '<form action="http://raptor.kent.ac.uk/proj/comp5390/kentmart/rs898/index.php/Kentmart/restockProcessor/' . $parameter . '" method="post">';
    // There should be a text box where the number to be added 
    // can be entered, and a “restock” button
    echo '<label for="quantity">Quantity:</label><br>';
    echo '<input type="number" pattern="^[0-9]*$" min="0" id="quantity" name="quantity" placeholder="Please enter the restock quantity"><br>';
    echo '<button type="submit">Restock</button>';
    echo '</form>';
    echo '<input type="button" onclick="window.location.href = \'http://raptor.kent.ac.uk/proj/comp5390/kentmart/rs898/index.php/Kentmart/search\'" value="Return to Search">';
    echo '<input type="button" onclick="window.location.href =\'http://raptor.kent.ac.uk/proj/comp5390/kentmart/rs898/index.php/Kentmart/logout\'" value="LogOut">';
?>

</html>