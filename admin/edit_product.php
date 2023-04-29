<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <?php
                if(isset($_GET['id']))
                {
                    $id= $_GET['id'];
                    $product = getByID("products", $id);
    
                    if(mysqli_num_rows($product) > 0)
                    {
                        $data = mysqli_fetch_array($product);
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Product
                                    <a href="products.php" class="btn btn-primary float-end">Go Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="mb-0">Select Category</label>
                                            
                                                <select name="category_id" class="form-select mb-2" >
                                                    
                                                    <?php 
                                                        $categories = getALL("categories");
                                                        if (mysqli_num_rows($categories) > 0) {
                                                                ?>
                                                                    <option selected>Select Category</option>
                                                                <?php
                                                            foreach ($categories as $item) {
                                                                ?>
                                                                    <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id']?'selected':'' ?> ><?= $item['name']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        else {
                                                                ?>
                                                                    <option selected>No Category Available</option>
                                                                <?php
                                                        }
                                                    ?>  
                                            </select> 
                                        </div>
                                        <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                                        <div class="col-md-6">
                                            <label class="mb-0">Name</label>
                                            <input type="text" name ="name" value="<?= $data['name']; ?>" placeholder="Enter Product Name )" class="form-control mb-2 ">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-0">Slug</label>
                                            <input type="text" name="slug" value="<?= $data['slug']; ?>" placeholder="Enter Slug" class="form-control mb-2">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Small Description</label>
                                            <textarea rows="3" name="small_description" placeholder="Enter Small Description )" class="form-control mb-2"><?= $data['small_description']; ?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Description</label>
                                            <textarea rows="3" name="description" placeholder="Enter Description" class="form-control mb-2"><?= $data['description']; ?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-0">Original Price</label>
                                            <input type="text" name="original_price" value="<?= $data['original_price']; ?>" placeholder="Enter Original Price" class="form-control mb-2">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-0">Selling Price</label>
                                            <input type="text" name="selling_price" value="<?= $data['selling_price']; ?>" placeholder="Enter Selling Price )" class="form-control mb-2">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Upload Image</label>
                                            <input type="file" name="image" class="form-control mb-2">
                                            <label class="mb-0">Current Image</label>
                                            <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                            <img src="../uploads/<?= $data['image'] ?>" width ="100px" height="100px">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="mb-0">Quantity</label>
                                                <input type="number" name="qty" value="<?= $data['qty']; ?>" placeholder="Enter Quantity )" class="form-control mb=2">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="mb-0">Status</label><br>
                                                <input type="checkbox" <?= $data['status'] ? "checked":"" ?> name="status" >
                                            </div>
                                            <div class="col-md-3">
                                                <label class="mb-0">Trending</label><br>
                                                <input type="checkbox" <?= $data['trending'] ? "checked":"" ?> name="trending" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Meta Title</label>
                                            <input type="text" name="meta_title" value="<?= $data['meta_title']; ?>" placeholder="Enter Meta Title" class="form-control mb-2">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Meta Description</label>
                                            <textarea rows="3" name="meta_description" placeholder="Enter Meta Description" class="form-control mb-2"><?= $data['meta_description']; ?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Meta Keywords</label>
                                            <textarea rows="3" name="meta_keywords" placeholder="Enter Meta Keywords" class="form-control mb-2"><?= $data['meta_keywords']; ?></textarea>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mb-3" name="update_product_btn">Update</button>
                                        </div>
                                    </div>  
                                </form>  
                            </div>
                        <?php 
                    }
                    else
                    {
                        echo "Product Not Found" ;
                    }
                }
                else
                {
                    echo "ID Missing From URL";
                }
            ?>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>