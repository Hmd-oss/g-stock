<?php
include("../database/connexion.php");

if (isset($_GET["uuid"])) {
    $uuid = $_GET["uuid"];
    $query = "UPDATE tlbl_sales SET is_deleted = 1 WHERE uuid = :uuid";
    $execute_request = $connexion->prepare( $query);
    $execute_request->bindParam(":uuid",$uuid);
    $execute_request->execute();

    if ($execute_request->rowCount() > 0) {
        header("Location: vente.php?message=vente supprimée avec succes");
    }else{
    header("Location: vente.php?message=une erreur est survenue");
    }

}else{
    header("Location: vente.php?message=uuid de la vente introuvable");
    exit;
}

?>