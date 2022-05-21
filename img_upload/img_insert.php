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
    <style>
    .container {
        width: 500px;
        height: auto;
        margin: 0 auto;
        text-align: center;
        box-shadow: 4px 5px 10px black;
        padding: 20px;
    }

    input {
        width: 90%;
        padding: 10px;
        margin: 10px;
    }

    button {
        width: 90%;
        padding: 10px;
        background: red;
        font-size: 1.4rem;
        color: white;
    }

    table {
        width: 100%;
    }

    table,
    th,
    td {
        padding: 10px;
        border: 1px solid green;
        border-collapse: collapse;
    }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Name"><br><br>
            <input type="number" name="phone" placeholder="Phone"><br><br>
            <input type="file" name="image">
            <button name="submit">Submit</button>
        </form>
        <hr>
        <h3>
            Fetch Data / Read Data
        </h3>

        <table>
            <th>Id</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Image</th>

            <tbody>
                <?php
                $select = "SELECT * FROM img_upload";
                $query= mysqli_query($connect, $select);
                while($row= mysqli_fetch_array($query)){ ?>

                <tr>
                    <td><?php echo $row["id"]?></td>
                    <td><?php echo $row["name"]?></td>
                    <td><?php echo $row["phone"]?></td>
                    <td><img src="img_folder/<?php echo $row["image"];?>" width="80" alt=""></td>
                </tr>



                <?php }


                ?>
            </tbody>
        </table>
    </div>
</body>

</html>