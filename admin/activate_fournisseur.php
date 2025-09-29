<?php
include("../database/connexion.php");

if (isset($_GET["uuid"])) {
    $uuid = $_GET["uuid"];
    $query = "UPDATE tlbl_fournisseurs SET is_active = 1 WHERE uuid = :uuid";
    $execute_request = $connexion->prepare( $query);
    $execute_request->bindParam(":uuid",$uuid);
    $execute_request->execute();

    if ($execute_request->rowCount() > 0) {
        header("Location: fournisseur.php?message=fournisseur activer avec succes");
    }else{
    header("Location: fournisseur.php?message=une erreur est survenue");
    }

}else{
    header("Location: fournisseur.php?message=uuid du fournisseur introuvable");
    exit;
}

?>