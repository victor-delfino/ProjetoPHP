<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para excluir a publicação pelo ID
    $deleteQuery = "DELETE FROM Publicacao WHERE id = '$id'";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "Publicação excluída com sucesso!";
    } else {
        echo "Erro ao excluir publicação: " . $conn->error;
    }
} else {
    echo "ID de publicação não fornecido.";
}
?>
<br>
<a href="list_publicacao.php">Voltar para a Lista de Publicações</a>
