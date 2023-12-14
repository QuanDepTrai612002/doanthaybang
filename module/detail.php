<?php
$id = Utils::getIndex('id');
$data = $product->getDetail($id);
$dataRelated = $product->getRand(4);


?>


<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                    src="<?php
                    // loi BASE_URL . 
                    echo BASE_URL .'image/uploads/' . $data['Pro_Image'] ?>" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">SKU: BST-498</div>
                <h1 class="display-5 fw-bolder"><?php echo $data['Pro_Name'] ?></h1>
                <div class="fs-5 mb-5">
                    <span class=""><?php echo $data['Price'] ?></span>
                </div>
                <div class="fs-5 mb-5">
                    <Strong>Danh mục: </Strong> <span class=""><?php echo $data['Category_Name'] ?></span>
                </div>
                <div class="fs-5 mb-5">
                    <h2>Mô tả</h2>
                    <p class="lead"><?php echo $data['Pro_Description'] ?></p>
                </div>
                <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                        style="max-width: 3rem" />
                    <a href="index.php?ac=addCart" class="btn btn-outline-primary"><i class="bi-cart-fill me-1"></i> Add
                        to cart</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            foreach ($dataRelated as $r)
            {
                ?>


                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="<?php echo BASE_URL . 'image/uploads/' . $r['Pro_Image'] ?>"
                            alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo $r['Pro_Name'] ?></h5>
                                <!-- Product price-->
                                <?php echo $r['Price'] ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-outline-dark mt-auto" href="index.php?ac=addCart&id=<?php echo $r['Pro_Id']?>">Add to cart</a>
                                <a class="btn btn-outline-dark mt-auto"
                                    href="index.php?ac=detail&id=<?php echo $r['Pro_Id'] ?>">Chi tiết</a>
                            </div>

                        </div>
                    </div>
                </div>
                <?php
            }

            ?>


        </div>
    </div>
</section>