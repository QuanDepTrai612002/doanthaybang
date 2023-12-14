<?php
$ac = Utils::getIndex('ac', 'home');
$product = new Product();

if ($ac == 'home')
{
    include ROOT . '/module/showProduct.php';
}
if ($ac == 'detail')
{
    include ROOT.'/module/detail.php';
}