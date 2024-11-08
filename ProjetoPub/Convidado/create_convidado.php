<?php include 'db.php'; ?>

<h2>Adicionar Novo Convidado</h2>
<form action="create_convidado.php" method="POST">
    Nome: <input type="text" name="nome" required><br>
    <input type="submit" name="submit" value="Adicionar Convidado">
</form>

<?php
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];

    // Insere o novo convidado
    $insertQuery = "INSERT INTO Convidado (nome) VALUES ('$nome')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "Novo convidado adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar convidado: " . $conn->error;
    }
}
?>
<br>
<a href="list_convidados.php">Voltar para a Lista de Convidados</a>
