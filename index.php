<?php 

include('functions/userfunctions.php');
include('includes/header.php'); 
include('includes/slider.php'); 

?>
   
<div class="py-5">
    <div class="container">
        <div class="row"> 
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <div class="underline mb-2"></div>
                <hr>
                    <div class="owl-carousel">
                        <?php
                            $trendingProducts = getAllTrending();
                            if(mysqli_num_rows($trendingProducts) > 0)
                            {
                                foreach ($trendingProducts as $item) {
                                    ?>
                                    <div class="item">
                                        <a href="product_view.php?product=<?=$item['slug']; ?>">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="uploads/<?=$item['image']; ?>" alt="Product Image" class="w-100 mb-2">
                                                    <h6 class="text-center "><?=$item['name']; ?></h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                                }
                            }
                        ?>
                    </div>
            </div>
        </div>
        </div>
</div>
   
<div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>About Us</h4>
                <div class="underline mb-2"></div>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                <br>
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-white">PlantZone</h4>
                <div class="underline mb-2"></div>
                <a href="index.php" class="text-white"><i class="fa fa-angle-right"></i>Home</a><br>
                <a href="#" class="text-white"><i class="fa fa-angle-right"></i>About Us</a><br>
                <a href="cart.php" class="text-white"><i class="fa fa-angle-right"></i>My Cart</a><br>
                <a href="categories.php" class="text-white"><i class="fa fa-angle-right"></i>Our Collections</a> 
            </div>
            <div class="col-md-3">
                <h4 class="text-white">Address</h4>
                <p class="text-white">
                    #24, Ground Floor,
                    22nd Baker Street, xyz layout,
                    Dhaka, Bangladesh.
                </p>
                <a href="tel:+01678901093" class="text-white"><i class="fa fa-phone">+01678901093</i></a><br>
                <a href="mailto:plantzone@gmail.com" class="text-white"><i class="fa fa-envelop">plantzone@gmail.com</i></a>
            </div>
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14610.251127693413!2d90.42099615000001!3d23.72730255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b85eff2a80b3%3A0xc3e4c1c63ff6150c!2sPaltan%20China%20Town!5e0!3m2!1sen!2sbd!4v1682732679488!5m2!1sen!2sbd" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

<div class="py-2 bg-teal">
    <div class="text-center">
        <p class="mb-0 text-white">All Rights Reserved. Copyright @ PlantZone - <?= date('Y') ?></p>
    </div>
</div>

<?php include('includes/footer.php'); ?> 
<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
        }
});
    });
</script>  