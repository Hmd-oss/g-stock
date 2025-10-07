<?php include("../include/menu.php"); ?>
<?php
require_once('../fonctions/fonction.php');

 $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
 $pagination = get_all_ventes($connexion, $page);

 $ventes = $pagination['data'];
 $totalPages = $pagination['total_pages'];
 $currentPage = $pagination['current_page'];
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
        <div class="alert alert-info text-center rounded-0 "><?php echo $message; ?> !</div>
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
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
           
        <?php if (!empty($ventes)): ?>
        <?php foreach ($ventes as $index => $vente): ?>
            <tr>
            <td><?= ($index + 1) + ($currentPage - 1) * 25 ?></td>
            <td><?= htmlspecialchars(string: $vente['sale_code']) ?></td>
                <td><?= htmlspecialchars($vente['first_name'] . ' ' . $vente['last_name']) ?></td>
                <td><?= htmlspecialchars(string: $vente['name']) ?></td>
                <td><?= htmlspecialchars($vente['quantity']) ?></td>
                <td><?= htmlspecialchars($vente['total_price']) ?></td>
                <td><?= htmlspecialchars($vente['created_at']) ?></td>
                <td>
                <a href="delete_vente.php?uuid=<?= htmlspecialchars($vente['uuid']) ?>" class="badge bg-danger border-0 rounded-0 text-white text-decoration-none px-2 py-2 mx-2">Supprimer</a>
                <a href="print_vente.php?uuid=<?= htmlspecialchars($vente['uuid']) ?>" class="badge bg-warning border-0 rounded-0 text-white text-decoration-none px-2 py-2 mx-2">Imprimer</a>
              </td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
              <td colspan="10">Aucun élément trouvé</td>
            </tr>
            <?php endif; ?>
        </tbody>
      </table>
      </div>


    </div>
  </div>
</div>
