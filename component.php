<?php

function component($productname, $productprice, $productimg, $productid, $rating = 4)
{
    $displaystars = displayStars($rating);
    $element = "
    <div class=\"col-md-3 col-sm-3 my-2 my-md-0\" style=\"color:#4e5d78; align-self:center; padding:20px; width:500px; height:500px;\">
                <form method=\"post\">
                    <div class=\"card shadow\" style=\"width:250px; height:450px; box-shadow: 0 0 15px 4 #ffffff;\">
                        <div>
                            <img src=\"$productimg\" alt=\"Image1\" style=\"height:220px;\" class=\"img-fluid card-img-top\">
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

function displayStars($num)
{
    $stars = "";
    for ($i = 0; $i < $num; $i++) {
        $stars = $stars . "<img style=\"width:30px\" src=\"starfilled.png\"></i>";
    }
    for ($j = 0; $j < 5 - $num; $j++) {
        $stars = $stars . "<img style=\"width:30px\" src=\"staroutlined.png\"></i>";
    }
    return $stars;
}