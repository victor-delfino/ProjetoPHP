<?php include 'db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Deleta o autor com o ID especificado
    $sql = "DELETE FROM Autor WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Autor deletado com sucesso!";
    } else {
        echo "Erro ao deletar autor: " . $conn->error;
    }
} else {
    echo "ID do autor não especificado.";
}
?>

<a href="list_autor.php">Voltar para a lista de autores</a>
