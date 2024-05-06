<?php
    $products=unserialize($_COOKIE['products']);
    foreach ($products as $key => $value) {
        if ($_REQUEST['id']==$value['id']){
            if($_REQUEST['type']=="less"&&$products[$key]['quantity']>1){
                $products[$key]['quantity']--;
            }
            if($_REQUEST['type']=="more"){
                $products[$key]['quantity']++;
            }
        }
    }
    setcookie("products",serialize($products));
    echo json_encode($products);
?>