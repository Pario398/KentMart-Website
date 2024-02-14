<html>

<head>
    <title>Request Output</title>
    <style>
        body {
            background-color: #333;
            color: #fff;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 32px auto;
            background-color: #444;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 16px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td {
            color: white;
        }

        td a {
            color: white;
        }

        td a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    echo "<table border='1' style='float: left; margin-left: 20px'>";
    echo "<tr><th>Description</th><th>Id</th><th>Price</th></tr>";
    if ($results != NULL) {
        foreach($results as $result)
        {
            echo "<tr><td>" . $result->product . "</td><td><a href='restock/" . $result->Id . "'>" . $result->Id . "</a></td><td>" . $result->price . "</td></tr>";
        }
    }
    
    ?>
</body>

</html>