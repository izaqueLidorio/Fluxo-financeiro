<?php
// Calcular totais
$total_pagar = 0;
$total_receber = 0;

foreach ($contas as $conta) {
    if ($conta['tipo'] == 'pagar' && $conta['status'] == 'pendente') {
        $total_pagar += $conta['valor'];
    }
    if ($conta['tipo'] == 'receber' && $conta['status'] == 'pendente') {
        $total_receber += $conta['valor'];
    }
}

$saldo_geral = $total_receber - $total_pagar;
$total_contas = $total_receber + $total_pagar;
?>

<div class="container">
    <!-- Cards de Totais -->
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">A Pagar</h5>
                    <h3 class="card-text">R$ <?= number_format($total_pagar, 2, ',', '.') ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">A Receber</h5>
                    <h3 class="card-text">R$ <?= number_format($total_receber, 2, ',', '.') ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card <?= $saldo_geral >= 0 ? 'bg-primary' : 'bg-warning' ?>">
                <div class="card-body text-white">
                    <h5 class="card-title">Saldo Geral</h5>
                    <h3 class="card-text">R$ <?= number_format($saldo_geral, 2, ',', '.') ?></h3>
                </div>
            </div>
        </div>
                <div class="col-md-3">
            <div class="card <?= $total_contas >= 0 ? 'bg-secondary' : 'bg-warning' ?>">
                <div class="card-body text-white">
                    <h5 class="card-title">Total em contas</h5>
                    <h3 class="card-text">R$ <?= number_format($total_contas, 2, ',', '.') ?></h3>
                </div>
            </div>
        </div>
    </div>

   