<?php
$page = Utils::getIndex("page", 1);
$category = Utils::getIndex('category','');
if($category=='')
{
    $data = $product->getAll($page);
    $page_count = $product->getPageCount();
    $value = $product->getDetail(1);

}else{
    $data = $product->getByCategory($category,$page);
    $page_count = $product->getPageCount();
    $value = $product->getDetail(1);
}


    include ROOT.'/include/header.php';
?>
    <?php include ROOT.'/include/message.php'?>
<section class="py-5">


    <div class="col py-3">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-4 justify-content-center">

                <?php
                foreach ($data as $r)
                {
                    ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?php  
                            // lỗi echo BASE_URL.
                            echo 'image/uploads/' . $r['Pro_Image'] ?>"
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
                                    <a class="btn btn-outline-dark mt-auto" href="index.php?ac=detail&id=<?php echo $r['Pro_Id']?>">Chi tiết</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                }


                ?>


            </div>
        </div>
    </div>
</section>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>

        <?php
        for ($i = 1; $i <= $page_count; $i++)
        {
            $c = " number ";
            if ($i == $page)
                $c .= " active "; ?>

            <li class="page-item <?php echo $c; ?>"> <a href="index.php?mod=product&group=pro&page=<?php echo $i; ?>"
                    class="page-link " title="<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
        }
        ?>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>

</nav>