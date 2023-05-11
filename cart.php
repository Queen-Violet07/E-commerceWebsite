<?php 

include('functions/userfunctions.php');
include('includes/header.php'); 
include('authenticate.php'); 
?>
   

<div class="py-2 bg-teal">
    <div class="container">
        <h6 class="text-white">
            <a href="index.php" class="text-white" >
                Home /
            </a> 
            <a href="cart.php" class="text-white">
                Cart 
            </a>  
        </h6>
    </div>
</div>

    <div class="py-5">
        <div class="container">
                <div class="">
                    <div class="row"> 
                        <div class="col-md-12">
                            <div id="mycart">
                                <?php
                                    $items = getCartItems();

                                    if(mysqli_num_rows($items) > 0){
                                        ?>
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <h6>Product Image</h6>
                                            </div>
                                            <div class="col-md-3">
                                                <h6>Product Name</h6>
                                            </div>
                                            <div class="col-md-3">
                                                <h6>Price</h6>
                                            </div>
                                            <div class="col-md-2">
                                                <h6>Quantity</h6>
                                            </div>
                                            <div class="col-md-2">
                                                <h6>Remove</h6>
                                            </div>
                                        </div>
                                        <div id="">
                                            <?php 
                                            
                                                foreach ($items as $citem) {

                                                    ?>
                                                        <div class="card product_data shadow-sm mb-2">
                                                            <div class="row align-items-center">
                                                                    <div class="col-md-2">
                                                                        <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="100px">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <h6><b><?= $citem['name'] ?></b></h6>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <h6><b>Tk <?= $citem['selling_price'] ?></b></h6>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                                                        <div class="input-group mb-3" style="width:150px">
                                                                            <button class="input-group-text increment-btn updateQty"><b>+</b></button>
                                                                            <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citem['prod_qty'] ?>" disabled >
                                                                            <button class="input-group-text decrement-btn updateQty"><b>-</b></button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <button class="btn btn-sm btn-danger deleteItem" value="<?= $citem['cid'] ?>">
                                                                        <i class="fa fa-trash me-2"></i>Remove</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        
                                                    <?php 
                                                }
                                            ?>
                                        </div>
                                        <div class="float-end">
                                            <a href="checkout.php" class="btn btn-outline-primary">Proceed To Checkout</a>
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                            <div class="card card-body shadow text-center">
                                                <h4 class="py-3">Your cart is empty. <br>
                                                            Go visit our collections and start browsing!
                                               </h4>
                                            </div>
                                        <?php
                                    }
                                        ?>
                                </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
    
<?php include('includes/footer.php'); ?>   