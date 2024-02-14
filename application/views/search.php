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

  /* Form styles */
  form {
    display: inline-block;
    background-color: #333;
    padding: 20px;
    border-radius: 10px;
    width: 50%;
    margin-top: 50px;
  }

  /* Input and label styles */
  input[type="text"],
  input[type="submit"] {
    background-color: #444;
    color: #fff;
    border: none;
    padding: 10px;
    width: 80%;
    border-radius: 5px;
    margin-bottom: 10px;
    display: block;
    margin: 0 auto;
  }

  /* Button styles */
  input[type="submit"] {
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
</style>

<head>
  <title>RS898 Search</title>
</head>

<body>
  <!-- The product search page has the following heading, “rs898’s Product Search Page” -->
  <h1>RS898’s Product Search Page</h1>

  <form method="post" action="http://raptor.kent.ac.uk/proj/comp5390/kentmart/rs898/index.php/Kentmart/searchProcessor">
    <h3></h3>
    <!-- It should include a text field for a customer to type in a search term -->
    <input type='text' name='productName' placeholder="Please enter a search term">
    <!-- It should include a button labelled “search”-->
    <input type='submit' name='submit' value='search'>
  </form>
  <input type="button"
    onclick="window.location.href = 'http://raptor.kent.ac.uk/proj/comp5390/kentmart/rs898/index.php/Kentmart/logout'"
    value="LogOut">

</body>


</html>