<?php

$id = (int) $_GET['id'];
add_cart($id);
redirect('?mod=cart&act=show');
