<?php include("../include/menu.php"); ?>
<?php include("../fonctions/fonction.php"); ?>
<?php 
$fournisseurs = get_active_fournisseurs($connexion);
$category_products = get_active_category_products($connexion);
?>

<div class="container mt-5 py-5 pb-5">
<div class="col-lg-12 col-sm-12">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="fw-bold text-uppercase text-primary mb-0">Ajouter un produit</h4>
        <a href="category_product.php" class="btn btn-secondary border-0 rounded-0">
           <i class="fa-solid fa-backward me-1"></i>
            Annuler

        </a>
    </div>



        <div class="col-md-12 col-sm-12 mb-3">
    <?php include("process_add_product.php"); ?>
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
                    <select name="fournisseur_uuid" class="form-select" id="" required>
                        <option value="" disabled selected>--choisir une option--</option>
                        <?php foreach($fournisseurs as $fournisseur): ?>
                            <option value="<?= $fournisseur["uuid"]  ?>">
                                <?= $fournisseur["last_name"] . ' ' .$fournisseur["first_name"]  ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-lg-4 col-sm-12 mb-3">
                    <label for="">Categorie produits <span class="text-danger">*</span></label>
                    <select name="category_product_uuid" class="form-select" id="" required>
                        <option value="" disabled selected>--choisir une option--</option>
                        <?php foreach($category_products as $category_product): ?>
                            <option value="<?= $category_product["uuid"]  ?>">
                                <?= $category_product["name"] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="col-lg-4 col-sm-12 mb-3">
                    <label for="">Code <span class="text-danger">*</span></label>
                    <input type="number" name="code" class="form-control" required>
                    <div class="invalid-feedback">
                        ce champ est requis
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 mb-3">
                    <label for="">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required>
                    <div class="invalid-feedback">
                        ce champ est requis
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 mb-3">
                    <label for="">Qte <span class="text-danger">*</span></label>
                    <input type="number" min="0" name="qte" class="form-control" required>
                    <div class="invalid-feedback">
                        ce champ est requis
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 mb-3">
                    <label for="">Pu_a <span class="text-danger">*</span></label>
                    <input type="number" min="0" name="pu_a" class="form-control" required>
                    <div class="invalid-feedback">
                        ce champ est requis
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 mb-3">
                    <label for="">Pu_v <span class="text-danger">*</span></label>
                    <input type="number" min="0" name="pu_v" class="form-control" required>
                    <div class="invalid-feedback">
                        ce champ est requis
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 mb-3">
                    <label for="">Qte seuil <span class="text-danger">*</span></label>
                    <input type="number" min="0" name="qte_seuil" class="form-control" required>
                    <div class="invalid-feedback">
                        ce champ est requis
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 mb-3">
                    <label for="">Fabricated_at <span class="text-danger">*</span></label>
                    <input type="date" name="fabricated_at" class="form-control" required>
                    <div class="invalid-feedback">
                        ce champ est requis
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 mb-3">
                    <label for="">Expired_at <span class="text-danger">*</span></label>
                    <input type="date" name="expired_at" class="form-control" required>
                    <div class="invalid-feedback">
                        ce champ est requis
                    </div>
                </div>
                
            <div class="d-flex justify-content-between">
                <button type="submit" name="add_products" class="btn btn-primary border-0 rounded-0 mt-3">Save</button>
                <button type="reset" class="btn btn-danger border-0 rounded-0">cancel</button>
            </div>

        </form>
    </div>
</div>




</div>
  

<script src="../assets/js/main.js"></script>