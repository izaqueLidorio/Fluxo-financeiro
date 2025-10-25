<?php
include_once("templates/header.php");


?>

<div class="container">


    <?php if (isset($print_msg) && $print_msg != ""): ?>
    <p class="msg"><?= $print_msg ?> </p>
    <?php endif; ?>

    <H1 id="main-title">Minhas Contas</H1>

     <?php
    

     if (count($contas)  > 0): ?>
    <p> Temos contas  </p>

    <!-- tabela de contas -->
    <table class="table" id="valores-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Valor</th>
                <th scope="col">Data de vencimento</th>
                <th scope="col">tipo</th>
                <th scope="col">descrição</th>
                <th scope="col">status</th>
          
                
                <th scope="col"></th>
            </tr>
           </thead>

       

        <!-- pegando os dados com o foreach e pasando para a tabela-->
        <tbody>
            <?php foreach ($contas as $conta): ?>
            <tr>
                <td ecope='row' class="color-id"><?= $conta['id'] ?></td>
                <td>R$ <?= number_format($conta['valor'], 2, ',', '.') ?></td>
                <td ecope='row'><?= $conta['data_vencimento'] ?></td>
                <td ecope='row'><?= $conta['tipo'] ?></td>
                <td ecope='row'><?= $conta['descricao'] ?></td>
                <td ecope='row'><?= $conta['status'] ?></td>
               
                <td class="actions">

                    <a href="<?= $BASE_URL ?>show.php?id=<?= $conta['id'] ?>"><i
                            class="fas fa-eye check-icon"></i></a>

                      <a href="<?= $BASE_URL ?>edit_status.php?id=<?= $conta['id'] ?>"><i
                            class="far fa-edit edit-icon"></i></a>
                   
                    <form class="delete-form"
                     action="config/process.php?"
                      method="post">

                        <input type="hidden" name="type" value="delete">
                        <input type="hidden" name="id" value="<?= $conta['id'] ?>">
                        <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <?php else: ?>
    <p id="empty-list-text">Ainda não há contas em seu financeiro,
        <a href="<?= $BASE_URL ?>create.php"> Clique aqui para adicionar</a>
    </p>
    <?php endif; ?>

</div>



<?php  
include_once("contas.php");
include_once("templates/footer.php");
?>