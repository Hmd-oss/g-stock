<?php
include("../database/connexion.php");


$error = "";
$success = "";

if (isset($_POST["add_products"])){
    $uuid = generate_uuid_v4();
    $code = $_POST["code"] ?? null;
    $name = $_POST["name"] ?? null;
    $qte = $_POST["qte"] ?? null;
    $qte_seuil = $_POST["qte_seuil"] ?? null;
    $pu_a = $_POST["pu_a"] ?? null;
    $pu_v = $_POST["pu_v"] ?? null;
    $fabricated_at = $_POST["fabricated_at"] ?? null;
    $expired_at = $_POST["expired_at"] ?? null;
    $fournisseur_uuid = $_POST["fournisseur_uuid"] ?? null;
    $category_product_uuid = $_POST["category_product_uuid"] ?? null;
    

    // verification de l'unicite des donnees

    $exist_info = $connexion->prepare("SELECT COUNT(*) FROM tlbl_products WHERE is_deleted = 1 AND(code = :code OR name = :name)");
    $exist_info->execute([
        ":name" => $name,
        ":code" => $code,
    ]);
    if($exist_info->fetchColumn() > 0){
        $error = "ce produit existe deja";
        
    }else {
        $insert_info = $connexion->prepare(
            "INSERT INTO tlbl_products(uuid,code,name,qte,pu_a,pu_v,qte_seuil,category_product_uuid,fournisseur_uuid,fabricated_at,expired_at)
            VALUES (:uuid,:code,:name,:qte,:pu_a,:pu_v,:qte_seuil,:category_product_uuid,:fournisseur_uuid,:fabriated_at,:expired_at)
            ");

        $insert_info->execute([
            ":uuid" => $uuid,
            ":code" => $code,
            "name" => $name,
            "qte" => $qte,
            "pu_a" => $pu_a,
            "pu_v" => $pu_v,
            "qte_seuil" => $qte_seuil,
            "category_product_uuid" => $category_product_uuid,
            "fournisseur_uuid" => $fournisseur_uuid,
            "fabriated_at" => $fabricated_at,
            "expired_at" => $expired_at
        ]);

        if($insert_info){
            $success = "product save successfully";
            echo "<script>setTimeout(function {window.location.href='product.php'; } , 3000)</script>";
        }else{
            $error = "error saving";
        }
    }
}

?>