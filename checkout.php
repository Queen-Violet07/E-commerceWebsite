<?php 

include('functions/userfunctions.php');
include('includes/header.php'); 
include('authenticate.php'); 
?>
   

<div class="py-2 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a href="index.php" class="text-white" >
                Home /
            </a> 
            <a href="checkout.php" class="text-white">
                Checkout 
            </a>  
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions\placeorder.php" method="POST">
                    <div class="row"> 
                        <div class="col-md-7">
                            <h5>Basic Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Name</label>
                                    <input type="text" name="name" required placeholder="Enter Your Full Name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Email</label>
                                    <input type="email" name="email" required placeholder="Enter Your Email" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Phone</label>
                                    <input type="text" name="phone" required placeholder="Enter Your Phone Number" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Pincode</label>
                                    <input type="text" name="pincode" required placeholder="Enter Your Pin code" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Addres</label>
                                    <textarea name="address" required placeholder="Enter Your Address" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Order Details</h5>
                            <hr>
                                <?php 
                                    $items = getCartItems();
                                    $totalPrice = 0;

                                    foreach ($items as $citem) {

                                        ?>
                                            <div class="mb-1 border">
                                                <div class="row align-items-center">
                                                        <div class="col-md-2">
                                                            <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="60px">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label><?= $citem['name'] ?></label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Tk <?= $citem['selling_price'] ?></label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>x<?= $citem['prod_qty'] ?></label>
                                                        </div>
                                                </div>
                                            </div>
                                            
                                        <?php 
                                        $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                                    }
                                ?>
                                <hr>
                                <h5>Total Price : <span class="float-end fw-bold">Tk <?= $totalPrice ?></span></h5>
                                <br>
                    
                                <div class="mt-3">
                                    <input type="hidden" name="payment_mode" value="COD">
                                    <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Confirm and Place Order |COD</button>
                                </div>
                                <div class="mb-2">
                                    <input type="hidden" name="payment_id" value="NULL">
                                </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
<?php include('includes/footer.php'); ?>   