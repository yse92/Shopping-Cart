<?php
session_start();
//Стартует новую сессию, либо возобновляет существующую
require_once("php/CreateDb.php");
require_once("php/component.php");
$db = new CreateDb("Productdb", "Producttb");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!--Font Awarsome-->
    <script src="https://kit.fontawesome.com/608277ff6d.js" crossorigin="anonymous"></script>
    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<?php
    require_once('php/header.php');


?>
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-5">
        <h3>My Cart</h3>
            <div class="col-md-7">
                <div class="shopping-cart col-md-6" style="display:flex;">
                    
                    <hr>
                    <?php
                    $total =0;
                        if(isset($_SESSION['cart'])){
                            $product_id = array_column($_SESSION['cart'], 'product_id');
                            $result = $db->getData();
                            while($row=mysqli_fetch_assoc($result)){
                                foreach($product_id as $id){
                                    if($row['id']==$id){
                                        cartElement($row['product_image'], $row['product_name'], $row['product_price']);
                                        $total =$total +(int)$row['product_price'];
                                    }
                                }
                            }
                        }
                        else{
                            echo "<h4>Cart is empty</h4>";
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-5 offset-md-1 border rounded mt-5 h-25">
                <div class="pt-4">
                    <h5>PRICE DETAILS</h5>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                            
                                if(isset($_SESSION['cart'])){
                                    $count =count($_SESSION['cart']);
                                    echo "<h6>Price($count items)</h6>";
                                }else{
                                    echo "<h6>Price (0 items)</h6>";
                                }

                            ?>
                            <h6>Delievery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>
                                <?php
                                    echo $total;
                                ?>
                            </h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$
                                <?php
                                    echo $total;
                                ?>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>