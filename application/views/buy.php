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

    input[type="button"] {
        background-color: #f44336;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin: 10px auto;
        display: block;
    }

    input[value="Return to Search"] {
        background-color: #4CAF50;
        color: white;
    }
</style>
<title>RS898 Buy</title>
<?php
    // The heading for the page should be, “How many of Id would you like to buy from RS898”
    echo '<h2>How much of ID:' . $parameter . ' would you like to buy from RS898</h2>';
    echo '<form action="http://raptor.kent.ac.uk/proj/comp5390/kentmart/rs898/index.php/Kentmart/buyProcessor/' . $parameter . '" method="post">';
    echo '<label for="quantity">Quantity:</label><br>';
    //  There should be a text box where the number of items desired is entered, and a “buy” button.
    echo '<input type="number" pattern="^[0-9]*$" min="0" id="quantity" name="quantity" placeholder="Please enter the buy quantity"><br>';
    echo '<button type="submit">Buy</button>';
    echo '</form>';
    echo '<input type="button" onclick="window.location.href = \'http://raptor.kent.ac.uk/proj/comp5390/kentmart/rs898/index.php/Kentmart/search\'" value="Return to Search">';
    echo '<input type="button" onclick="window.location.href =\'http://raptor.kent.ac.uk/proj/comp5390/kentmart/rs898/index.php/Kentmart/logout\'" value="LogOut">';

?>

</html>