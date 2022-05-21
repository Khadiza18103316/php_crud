<?php

$connect = mysqli_connect("localhost", "root", "", "php_crud");
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $image = $_FILES['image'] ['name'];
    $tmp_name = $_FILES['image'] ['tmp_name'];
    $upload = move_uploaded_file($tmp_name, "img_folder/" .$image);
    if($upload){
        $insert = "INSERT INTO img_upload(name, phone, image) VALUES('$name',' $phone', '$image' )";
        $query= mysqli_query($connect, $insert);
        if($query){
            echo "Image Uploaded Successfully!";
        }else{
            echo "Image Uploaded Failed!";
        }

    }else{
        echo "Image Upload Failed";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>image upload</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name"><br><br>
        <input type="number" name="phone" placeholder="Phone"><br><br>
        <input type="file" name="image">
        <button name="submit">Submit</button>
    </form>

</body>

</html>