<?php
include_once("templates/header.php");
?>

<div class="container ct">

    <?php include_once("templates/backbtn.html"); ?>

    <h1 id="main-title"> Editar Status</h1>

    <form id="create-form" action=" <?= $BASE_URL ?>config/process.php" method="POST">

        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $conta['id'] ?>">

         <div class="form-group ">
            <label for="status" class="form-label">Status da conta:</label>
            <select class="form-select" id="status" name="status" required>
                <option value="" >Selecione o Status</option>
                <option value="pago">Pago</option>
                <option value="pendente">Pendente</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary t"> Atualizar </button>
    </form>
</div>


<?php
include_once("templates/footer.php");
?>