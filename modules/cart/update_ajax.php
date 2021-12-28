<?php
$id = $_POST['id'];
$qty = $_POST['qty'];
$item = get_product_by_id($id);

if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
    dd('123');
    $_SESSION['cart']['buy'][$id]['qty'] = $qty;
    $sub_total = $qty * $item['price'];
    $_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total;
    update_info_cart();
    $total = get_total_cart();
    $data = array(
        'sub_total' => currency_format($sub_total),
        'total' => currency_format($total)
    );
    echo json_encode($data);
}
