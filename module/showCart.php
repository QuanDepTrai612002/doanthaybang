    <?php

?>


<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Cart - <?php   if(isset($_SESSION['cart']) ) echo count($_SESSION['cart']) ?></h5>
                    </div>
                    <div class="card-body">
                        <!-- Single item -->


                        <?php
                        $total =0;
                        if(isset($_SESSION['cart']) )
                        {   

                            foreach ($_SESSION['cart'] as $r)
                            {
                                $total += $r['sl']*$r['data']['Price'];
                                ?>
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                            data-mdb-ripple-color="light">
                                            <img src="<?php
                                            //Lỗi 
                                            echo BASE_URL. 'image/uploads/' . $r['data']['Pro_Image'];
                                            ?>" class="w-100" alt="Blue Jeans Jacket" />
                                            <a href="#!">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                            </a>
                                        </div>
                                        <!-- Image -->
                                    </div>
    
                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <p><strong><?php echo $r['data']['Pro_Name']; ?></strong></p>
                                        <a class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                                            href="index.php?ac=removeItemCart&id<?php echo $r['data']['Pro_Id'] ?>" title="Remove item">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip"
                                            title="Move to the wish list">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                        <!-- Data -->
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                        <!-- Quantity -->
                                   
                                            <form action="index.php?ac=updateItemCart" class="d-flex mb-4" method="post">
                                                
                                                <input type="text" hidden value="<?php echo $r['data']['Pro_Id'] ?>" name="id"/>
                                                <button type="button" class="btn btn-primary px-3 me-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="bi bi-dash-circle"></i>
                                                </button>
    
                                                <div class="form-outline">
                                                    <input id="form1" min="0" name="quantity" value="<?php echo $r['sl'];?>"
                                                        type="number" class="form-control" />
                                                </div>
    
                                                <button type="button" class="btn btn-primary px-3 ms-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="bi bi-plus-circle"></i>
                                                </button>
    
                                                <input type="submit" value="Update" class="btn btn-outline-primary ms-2 px-3" />
                                            </form>
                                     
                                        <!-- Quantity -->
    
                                        <!-- Price -->
                                        <p class="text-start text-md-center">
                                            <strong><?php echo $r['data']['Price'] . 'đ'; ?></strong>
                                        </p>
                                        <!-- Price -->
                                    </div>
                                </div>
                                <!-- Single item -->
    
                                <hr class="my-4" />
                                           
                       



                            <?php
                                
                            }    
                        }

                        ?>


                        <!-- Single item -->

                        <!-- Single item -->
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <p><strong>Expected shipping delivery</strong></p>
                        <p class="mb-0">12.10.2020 - 14.10.2020</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Products
                                <span><?php echo $total?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span>Gratis</span>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total amount</strong>
                                    <strong>
                                        <p class="mb-0">(including VAT)</p>
                                    </strong>
                                </div>
                                <span><strong><?php echo $total?></strong></span>
                            </li>
                        </ul>

                        <a href="index.php?ac=checkout" class="btn btn-primary btn-lg btn-block">
                            Go to checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>