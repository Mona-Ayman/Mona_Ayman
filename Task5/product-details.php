<?php

use APP\DB\Models\Brand;
use APP\DB\Models\Review;
use APP\DB\Models\Product;
use APP\DB\Models\Category;
use APP\DB\Models\Subcategory;

$title = "Shop";
include "layouts/header.php";
include "layouts/navbar.php";
include "layouts/breadcrumb.php";
$reviewModel = new Review;
$productModel = new Product;
$productModel->setId($_GET['id']);
if($productModel->getProductDetails()->num_rows == 1){
   $product = $productModel->getProductDetails()->fetch_object();
}else{
    header('location:errors/404.php');die;
}
if($_POST){
    // print_R($_POST);
    // echo $_POST['comment'];
    // echo $_POST['star'];
    $reviewModel->setProduct_id($_GET['id'])->setUser_id($_SESSION['user']->id)->setComment($_POST['comment'])->setRate($_POST['star']);
    if($reviewModel->createReview()){
       $successMessage =   "<div class='alert alert-success text-center'>Rated Successfully</div>";
    }else{
       $errorMessage =  "<div class='alert alert-danger text-center'>Something Went Wrong</div>"; 

    }
}
?>
      
       
		<!-- Product Deatils Area Start -->
        <div class="product-details pt-100 pb-95">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="product-details-img">
                            <img class="zoompro" src="assets/img/product/<?=  $product->image ?>" data-zoom-image="assets/img/product/<?=  $product->image ?>" alt="zoom"/>
                          
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="product-details-content">
                            <h4><?=  $product->name_en ?></h4>
                            <div class="rating-review">
                                <div class="pro-dec-rating">
                                    <i class="ion-android-star-outline theme-star"></i>
                                    <i class="ion-android-star-outline theme-star"></i>
                                    <i class="ion-android-star-outline theme-star"></i>
                                    <i class="ion-android-star-outline theme-star"></i>
                                    <i class="ion-android-star-outline"></i>
                                </div>
                                <div class="pro-dec-review">
                                    <ul>
                                        <li>32 Reviews </li>
                                        <li> Add Your Reviews</li>
                                    </ul>
                                </div>
                            </div>
                            <span><?=  $product->price ?> EGP</span>
                            <div class="in-stock">
                                <?php if($product->quantity == 0 ){
                                    $message = 'Out Of Stock';
                                    $color = 'danger';
                                }elseif($product->quantity >=1 && $product->quantity <= 5){
                                    $message = 'In Stock ' . $product->quantity . ' Item Left';
                                    $color = 'warning';
                                }else{
                                    $message = 'In Stock';
                                    $color = 'success';
                                }
                                 ?>
                                <p>Available: <span class="text-<?= $color ?>"><?= $message ?></span></p>
                            </div>
                            <p> <?=  $product->details_en ?></p>
                            <div class="pro-dec-feature">
                                <ul>
                                    <li><input type="checkbox"> Protection Plan: <span> 2 year  $4.99</span></li>
                                    <li><input type="checkbox"> Remote Holder: <span> $9.99</span></li>
                                    <li><input type="checkbox"> Koral Alexa Voice Remote Case: <span> Red  $16.99</span></li>
                                    <li><input type="checkbox"> Amazon Basics HD Antenna: <span>25 Mile  $14.99</span></li>
                                </ul>
                            </div>
                            <div class="quality-add-to-cart">
                                <?php if($product->quantity != 0){ ?>
                                <div class="quality">
                                    <label>Qty:</label>
                                    <select class="form-control">
                                    <?php for($x = 1 ; $x <= $product->quantity ; $x++){ ?>
                                        <option value="{$x}"><?= $x ?></option>
                                    <?php }?>
                                    </select>
                                </div>
                                <?php }?>
                                <div class="shop-list-cart-wishlist">
                                <?php if($product->quantity != 0){ ?>
                                    <a title="Add To Cart" href="#">
                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                    </a>
                                    <?php }?>
                                    <a title="Wishlist" href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="pro-dec-categories">
                                <ul>
                                    <li class="categories-title">Categories:</li>
                                    <li><a href="shop.php?category=<?= $product->category_id ?>"> <?= $product->category_name_en ?></a></li>
                                    <li><a href="shop.php?subcategory=<?= $product->subcategory_id ?>"> <?= $product->subcategory_name_en ?></a></li>
                                    <li><a href="shop.php?category=<?= $product->brand_id ?>"> <?= $product->brand_name_en ?></a></li>
                                   
                                </ul>
                            </div>
                           
                            <div class="pro-dec-social">
                                <ul>
                                    <li><a class="tweet" href="#"><i class="ion-social-twitter"></i> Tweet</a></li>
                                    <li><a class="share" href="#"><i class="ion-social-facebook"></i> Share</a></li>
                                    <li><a class="google" href="#"><i class="ion-social-googleplus-outline"></i> Google+</a></li>
                                    <li><a class="pinterest" href="#"><i class="ion-social-pinterest"></i> Pinterest</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- Product Deatils Area End -->
        <div class="description-review-area pb-70">
            <div class="container">
                <div class="description-review-wrapper">
                    <div class="description-review-topbar nav text-center">
                        <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                        <a data-toggle="tab" href="#des-details3">Review</a>
                    </div>
                    <div class="tab-content description-review-bottom">
                        <div id="des-details1" class="tab-pane active">
                            <div class="product-description-wrapper">
                                <p><?= $product->details_en ?></p>
                            </div>
                        </div>
                     
                        <div id="des-details3" class="tab-pane">
                            <div class="rattings-wrapper">


                                <?php 
                       $reviewsResult =  $productModel->getReviews();
                       if($reviewsResult->num_rows >= 1){ 
                            foreach($reviewsResult->fetch_all(MYSQLI_ASSOC) AS $review) {
                            ?>
                        <div class="sin-rattings">
                            <div class="star-author-all">
                                <div class="ratting-star f-left">
                                    <?php for($counter = 1 ; $counter <= $review['rate'] ; $counter++){ ?>
                                    <i class="ion-star theme-color"></i>
                                    <?php } ?>
                                    <?php for($counter = 1 ; $counter <= 5 - $review['rate'] ; $counter++){ ?>
                                    <i class="ion-android-star-outline"></i>
                                    <?php } ?>
                                    <span>(<?=  $review['rate'] ?>)</span>
                                </div>
                                <div class="ratting-author f-right">
                                    <h3><?= $review['full_name'] ?></h3>
                                    <span><?= $review['created_at'] ?></span>
                                </div>
                            </div>
                            <p> <?= $review['comment'] ?> </p>
                            <?= $successMessage ?? "" ?>
                            <?= $errorMessage ?? "" ?>
                        </div>
                        <?php 
                            } 
                        }else{
                            echo "<div class='alert alert-warning text-center'> No reviews yet </div>";
                        }
                       ?>
                             </div>
                    <style>
                        * {
                            box-sizing: border-box;
                        }

                        

                        label {
                            cursor: pointer;
                        }

                        svg {
                            width: 3rem;
                            height: 3rem;
                            padding: 0.15rem;
                        }


                        /* hide radio buttons */

                        input[name="star"] {
                            display: inline-block;
                            width: 0;
                            opacity: 0;
                            margin-left: -2px;
                        }

                        /* hide source svg */

                        .star-source {
                            width: 0;
                            height: 0;
                            visibility: hidden;
                        }


                        /* set initial color to transparent so fill is empty*/

                        .star {
                            color: transparent;
                            transition: color 0.2s ease-in-out;
                        }


                        /* set direction to row-reverse so 5th star is at the end and ~ can be used to fill all sibling stars that precede last starred element*/

                        .star-container {
                            display: flex;
                            flex-direction: row-reverse;
                            justify-content: center;
                        }

                        label:hover~label .star,
                        svg.star:hover,
                        input[name="star"]:focus~label .star,
                        input[name="star"]:checked~label .star {
                            color: #d62a9d;
                        }

                        input[name="star"]:checked+label .star {
                            animation: starred 0.5s;
                        }

                        input[name="star"]:checked+label {
                            animation: scaleup 1s;
                        }
                        
                    </style>
                    <?php if(isset($_SESSION['user'])){ ?>
                    <div class="ratting-form-wrapper">
                        <h3>Add your Comments :</h3>
                        <div class="ratting-form">
                            <form method="POST">
                                <div class="star-box">
                                    <div class="ratting-star">
                                        <div class="star-source">
                                            <svg>
                                                <linearGradient x1="50%" y1="5.41294643%" x2="87.5527344%"
                                                    y2="65.4921875%" id="grad">
                                                    <stop stop-color="#bf209f" offset="0%"></stop>
                                                    <stop stop-color="#d62a9d" offset="60%"></stop>
                                                    <stop stop-color="#ED009E" offset="100%"></stop>
                                                </linearGradient>
                                                <symbol id="star" viewBox="153 89 106 108">
                                                    <polygon id="star-shape" stroke="url(#grad)" stroke-width="5"
                                                        fill="currentColor"
                                                        points="206 162.5 176.610737 185.45085 189.356511 150.407797 158.447174 129.54915 195.713758 130.842203 206 95 216.286242 130.842203 253.552826 129.54915 222.643489 150.407797 235.389263 185.45085">
                                                    </polygon>
                                                </symbol>
                                            </svg>

                                        </div>
                                        <div class="star-container">
                                            <input type="radio" name="star" value="5" id="five">
                                            <label for="five">
                                                <svg class="star">
                                                    <use xlink:href="#star" />
                                                </svg>
                                            </label>
                                            <input type="radio" name="star" value="4" id="four">
                                            <label for="four">
                                                <svg class="star">
                                                    <use xlink:href="#star" />
                                                </svg>
                                            </label>
                                            <input type="radio" name="star" value="3" id="three">
                                            <label for="three">
                                                <svg class="star">
                                                    <use xlink:href="#star" />
                                                </svg>
                                            </label>
                                            <input type="radio" name="star" value="2" id="two">
                                            <label for="two">
                                                <svg class="star">
                                                    <use xlink:href="#star" />
                                                </svg>
                                            </label>
                                            <input type="radio" name="star" value="1" id="one">
                                            <label for="one">
                                                <svg class="star">
                                                    <use xlink:href="#star" />
                                                </svg>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="rating-form-style form-submit">
                                            <textarea name="comment" placeholder="Comment"></textarea>
                                            <input type="submit" value="add review">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="product-area pb-100">
            <div class="container">
                <div class="product-top-bar section-border mb-35">
                    <div class="section-title-wrap">
                        <h3 class="section-title section-bg-white">Related Products</h3>
                    </div>
                </div>
                <div class="featured-product-active hot-flower owl-carousel product-nav">
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img alt="" src="assets/img/product/product-1.jpg">
                            </a>
                            <span>-30%</span>
                            <div class="product-action">
                                <a class="action-wishlist" href="#" title="Wishlist">
									<i class="ion-android-favorite-outline"></i>
								</a>
								<a class="action-cart" href="#" title="Add To Cart">
									<i class="ion-ios-shuffle-strong"></i>
								</a>
								<a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
									<i class="ion-ios-search-strong"></i>
								</a>
                            </div>
                        </div>
                        <div class="product-content text-left">
							<div class="product-hover-style">
								<div class="product-title">
									<h4>
										<a href="product-details.html">Le Bongai Tea</a>
									</h4>
								</div>
								<div class="cart-hover">
									<h4><a href="product-details.html">+ Add to cart</a></h4>
								</div>
							</div>
							<div class="product-price-wrapper">
								<span>$100.00 -</span>
								<span class="product-price-old">$120.00 </span>
							</div>
						</div>
                    </div>
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img alt="" src="assets/img/product/product-2.jpg">
                            </a>
                            <div class="product-action">
                                <a class="action-wishlist" href="#" title="Wishlist">
									<i class="ion-android-favorite-outline"></i>
								</a>
								<a class="action-cart" href="#" title="Add To Cart">
									<i class="ion-ios-shuffle-strong"></i>
								</a>
								<a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
									<i class="ion-ios-search-strong"></i>
								</a>
                            </div>
                        </div>
                        <div class="product-content text-left">
							<div class="product-hover-style">
								<div class="product-title">
									<h4>
										<a href="product-details.html">Society Ice Tea</a>
									</h4>
								</div>
								<div class="cart-hover">
									<h4><a href="product-details.html">+ Add to cart</a></h4>
								</div>
							</div>
							<div class="product-price-wrapper">
								<span>$100.00 -</span>
								<span class="product-price-old">$120.00 </span>
							</div>
						</div>
                    </div>
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img alt="" src="assets/img/product/product-3.jpg">
                            </a>
                            <span>-30%</span>
                            <div class="product-action">
                                <a class="action-wishlist" href="#" title="Wishlist">
									<i class="ion-android-favorite-outline"></i>
								</a>
								<a class="action-cart" href="#" title="Add To Cart">
									<i class="ion-ios-shuffle-strong"></i>
								</a>
								<a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
									<i class="ion-ios-search-strong"></i>
								</a>
                            </div>
                        </div>
                        <div class="product-content text-left">
							<div class="product-hover-style">
								<div class="product-title">
									<h4>
										<a href="product-details.html">Green Tea Tulsi</a>
									</h4>
								</div>
								<div class="cart-hover">
									<h4><a href="product-details.html">+ Add to cart</a></h4>
								</div>
							</div>
							<div class="product-price-wrapper">
								<span>$100.00 -</span>
								<span class="product-price-old">$120.00 </span>
							</div>
						</div>
                    </div>
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img alt="" src="assets/img/product/product-4.jpg">
                            </a>
                            <div class="product-action">
                                <a class="action-wishlist" href="#" title="Wishlist">
									<i class="ion-android-favorite-outline"></i>
								</a>
								<a class="action-cart" href="#" title="Add To Cart">
									<i class="ion-ios-shuffle-strong"></i>
								</a>
								<a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
									<i class="ion-ios-search-strong"></i>
								</a>
                            </div>
                        </div>
                        <div class="product-content text-left">
							<div class="product-hover-style">
								<div class="product-title">
									<h4>
										<a href="product-details.html">Best Friends Tea</a>
									</h4>
								</div>
								<div class="cart-hover">
									<h4><a href="product-details.html">+ Add to cart</a></h4>
								</div>
							</div>
							<div class="product-price-wrapper">
								<span>$100.00 -</span>
								<span class="product-price-old">$120.00 </span>
							</div>
						</div>
                    </div>
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img alt="" src="assets/img/product/product-5.jpg">
                            </a>
                            <span>-30%</span>
                            <div class="product-action">
                                <a class="action-wishlist" href="#" title="Wishlist">
									<i class="ion-android-favorite-outline"></i>
								</a>
								<a class="action-cart" href="#" title="Add To Cart">
									<i class="ion-ios-shuffle-strong"></i>
								</a>
								<a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
									<i class="ion-ios-search-strong"></i>
								</a>
                            </div>
                        </div>
                        <div class="product-content text-left">
							<div class="product-hover-style">
								<div class="product-title">
									<h4>
										<a href="product-details.html">Instant Tea Premix</a>
									</h4>
								</div>
								<div class="cart-hover">
									<h4><a href="product-details.html">+ Add to cart</a></h4>
								</div>
							</div>
							<div class="product-price-wrapper">
								<span>$100.00 -</span>
								<span class="product-price-old">$120.00 </span>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
include "layouts/footer.php";
include "layouts/scripts.php";
?>