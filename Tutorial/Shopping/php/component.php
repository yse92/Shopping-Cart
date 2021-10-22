<?php
function component($productname, $productprice, $productimg, $productid){
    $element="
        <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
            <form action=\"index.php\" method=\"post\">
                <div class=\"card shadow\">
                    <div>
                        <img src=\"$productimg\" alt=\"image1\" class=\"img-fluid card-img-top\">
                    </div>                                                
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">$productname</h5>
                        <h6>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"fas fa-star\"></i>
                        </h6>
                        <p class=\"card-text\">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                        <h5>
                            <small><s class=\"text-secondary\">$899</s></small>
                            <span class=\"price\"><b>$$productprice</b></span>                            
                        </h5>
                        <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                        <input type='hidden' name='product_id' value='$productid'>
                        </div>
                </div>
            </form>
        </div>
    ";
    echo $element;
}


function cartElement($productimg, $productname, $productprice){
    $element = "
    <form action=\"cart.php\" method='get' class=\"cart-items\">
                        <!-- <div class=\"border rounded\">
                            <div class=\"row bg-white\">
                                <div class=\"col-md-3\">
                                    <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                                </div>
                                <div class=\"col-md-6\">
                                    <h5 class=\"pt-2\">$productname</h5>
                                    <small class=\"text-secondary\">Seller: dailytuition</small>
                                    <h5 class=\"pt-2\">$productprice</h5>
                                    <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                    <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                                </div>
                                <div class=\"col-md-3\"></div>
                            </div>
                        </div> -->
                        <div class=\"card\" style=\"width: 18rem;\">
                            <img src=\"./upload/iphone.jpg\" class=\"card-img-top\" alt=\"...\">
                            <div class=\"card-body\">
                                <h5 class=\"card-title\">Card title</h5>
                                <p class=\"card-text\">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <ul class=\"list-group list-group-flush\">
                                <li class=\"list-group-item\"><h5>Product1</h5></li>
                                <li class=\"list-group-item\"><small class=\"text-secondary\">Seller: <a href=\"#\">rozetka.com.ua</a></small></li>
                                <li class=\"list-group-item\"><h5>$599</h5></li>
                            </ul>
                            <div class=\"card-body\" style=\"margin-left: auto; margin-right: auto;\">
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-5 px-12 center-block \" style=\"margin-left: auto; margin-right: auto;\">
                                <div style=\"display:flex\">
                                    <button class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <div><input type=\"text\" class=\"form-control w-100 text-center\" value=\"1\"></div>
                                    <button class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
    
    ";

    echo $element;
}

?>