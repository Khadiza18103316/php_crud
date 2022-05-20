<?php

$connect =mysqli_connect("localhost","root", "", "php_crud");

 $id = $_GET['idNo'];

 $delete = "DELETE FROM insert_data WHERE Id = $id";

 $query = mysqli_query($connect, $delete);

 if($query){
    echo"<script>alert('Data Delete success')</script>";
    header("location:insert.php");
  }
  else{
    echo"<script>alert('Data Delete failed')</script>";
}

?>