<?php include("../include/menu.php"); ?>
<?php
require_once('../fonctions/fonction.php');

$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$pagination = get_all_products($connexion, $page);

$users = $pagination['data'];
$totalPages = $pagination['total_pages'];
$currentPage = $pagination['current_page'];
?>


<div class="container mt-5 py-5 pb-5">
  <div class="col-lg-12 col-sm-12">
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="fw-bold text-uppercase text-primary mb-0">Liste des produits</h4>
      <a href="add_product.php" class="btn btn-primary border-0 rounded-0">
        <i class="fa-solid fa-plus me-1"></i>
        Ajouter
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
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Qte</th>
            <th scope="col">Pu_a</th>
            <th scope="col">Pu_v</th>
            <th scope="col">Qte_seuil</th>
            <th scope="col">Fabricated_at</th>
            <th scope="col">Expired_at</th>    
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($users)): ?>
            <?php foreach ($users as $index => $category_product): ?>
              <tr>
                <td><?= ($index + 1) + ($currentPage - 1) * 25 ?></td>
                <td><?= htmlspecialchars($product['code']) ?></td>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td><?= htmlspecialchars($product['qte']) ?></td>
                <td><?= htmlspecialchars($product['pu_a']) ?></td>
                <td><?= htmlspecialchars($product['pu_v']) ?></td>
                <td><?= htmlspecialchars($product['qte_seuil']) ?></td>
                <td><?= htmlspecialchars($product['fabriated_at']) ?></td>
                <td><?= htmlspecialchars($product['expired_at']) ?></td>
                <td>
                    <?php if ($product['is_active']): ?>
                        <span class="badge bg-success border-0 rounded-0 text-white px-2 py-2">Actif</span>
                        <?php else: ?>
                            <span class="badge bg-danger border-0 rounded-0 text-white px-2 py-2">Inactif</span>
                    <?php endif; ?>
                </td>
                <td>
                    <div class="d-flex align-items-center justify-content-center">

                    <?php if ($product['is_active']): ?>
                        <a  href="desactivate_product.php?uuid=<?= htmlspecialchars($product['uuid']) ?>" class="badge bg-danger border-0 rounded-0 text-white text-decoration-none px-2 py-2 mx-2">Désactiver</a>
                        <?php else: ?>
                            <a href="activate_product.php?uuid=<?= htmlspecialchars($product['uuid']) ?>" class="badge bg-success border-0 rounded-0 text-white text-decoration-none px-2 py-2 mx-2">Activer</a>
                    <?php endif; ?>

                    <a href="update_product.php?uuid=<?= htmlspecialchars($product['uuid']) ?>" class="badge bg-warning border-0 rounded-0 text-white text-decoration-none px-2 py-2 mx-2">Modifier</a>
                    <a href="delete_product.php?uuid=<?= htmlspecialchars($product['uuid']) ?>" class="badge bg-danger border-0 rounded-0 text-white text-decoration-none px-2 py-2 mx-2">Supprimer</a>


                    </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="12">Aucun élément trouvé</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
      </div>
    
      <div class="pagination">
    <ul class="pagination">
        <?php if ($currentPage > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $currentPage - 1 ?>">Précédent</a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $currentPage + 1 ?>">Suivant</a>
            </li>
        <?php endif; ?>
    </ul>
</div>

    </div>
    </div>
    
</div>