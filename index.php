<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>  
    <title>Homepage</title>
    <link rel="stylesheet" href="design.css">
</head>

<body>
    <a href="create.html" id = 'add'>Add New Data</a><br/><br/>
    <table id = 'person'>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Update</th>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['age']."</td>";
            echo "<td>".$res['email']."</td>";  
            echo "<td><a id = 'update' href=\"update.php?id=$res[id]\">Edit</a> | <a id = 'delete' href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";       
        }
        ?>
    </table>
</body>
</html>