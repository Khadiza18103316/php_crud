<?php

$connect =mysqli_connect("localhost","root", "", "php_crud");
$id =  $_GET['idNo'];

$read = "SELECT * FROM insert_data WHERE Id = $id";
$query = mysqli_query($connect, $read);
$row = mysqli_fetch_array($query);

if(isset($_POST['edit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $dept=$_POST['dept'];

    $update = "UPDATE insert_data SET name = '$name', email='$email', password = '$password', phone= '$phone', dept='$dept' WHERE Id = $id ";

    $query = mysqli_query($connect, $update);

    if($query){
        echo"<script>alert('Data Edit success')</script>";
      }
      else{
        echo"<script>alert('Data Edit failed')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>

    <style>
    .container {
        width: 500px;
        height: 400px;
        margin: 0 auto;
        text-align: center;
    }

    input {
        border: 2px solid green;
        width: 90%;
        padding: 8px;
    }

    select {
        border: 2px solid green;
        width: 90%;
        padding: 8px;
    }

    button {
        background-color: blue;
        width: 90%;
        padding: 10px 20px;
        color: white;
        font-size: 1.2rem;
    }

    h2 {
        background-color: blue;
        padding: 10px;
        color: white;
        text-align: center;
    }

    table,
    th,
    td {
        border: 1px solid green;
        border-collapse: collapse;
    }
    </style>
</head>

<body>
    <h2>Edit Data</h2>
    <div class="container">
        <form method="POST">
            <input type="text" value="<?php echo $row['name']  ?>" name="name" placeholder="Name"><br><br>
            <input type="email" value="<?php echo $row['email']  ?>" name="email" placeholder="Email"><br><br>
            <input type="password" value="<?php echo $row['password']  ?>" name="password"
                placeholder="Password"><br><br>
            <input type="number" value="<?php echo $row['phone']  ?>" name="phone" placeholder="Phone"><br><br>
            <select name="dept">
                <option value="CSE">CSE</option>
                <option value="EEE">EEE</option>
                <option value="BBA">BBA</option>
            </select>
            <br><br>
            <button name="edit">Edit</button>
        </form>
        <br>
        <table>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Phone</th>
            <th>Dept</th>

            <?php
        $read = "SELECT * FROM insert_data";
        $query = mysqli_query($connect, $read);

        while($row = mysqli_fetch_array($query)){ ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["password"]; ?></td>
                <td><?php echo $row["phone"]; ?></td>
                <td><?php echo $row["dept"]; ?></td>
            </tr>
            <?php  }
       ?>
        </table>
        <br>

    </div>
</body>

</html>