<?php
require 'inc/header.php';
$list_mobile = get_list_product_by_cat_id(1);
$list_macbook = get_list_product_by_cat_id(2);

?>


<div id="main-content-wp" class="home-page">
    <div class="wp-inner clearfix">
        <?php
        require 'inc/sidebar.php';
        ?>
        <div id="content" class="fl-right">
            <div class="section list-cat">
                <div class="section-head">
                    <h3 class="section-title"><a href="?mod=product&act=main&cat_id=1"> Điện thoại</a></h3>
                </div>
                <div class="section-detail">
                    <?php
                    if (!empty($list_mobile)) {
                    ?>
                        <ul class="list-item clearfix">
                            <?php foreach ($list_mobile as $item) {
                            ?>
                                <li>
                                    <a href="<?php echo $item['url'] ?>" title="" class="thumb">
                                        <img src="<?php echo $item['product_thumb'] ?>" alt="">
                                    </a>
                                    <a href="<?php echo $item['url'] ?>" title="" class="title"><?php echo $item['product_title'] ?></a>
                                    <p class="price"><?php echo currency_format($item['price']) ?></p>
                                </li>
                            <?php
                            } ?>


                        </ul>
                    <?php
                    }
                    ?>

                </div>
            </div>

            <div class="section list-cat">
                <div class="section-head">
                    <h3 class="section-title"><a href="?mod=product&act=main&cat_id=2"> Macbook</a></h3>
                </div>
                <div class="section-detail">
                    <?php
                    if (!empty($list_macbook)) {
                    ?>
                        <ul class="list-item clearfix">
                            <?php foreach ($list_macbook as $item) {
                            ?>
                                <li>
                                    <a href="<?php echo $item['url'] ?>" title="" class="thumb">
                                        <img src="<?php echo $item['product_thumb'] ?>" alt="">
                                    </a>
                                    <a href="<?php echo $item['url'] ?>" title="" class="title"><?php echo $item['product_title'] ?></a>
                                    <p class="price"><?php echo currency_format($item['price']) ?></p>
                                </li>
                            <?php
                            } ?>


                        </ul>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->
<?php
require 'inc/footer.php';
?>