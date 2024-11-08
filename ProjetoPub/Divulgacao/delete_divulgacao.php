<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para excluir a divulgação pelo ID
    $deleteQuery = "DELETE FROM Divulgacao WHERE id = '$id'";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "Divulgação excluída com sucesso!";
    } else {
        echo "Erro ao excluir divulgação: " . $conn->error;
    }
} else {
    echo "ID de divulgação não fornecido.";
}
?>
<br>
<a href="list_divulgacoes.php">Voltar para a Lista de Divulgações</a>
