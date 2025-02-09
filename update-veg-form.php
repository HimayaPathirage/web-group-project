<?php
    $id = $_GET['id'];

    $con = new mysqli('localhost','root','root','fresh_mart');
    $sql = "select * from vegetables where id=$id";
    $result = $con->query($sql);
    $veg_item = $result->fetch_Object();//get data of student

    if($veg_item==null)
    {   
        exit("Item not found.");
        
    }
?>
<html>
    <head>
        <title>Update Details of <?=$veg_item->name ?></title>
        <link rel="stylesheet" type="text/css" href="admin-form.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
            .add-btn button{
                display: inline-block;
                padding: 10px 20px;
                background-color: #1a6d10 ;
                color: #f1ecec;
                font-size: 13px;
                font-weight: 600;
                
                border: 2px solid transparent;
                border-bottom-left-radius:30px ; 
                border-top-right-radius: 30px;
                cursor: pointer;
                text-align: center;
            }
            .add-btn button:hover{
                box-shadow: 0 0 17px #000000;
                color: #f1ecec;
            }
        </style>
    </head>
    <body>
    <section class="add-item">
        <div class="container">
        <h1>Update Details of <?=$veg_item->name ?></h1>
        <form action="update-veg-item.php" method="post" id="form">
            <input type="hidden" name="id" value="<?=$veg_item->id?>">
            <table cellspacing="30">
                
                <tr valign="top">
                    <td> <label class="lbl-name">Item Name</label></td>
                    <td> 
                        <input value="<?=$veg_item->name ?>" type="text" name="name" class="txt"/>
                    </td>
                </tr>
                <tr valign="top">
                    <td> <label class="lbl-name">Unit Price</label></td>
                    <td> 
                        <input value="<?=$veg_item->price ?>" type="text" name="price" class="txt"/>
                    </td>
                </tr>
                <tr valign="top">
                    <td> <label class="lbl-name">Image url</label></td>
                    <td> 
                        <input value="<?=$veg_item->img_url ?>" type="text" name="imgUrl" class="txt"/>
                    </td>
                </tr>
                  
            </table>
            <div class="add-btn">
                <button  type="submit" name="submit">Save Changes</button>
            </div><br>
        </form><br>
        <div class="show-btn">
            <a  href="vegetable-table.php">Show All Vegetables</a><br>
            <a  href="admin-form.html">Add New</a>
        </div>
        </div>
        </section>
        <script src="update-veg-item.js"></script>
    </body>
</html