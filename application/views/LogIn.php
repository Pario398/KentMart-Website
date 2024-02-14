<!DOCTYPE html>
<html>

<head>
  <title>Welcome to kentmart – by RS898</title>
  <style type="text/css">
    /* Body and text styles */
    body {
      background-color: #000000;
      color: #ffffff;
      font-family: Arial, sans-serif;
    }

    /* Headings */
    h1 {
      color: #ffffff;
      text-align: center;
      margin-top: 50px;
    }

    /* Form styles */
    .login-form {
      background-color: #333333;
      padding: 20px;
      border-radius: 10px;
      margin: 0 auto;
      width: 50%;
      text-align: center;
    }

    /* Input and label styles */
    .form-control {
      background-color: #444444;
      color: #ffffff;
      border: none;
      padding: 10px;
      width: 98%;
      border-radius: 5px;
      margin-bottom: 10px;
      display: block;
    }

    label {
      display: block;
      margin-bottom: 10px;
      text-align: left;
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

    button[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <h1>Welcome to kentmart – by RS898</h1>
  <div class="login-form">
    <?php
      $this->load->helper('form_helper');
      echo form_open("Kentmart/loginProcessor/");
      echo "<label>Username</label>";
      echo '<input type="text" class="form-control" id="username" name ="username" placeholder="Enter username">';
      echo "<label>Password</label>";
      echo '<input type="password" class="form-control" id="password" name ="password" placeholder="Enter password">';
      echo '<button type="submit" class="btn btn-primary">Log in</button>';
    ?>
  </div>
</body>

</html>