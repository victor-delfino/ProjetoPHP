<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para excluir o convidado pelo ID
    $deleteQuery = "DELETE FROM Convidado WHERE id = '$id'";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "Convidado excluído com sucesso!";
    } else {
        echo "Erro ao excluir convidado: " . $conn->error;
    }
} else {
    echo "ID de convidado não fornecido.";
}
?>
<br>
<a href="list_convidados.php">Voltar para a Lista de Convidados</a>
