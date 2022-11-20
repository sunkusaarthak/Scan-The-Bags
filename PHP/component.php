<?php
    
function component($productname, $productprice, $productimg, $productid, $rating=4){
    $displaystars = displayStars($rating);
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\" style=\"padding:20px; width:100px; height:500px;background-color:#27262e;\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\" style=\"width:250px; height:450px;background-color:#27262e;\">
                        <div>
                            <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>
                            <h6>
                               
                            </h6>
                            <p class=\"card-text\">
                                 $displaystars
                            </p>
                            <h5>
                                <span class=\"price\">₹$productprice</span>
                            </h5>

                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">VISIT TO VIEW</button>
                             <input type='hidden' name='product_id' value='$productid'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">Seller: dailytuition</small>
                                <h5 class=\"pt-2\">$$productprice</h5>
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}

function displayStars($num){
    $stars = "";
    for($i=0;$i<$num;$i++){
        $stars = $stars."<i class=\"fas fa-star\"></i>";
    }
    for($j=0;$j<5-$num;$j++){
        $stars = $stars."<i class=\"far fa-star\"></i>";
    }
    return $stars;
}


 
















