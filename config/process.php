<?php
session_start();
include_once("connection.php");
include_once("url.php");

$data = $_POST;

if (!empty($data)) {

  // CRIAR conta
  if ($data["type"] === "create") {
    
    // Validar campos obrigatórios (REMOVER status da validação)
    if (empty($data['valor']) || empty($data['data_vencimento']) || empty($data['descricao']) || empty($data['tipo'])) {
      $_SESSION['msg'] = 'Preencha todos os campos obrigatórios!';
      header("Location: ../index.php");
      exit;
    }

    $valor = $data['valor'];
    $data_vencimento = $data['data_vencimento'];
    $descricao = $data['descricao'];
    $tipo = $data['tipo'];
    $status = 'PENDENTE'; 

    $query = 'INSERT INTO contas (valor, data_vencimento, descricao, tipo, status) VALUES (:valor, :data_vencimento, :descricao, :tipo, :status)';
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':data_vencimento', $data_vencimento);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':status', $status);

    try {
      $stmt->execute();
      $_SESSION['msg'] = 'Conta criada com sucesso!';
    } catch (PDOException $e) {
      $error = $e->getMessage();
      $_SESSION['msg'] = "Erro ao criar conta: $error";
    }
  }

  // EDITAR status
  else if ($data["type"] === "edit") {
    
    $id = $data['id'];
    $status = $data['status'];

    $query = 'UPDATE contas SET status = :status WHERE id = :id';
    $stmt = $conn->prepare($query);
    
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':status', $status);

    try {
      $stmt->execute();
      $_SESSION['msg'] = 'Status atualizado com sucesso!'; 
    } catch (PDOException $e) {
      $error = $e->getMessage();
      $_SESSION['msg'] = "Erro ao atualizar status: $error";
    }
  }

  // EXCLUIR conta
  else if ($data["type"] === "delete") {

    $id = $data["id"];
    $query = 'DELETE FROM contas WHERE id = :id';

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    
    try {
      $stmt->execute();
      $_SESSION['msg'] = 'Conta removida com sucesso!'; 
    } catch (PDOException $e) {
      $error = $e->getMessage();
      $_SESSION['msg'] = "Erro ao excluir conta: $error";
    }
  }

  // redirecionamento
  header("Location: ../index.php");
  exit;

} else {

  $id;

  // Busca de dados (GET)
  if (!empty($_GET)) {
    $id = $_GET["id"];
  }

  if (!empty($id)) {
    // Buscar conta específica
    $query = 'SELECT * FROM contas WHERE id = :id';
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $conta = $stmt->fetch();

  } else {
    // Buscar todas as contas
    $contas = [];
    $query = "SELECT * FROM contas ORDER BY data_vencimento ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $contas = $stmt->fetchAll();

  
  }
}

// Fechar conexão
$conn = null;
?>