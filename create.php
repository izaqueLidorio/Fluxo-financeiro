<?php
   include_once("templates/header.php");


?>

<div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title"> Adicionar Contas</h1>

   <form id="create-form" action="config/process.php" method="POST">
        <input type="hidden" name="type" value="create">
        

        <div class="form-group ">
            <label for="valor" class="form-label">Valor:</label>
            <input type="number" class="form-control" id="valor" name="valor" 
                   placeholder="Digite o valor" step="0.01" min="0.01" required>
        </div>

     
        <div class="form-group ">
            <label for="data_vencimento" class="form-label">Data de vencimento:</label>
            <input type="date" class="form-control" id="data_vencimento" name="data_vencimento" required>
        </div>

      
        <div class="form-group ">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao" 
                      placeholder="Insira a descrição" rows="3" required></textarea>
        </div>

          <!-- Campo do Tipo -->
        <div class="form-group ">
            <label for="tipo" class="form-label">Tipo de Conta:</label>
            <select class="form-select" id="tipo" name="tipo" required>
                <option value="" >Selecione o tipo</option>
                <option value="pagar">Conta a Pagar</option>
                <option value="receber">Conta a Receber</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary t"> cadastrar</button>
    </form>
</div>


<?php
   include_once("templates/footer.php");
?>