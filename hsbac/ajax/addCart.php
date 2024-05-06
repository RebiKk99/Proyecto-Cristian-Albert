<?php
    $products = unserialize($_COOKIE['products']??'');
    if(is_array($products)==false)$products=array();
    $ifAlreadyProduct=false;
    foreach ($products as $key => $value) {
        if ($value['id']==$_REQUEST['id']) {
            $products[$key]['quantity']=$products[$key]['quantity']+$_REQUEST['quantity'];
            $ifAlreadyProduct=true;
        }
    }
if($ifAlreadyProduct==false){
    $new=array(
        "id"=>$_REQUEST['id'],
        "name"=>$_REQUEST['name'],
        "web_path"=>$_REQUEST['web_path'],
        "quantity"=>$_REQUEST['quantity'],
        "price"=>$_REQUEST['price']
    );
    array_push($products,$new);
}
setcookie("products",serialize($products));
echo json_encode($products);

?>