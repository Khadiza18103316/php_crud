<?php
$connect =mysqli_connect("localhost","root", "", "php_crud");

// Check connection
// if ($connect->connect_error) {
//     die("Connection failed: " . $connect->connect_error);
//   }
//   echo "Connected successfully";

  if(isset($_POST['send'])){
      $name=$_POST['name'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $phone=$_POST['phone'];
      $dept=$_POST['dept'];

      //Email Validation
      $email_select = "SELECT * FROM insert_data WHERE Email = '$email' ";
      $exc = mysqli_query($connect, $email_select);
      $count = mysqli_num_rows($exc);
      if($count>0){
        echo"<script>alert('Email already exist')</script>";
      }else{
        $query = "INSERT INTO insert_data(name,email,password,phone,dept) VALUES ('$name','$email','$password','$phone','$dept')";

        $insert = mysqli_query($connect,$query);
  
        if($insert){
            echo"<script>alert('Data send success')</script>";
        }
        else{
          echo"<script>alert('Data send failed')</script>";
      }

      }  
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>

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
    <h2>Insert Data</h2>
    <div class="container">
        <form method="POST">
            <input type="text" name="name" placeholder="Name"><br><br>
            <input type="email" name="email" placeholder="Email"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="number" name="phone" placeholder="Phone"><br><br>
            <select name="dept">
                <option value="CSE">CSE</option>
                <option value="EEE">EEE</option>
                <option value="BBA">BBA</option>
            </select>
            <br><br>
            <button name="send">Send</button>
        </form>
        <br>
        <h1>Read Data</h1>
        <table>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Phone</th>
            <th>Dept</th>
            <th>Edit</th>
            <th>Delete</th>
            <?php

        $read = "SELECT * FROM insert_data";

        $query = mysqli_query($connect, $read);

        $count = mysqli_num_rows($query);
        echo "<h3>total database row : </h3>" . $count;
        

        while($row = mysqli_fetch_array($query)){ ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["password"]; ?></td>
                <td><?php echo $row["phone"]; ?></td>
                <td><?php echo $row["dept"]; ?></td>
                <td><a href="edit.php?idNo=<?php echo $row['id'];?>">Edit</a></td>
                <td><a onclick="return confirm('Are You Sure?')"
                        href="delete.php?idNo=<?php echo $row['id'];?>">Delete</a></td>
            </tr>
            <?php  }
       ?>
        </table>
        <br>
    </div>
    <br>
</body>

</html>