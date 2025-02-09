<?php
    $id = $_GET['id'];

    $con = new mysqli('localhost','root','root','fresh_mart');
    $sql = "select * from user where id=$id";
    $result = $con->query($sql);

    if ($result === false) {
        die("Query failed: " . $con->error);
    }
    $user = $result->fetch_Object();//get data of User

    if($user==null)
    {   
        exit("User not found.");
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <!--Bootstrap 5 CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--Font Awsome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!--boxicons link-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="admin-profile.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .logout{
            text-decoration: none;
            background-color: rgb(207, 42, 36);
        } 
        .logout:hover{
            box-shadow: 0 0 17px #000000;
            color: #f1ecec;
        }
        .profile-table {
        border-spacing: 10px; /* Space between cells */
        border-collapse: separate; /* Ensure the spacing is applied */
    }

    
    .profile-table td {
        padding: 10px; /* Padding inside the cells */
    }
    
    
    

    </style>
</head>
<body>
    <section class="admin-profile">
        <div class="container">
            <div class="container1" style="height:550px;border-top-right-radius:75px ;">
                <div>
                    <img>
                </div>
                
                <h2 style="margin-top: 1%;">Welcome !</h2>
                <h3>This is an Customer Account</h3>
                
                <form action="update-profile.php" method="post" id="form">
                    <input type="hidden" name="id" value="<?=$user->id?>">
                    <table class="profile-table">
                        <tr valign="top">
                            <td> <label class="lbl-name">First Name</label></td>
                            <td> 
                                <input type="text" class="txt" name="fname" value="<?=$user->fname?>"/>
                            </td>
                        </tr>
                        
                        <tr valign="top">
                            <td> <label class="lbl-name">Last Name</label></td>
                            <td> 
                                <input type="text" class="txt" name="lname" value="<?=$user->lname?>"/>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td> <label class="lbl-name">Email</label></td>
                            <td> 
                                <input type="text" class="txt" name="email" value="<?=$user->email?>"/>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td> <label class="lbl-name">Password</label></td>
                            <td> 
                                <input type="text" class="txt" name="password" value="<?=$user->password?>"/>
                            </td>
                        </tr>
                    </table><br>
                    <div class="btn-container">
                        <button type="submit" name="submit" class="">Update Profile</button>
                        <a   style="background-color:rgb(207, 85, 36)" href="home.html"> Shop Now </a>
                    </div><br>
                    <a class="logout" href="login.html">Log Out</a>
                </form>
            </div>
            
        </div>
    </section>
    <script src="customer-profile.js"></script>
</body>
</html>