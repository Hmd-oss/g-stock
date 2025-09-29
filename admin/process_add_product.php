<?php
include("../database/connexion.php");
include("../fonctions/fonction.php");

$error = "";
$success = "";

if (isset($_POST["save_product"])){
    $uuid = generate_uuid_v4();
    $code = $_POST["code"] ?? null;
    $name = $_POST["name"] ?? null;
    $qte = $_POST["qte"] ?? null;
    $pu_a = $_POST["pu_a"] ?? null;
    $pu_v = $_POST["pu_v"] ?? null;
    $fabricated_at = $_POST["fabricated_at"] ?? null;
    $expired_at = $_POST["expired_at"] ?? null;
    

    // verification de l'unicite des donnees

    $exist_info = $connexion->prepare("SELECT COUNT(*) FROM tlbl_products WHERE is_deleted = 1 AND( code = :code OR qte = :qte OR qte_seuil = :qte_seuil OR pu_a = :pu_a OR pu_v = :pu_v OR fabricated)");
    $exist_info->execute([
        ":name" => $name,
    ]);
    if($exist_info->fetchColumn() > 0){
        $error = "ce produit existe deja";
    }else {
        $insert_info = $connexion->prepare(
            "INSERT INTO tlbl_products(uuid,name,description)
            VALUES (:uuid,:name,:description)
            ");


        $insert_info->execute([
            ":uuid" => $uuid,
            ":name" => $name,
            "description" => $description,
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