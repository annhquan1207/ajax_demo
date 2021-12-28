<?php
function get_pagging($num_page, $page, $base_url = "")
{
    $str_pagging = " <ul class='pagging'>";
    if ($page > 1) {
        $page_prev =  $page - 1;
        $str_pagging .= "<li><a href = \"$base_url&page={$page_prev}\">Trước</a></li>";
    }
    for ($i = 1; $i <= $num_page; $i++) {
        $active = "";
        if ($i == $page) $active = "class = 'active'";
        $str_pagging .= "<li $active><a href = \"$base_url&page={$i}\">$i</a></li>";
    }
    if ($page < $num_page) {
        $page_next =  $page + 1;
        $str_pagging .= "<li><a href = \"$base_url&page={$page_next}\">Sau</a></li>";
    }
    $str_pagging .= "</ul>";
    return $str_pagging;
}

?>
<style>
    ul.pagging {
        display: flex;
        padding-bottom: 50px;
        margin-left: 720px;

    }

    ul.pagging li a {
        padding: 5px 10px;
        border: 1px solid gray;
        color: #333;
        display: block;
    }

    ul.pagging li {
        padding: 0px 2px;
    }

    ul.pagging li.active a {
        border: 1px solid red;
        color: red;
    }
</style>
<!-- <div>
    <ul class="pagging">
        <li><a href="">Trước</a></li>
        <li class="active"><a href="?mod=users&act=main&page=1">1</a></li>
        <li><a href="?mod=users&act=main&page=2">2</a></li>
        <li><a href="?mod=users&act=main&page=3">3</a></li>
        <li><a href="?mod=users&act=main&page=4">4</a></li>
        <li><a href="?mod=users&act=main&page=2">Sau</a></li>
    </ul>
</div>  -->