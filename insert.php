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

      $query = "INSERT INTO insert_data(name,email,password,phone,dept) VALUES ('$name','$email','$password','      $phone','$dept')";

      $insert = mysqli_query($connect,$query);

      if($insert){
          echo"<script>alert('Data send success')</script>";
      }
      else{
        echo"<script>alert('Data send failed')</script>";
    }

  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert</title>
</head>

<body>
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

</body>

</html>