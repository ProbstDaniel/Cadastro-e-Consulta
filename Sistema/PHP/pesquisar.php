<?php
// Incluir a conexão com o banco de dados
require_once 'PHP/db.php';

$search = $_GET['search'] ?? '';

// Preparar a consulta SQL com base na pesquisa inserida no campo
if ($search) {
    $stmt = $pdo->prepare("SELECT * FROM alunos WHERE nome LIKE :search OR curso LIKE :search");
    $stmt->execute([':search' => '%' . $search . '%']);
} else {
    $stmt = $pdo->prepare("SELECT * FROM alunos");
    $stmt->execute();
}

$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
