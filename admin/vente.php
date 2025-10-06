<?php include("../include/menu.php"); ?>
<?php
require_once('../fonctions/fonction.php');

// $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
// $pagination = get_all_ventes($connexion, $page);

// $ventes = $pagination['data'];
// $totalPages = $pagination['total_pages'];
// $currentPage = $pagination['current_page'];
?>  

<div class="container mt-5 py-5 pb-5">
  <div class="col-lg-12 col-sm-12">
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="fw-bold text-uppercase text-primary mb-0">Liste des ventes</h4>
      <a href="add_vente.php" class="btn btn-primary border-0 rounded-0">
        <i class="fa-solid fa-plus me-1"></i>
        Nouvelle vente
      </a>
    </div>
  </div>

  <div class="col-lg-12 col-sm-12 mb-3">
     <?php if(!empty($_GET["message"])) : ?>
        <?php $message = $_GET["message"]; ?>
        <span class="text-info"><?php echo $message; ?> !</span>
      <?php endif; ?>
  </div>

  <div class="col-lg-12 col-sm-12 mb-3 mt-3">
    <div class="card shadow p-3 rounded-0 border-0"> 
      <div class="table-responsive">
        <table class="table table-striped table-bordered text-center table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Code vente</th>
            <th scope="col">Client</th>
            <th scope="col">Produit</th>
            <th scope="col">Quantité</th>
            <th scope="col">Prix total</th>
            <th scope="col">Date</th>
            <th scope="col">Statut</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            <tr>
             <td colspan = "10" >
                Pas d'éléments trouvés
              </td>
            </tr>
          
        </tbody>
      </table>
      </div>


    </div>
  </div>
</div>
