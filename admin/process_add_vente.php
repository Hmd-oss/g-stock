<?php
include("../database/connexion.php");

$error = "";
$success = "";

if(isset($_POST["save_vente"])) {
    $uuid = generate_uuid_v4();
    $product_uuid = $_POST["product_uuid"] ?? null;
    $client_uuid = $_POST["client_uuid"] ?? null;
    $quantity = $_POST["quantity"] ?? null;
    $sale_code= genererCodeVente();
    

$get_price_product = $connexion->prepare("SELECT pu_v FROM tlbl_products WHERE uuid = :product_uuid");
$get_price_product->execute([":product_uuid" => $product_uuid]);

$product = $get_price_product->fetch(PDO::FETCH_ASSOC);
$price = $product["pu_v"] ?? null;

$total_price = $price *$quantity;


  
$insert_info = $connexion->prepare(
    "INSERT INTO tlbl_sales(uuid,sale_code,product_uuid,client_uuid,quantity,total_price)
    VALUES (:uuid,:sale_code,:product_uuid,:client_uuid,:quantity,:total_price)"
);
$insert_info->execute([
    ":uuid" => $uuid,
    ":product_uuid" => $product_uuid,
    ":client_uuid" => $client_uuid,
    ":quantity" => $quantity,
    ":sale_code" => $sale_code,
    ":total_price" => $total_price,
]);

$update_tlbl_products = $connexion->prepare("UPDATE tlbl_products SET qte = qte -:quantity WHERE uuid = :product_uuid");
$update_tlbl_products->execute([
    ":quantity" => $quantity,
    ":product_uuid"=> $uuid,
]);

if($insert_info){
    $success = "vente save successfully";
    echo "<script>setTimeout(function {window.location.href='vente.php'; } , 3000)</script>";
}else{
    $error = "error saving";
}

}

?>


