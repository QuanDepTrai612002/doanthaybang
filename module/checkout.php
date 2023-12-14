<?php
if (isset($_SESSION['data']))
{

    $r["Supplier_Id"] = $_SESSION['data']['id'];
    $r["Supplier_Name"] = $_SESSION['data']['name'];
    $r["Email"] = $_SESSION['data']['email'];
    $r["Phone"] = $_SESSION['data']['phone'];

    unset($_SESSION['data']);
}

var_dump($_SESSION['cart']);
?>

<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Cart - <?php if (isset($_SESSION['cart']))
                            echo count($_SESSION['cart']) ?>
                            </h5>
                        </div>
                        <div class="card-body">
                            <!-- Single item -->


                            <?php
                                $total = 0;
                        if (isset($_SESSION['cart']))
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
                                            echo BASE_URL . 'image/uploads/' . $r['data']['Pro_Image'];
                                            ?>" class="w-100" alt="Blue Jeans Jacket" />
                                            <a href="#!">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                            </a>
                                        </div>
                                        <!-- Image -->
                                    </div>
                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <div><p><strong>Tên sản phẩm</strong><?php echo $r['data']['Pro_Name']; ?></p></div>
                                        <div>
                                        <p><strong>Số lượng</strong><?php echo $r['sl']; ?></p>
                                        </div>
                                        <!-- Data -->
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                        
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

                        <div class="container mb-4">
                            <form action="index.php?ac=handleCheckout" method="post">
                                <div class="form-row row">
                                    <div class="form-group col-md-5 mb-3">
                                        <label for="inputName">Tên người nhận</label>
                                        <input type="text" name="name" class="form-control" id="inputMa" placeholder="Tên người nhận" value="">
                                       
                                    </div>
                                </div>


                                <div class="form-row row">
                                    <div class="form-group col-md-5 mb-3">
                                        <label for="inputPhone">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control" id="inputPhone" 
                                        placeholder="Số điện thoại" value="">
                                      
                                    </div>
                                </div>
                                <div class="form-group col-md-9 mb-3">
                                    <label for="inputMota">Địa chỉ</label>
                                    <textarea name="address" class="form-control" id="inputMota"
                                     placeholder="Địa chỉ"></textarea>
                                </div>
                                <div class="form-group row mt-2">
                                    <div class="col-sm-10">
                                        <input class="btn btn-secondary" type="Reset">
                                        <input class="btn btn-primary" type="submit" value="Thực Hiện">
                                    </div>
                                </div>
                            </form>
                        </div>
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
                                <span><?php echo $total;?> đ</span>
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
                                <span><strong><?php echo $total;?> đ</strong></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>