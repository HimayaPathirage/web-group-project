<!DOCTYPE html>
<html>
    <head> 
        <title> All Fruits </title>
        <!--Bootstrap 5 CDN-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!--Font Awsome CDN-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
        <link rel="stylesheet" href="item-table.css"/> 
        
    </head>
    <body>
        <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#1a6d10; color:#fff;">
            All Fruits
        </nav>
        <div class="container">
            <a class="btn btn-dark mb-3" href="admin-form.html">Add New Item</a>
            <a class="btn btn-dark mb-3" href="fruits.php">View on page</a> 
        </div>
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Image</th>
                <th scope="col">Item Name</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $con = new mysqli('localhost','root','root','fresh_mart');
                    $sql = "select * from fruits";
                    $result = mysqli_query($con,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                        <td><?php echo $row['id']?></td>
                        <td><img class="table-img" src="<?php echo $row['img_url']?>"></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['price']?></td>
                        <td>
                            <a href="update-fruit-form.php?id=<?php echo $row['id']?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                            <a href="delete-fruit.php?id=<?php echo $row['id']?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                        </td>
                        </tr>
                    <?php
                    }
                    ?>
            </tbody>
        </table>
        
        <!--Bootstrap 5 CDN-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
