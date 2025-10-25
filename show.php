<?php
include_once("templates/header.php");
?>


<div class="container ct " id="view-conta-container">

   <?php include_once("templates/backbtn.html"); ?>

   <h1 id="main-title"> R$ <?= number_format($conta['valor'], 2, ',', '.') ?></h1>

   <p class="bold">Data de vencimento</p>
   <p> <?= $conta['data_vencimento'] ?> </p>

   <p class="bold">Descrição</p>
   <p> <?= $conta['descricao'] ?> </p>

   <p class="bold">Tipo</p>
   <p> <?= $conta['tipo'] ?> </p>

   <p class="bold">Status</p>
   <p> <?= $conta['status'] ?> </p>


</div>


<?php
include_once("templates/footer.php");
?>