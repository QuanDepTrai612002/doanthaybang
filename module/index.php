<?php
$ac = Utils::getIndex('ac', 'home');
$product = new Product();
$order = new Order();
$detail = new DetailOrder();
$category = new Category();
if ($ac == 'home')
{
    include ROOT . '/module/showProduct.php';
}
if ($ac == 'detail')
{
    include ROOT.'/module/detail.php';
}
if ($ac == 'addCart')
{
    //Kiểm tra session user login
    if (!isset($_SESSION["user_login"]) || !$_SESSION["user_login"])
    {
        // điều hướng
        header("Location: index.php?ac=login");
        exit;

    }
    $id = Utils::getIndex('id');
    $quantity = Utils::getIndex('quantity', 1);

    $pro = new Product();
    $data = $pro->getDetail($id);
    if (isset($_SESSION['cart'][$id]))
        $_SESSION['cart'][$id]['sl'] = $quantity + 1;
    else
        $_SESSION['cart'][$id] = ['data' => $data, 'sl' => $quantity];

    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
    exit;
}

if ($ac == 'updateItemCart')
{
    $i = Utils::postIndex('id');
    $quantity = Utils::postIndex('quantity');
    if ($quantity < 1)
    {

        header("Location: index.php?ac=showCart");
        exit;
    }

    if (isset($_SESSION['cart'][$i]))
    {

        $cart = $_SESSION['cart'];
        $cart[$i]['sl'] = $quantity;
        $_SESSION['cart'] = $cart;
    }
    header("Location: index.php?ac=showCart");
    exit;
}
if ($ac == 'removeItemCart')
{
    $id = Utils::getIndex('id');
    $cart = $_SESSION['cart'];
    foreach ($cart as $key => $item)
    {
        if ($item['id'] == $id)
        {
            unset($cart[$key]);
            break;
        }
    }
    $_SESSION['cart'] = $cart;
    header("Location: index.php?ac=showCart");
    exit;
}
if ($ac == 'checkout')
{
    include ROOT . '/module/checkout.php';
}
if ($ac == 'handleCheckout')
{
    $name = Utils::postIndex('name');
    $phone = Utils::postIndex('phone');
    $address = Utils::postIndex('address');
    $price = 0;
    foreach ($_SESSION['cart'] as $v)
    {
        $price += $v['sl'] * $v['data']['Price'];
    }
    $userId = $_SESSION['user_data']['UserId'];


    $n = $order->insert($name, $phone, $address, $userId, $price);
    if ($n > 0)
    {
        $data = $order->getOrder($n);
      
        foreach ($_SESSION['cart'] as $v)
        {
            if(isset($v))
            {
                //lỗi ko insert detail order
                // $detail->insert($v['sl'], $v['sl'] * $v['data']['Price'], $n, $v['data']["Pro_Id"]);
            }
        }
        $_SESSION['message'] = ['alertType' => 'success', 'message' => 'đã lưu lại đơn hàng'];
        header("Location: index.php?ac=home");
        exit;
    } else
    {

        $_SESSION['message'] = ['alertType' => 'danger', 'message' => 'Xử lý thất bại'];
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        exit;
    }
}