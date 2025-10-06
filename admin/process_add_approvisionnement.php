<?php
include("../database/connexion.php");


$error = "";
$success = "";

if (isset($_POST["save_approvisionnement"])){
    $uuid = generate_uuid_v4();
    $product_uuid = $_POST["product_uuid"] ?? null;
    $fournisseur_uuid = $_POST["fournisseur_uuid"] ?? null;
    $new_qte =$_POST["new_qte"] ?? null;

    $insert_info = $connexion->prepare(
        "INSERT INTO tlbl_approvisionnement(uuid,product_uuid,fournisseur_uuid,new_qte)
         VALUES (:uuid,:product_uuid,:fournisseur_uuid,:new_qte)"
    );
    $insert_info->execute([
        ":uuid"  => $uuid,
        ":product_uuid" => $product_uuid,
        ":fournisseur_uuid" => $fournisseur_uuid,
        ":new_qte" => $new_qte,
    ]);

    $update_tlbl_products = $connexion->prepare("UPDATE tlbl_products SET qte = qte +:new_qte WHERE uuid = :product_uuid");
    $update_tlbl_products->execute([
        ":new_qte" => $new_qte,
        ":product_uuid" => $product_uuid
    ]);

    if($insert_info){
        $success = "Approvisionnement effectué";
        echo "<script>setTimeout(function {window.location.href='approvisionnement.php'; } , 3000)</script>";
    }else{
        $error = "Echec de l'approvisionnement";
    }
}


?>