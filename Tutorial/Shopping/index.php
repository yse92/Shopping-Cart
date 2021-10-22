<?php
session_start();
    require_once('php/CreateDb.php');
    require_once('./php/component.php');
    $database=new CreateDb("Productdb", "Producttb");
    if(isset($_POST['add']))
    {
        if(isset($_SESSION['cart']))
        {
            $item_array_id=array_column($_SESSION['cart'], "product_id");
            print_r($item_array_id);
            //print_r($_SESSION['cart']);
            if(in_array($_POST['product_id'],$item_array_id)){
                echo "<script>alert('Product is already added in the cart')</script>";
                echo "<script>window.location = 'index.php'</script>";
            }else{
                $count=count($_SESSION['cart']);
                $item_array = array('product_id'=>$_POST['product_id']);

                $_SESSION['cart'][$count]=$item_array;
                print_r($_SESSION['cart']);
            }
        }
        else
        {
            $item_array = array('product_id'=>$_POST['product_id']);

            //глобальная переменная
            $_SESSION['cart'][0]=$item_array;
            print_r($_SESSION['cart']);
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
<!--Font Awaysome-->
<script src="https://kit.fontawesome.com/608277ff6d.js" crossorigin="anonymous"></script>
<!--Bootstrap CDN-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once("php/header.php");
    ?>
    <div class="container">
        <div class="row text-center py-5">
            <?php
                // component("Product 1", 499, "./upload/iphone.jpg");
                // component("Product 2", 599, "./upload/samsung.png");
                // component("Product 3", 549, "./upload/pixel.jpg");
                // component("Product 4", 389, "./upload/samsung.png");

                    $result=$database->getData();
                    while($row = mysqli_fetch_assoc($result)){
                        component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);                    
                }
            ?>
            <!-- <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="post">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/iphone.jpg" alt="image1" class="img-fluid card-img-top">
                        </div>                                                
                        <div class="card-body">
                            <h5 class="card-title">Product1</h5>
                            <h6>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </h6>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </p>
                            <h5>
                                <small><s class="text-secondary">$519</s></small>
                                <span class="price"><b>$599</b></span>                            
                            </h5>
                            <button type="submit" class="btn btn-warning my-3" name="add">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                </form>
            </div> -->
        <h4 class="goodbye">See you soon!</h4>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>