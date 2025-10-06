<?php include("../include/menu.php"); ?>
<?php 
include("../fonctions/fonction.php");
$fournisseurs = get_active_fournisseurs($connexion);
$products = get_active_products($connexion);    


?>
<div class="container mt-5 py-5 pb-5">
<div class="col-lg-12 col-sm-12">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="fw-bold text-uppercase text-primary mb-0">Ajouter un approvisionnement</h4>
        <a href="approvisionnement.php" class="btn btn-secondary border-0 rounded-0">
           <i class="fa-solid fa-backward me-1"></i>
            Annuler

        </a>
    </div>

    <div class="col-md-12 col-sm-12 mb-3">
    <?php include("process_add_approvisionnement.php"); ?>
    <?php if ($error): ?>
    <div class="alert alert-danger text-center border-0 rounded-0"><?= $error ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="alert alert-success text-center border-0 rounded-0"><?= $success ?></div>
    <?php endif;?>
</div>

<div class="col-lg-12 col-sm-12">
<div class="card shadow mt-3 border-0 rounded-0 p-3">
    <form class="needs-validation" novalidate action="" method="post">
        <div class="row">

        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="">Fournisseur <span class="text-danger">*</span></label>
                <select class="form-select" name="fournisseur_uuid" required>
                <option selected disabled value="">Choisir...</option>
                <?php foreach($fournisseurs as $fournisseur): ?>
                    <option value="<?= $fournisseur["uuid"]  ?>">
                        <?= $fournisseur["last_name"] . ' ' .$fournisseur["first_name"]  ?>
                    </option>
                <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    ce champ est requis
                </div>
        </div>


        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="">Produits<span class="text-danger">*</span></label>
                <select class="form-select" name="product_uuid"  required>
                <option selected disabled value="">Choisir...</option>
                <?php foreach($products as $product): ?>
                    <option value="<?= $product["uuid"]  ?>">
                        <?= $product["name"]  ?>
                    </option>
                <?php endforeach; ?>
                </select>
                <div  class="invalid-feedback">
                  Ce champ est requis
                </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-3">
                    <label for="">Nouvelle Qté <span class="text-danger">*</span></label>
                    <input type="text" class="form-control"  name="new_qte" required>
                    <div class="invalid-feedback">
                        ce champ est requis
                    </div>
        </div>

        <div class="d-flex justify-content-between">
                <button type="submit"  name="save_approvisionnement" class="btn btn-primary border-0 rounded-0 mt-3">Approvisionner</button>
                <button type="reset" class="btn btn-danger border-0 rounded-0">cancel</button>
            </div>

        </div>
    </form>
</div>

</div>
    

