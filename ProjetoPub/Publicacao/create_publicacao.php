<?php include 'db.php'; ?>

<h2>Adicionar Nova Publicação</h2>
<form action="create_publicacao.php" method="POST">
    Título: <input type="text" name="titulo" required><br>
    Tipo de Publicação: <input type="text" name="tipo_descricao" required><br>
    Autor (ID): <input type="number" name="autor_id" required><br>
    <input type="submit" name="submit" value="Adicionar Publicação">
</form>
<a href="list_publicacao.php">Verificar a Lista de Publicações.</a>

<?php
if (isset($_POST['submit'])) {
    $titulo = $_POST['titulo'];
    $tipo_descricao = $_POST['tipo_descricao'];
    $autor_id = $_POST['autor_id'];

    // Verifica se o tipo de publicação já existe
    $checkTipoQuery = "SELECT id FROM TipoPublicacao WHERE descricao = '$tipo_descricao'";
    $result = $conn->query($checkTipoQuery);

    if ($result->num_rows > 0) {
        // Se o tipo de publicação já existe, obtém o ID
        $row = $result->fetch_assoc();
        $tipo_publicacao_id = $row['id'];
    } else {
        // Se o tipo de publicação não existe, insere uma nova
        $insertTipoQuery = "INSERT INTO TipoPublicacao (descricao) VALUES ('$tipo_descricao')";
        if ($conn->query($insertTipoQuery) === TRUE) {
            $tipo_publicacao_id = $conn->insert_id;
        } else {
            echo "Erro ao inserir tipo de publicação: " . $conn->error;
            exit();
        }
    }

    // Insere a nova publicação com o ID do tipo de publicação obtido
    $insertPublicacaoQuery = "INSERT INTO Publicacao (titulo, tipo_publicacao_id, autor_id) VALUES ('$titulo', '$tipo_publicacao_id', '$autor_id')";

    if ($conn->query($insertPublicacaoQuery) === TRUE) {
        echo "Nova publicação adicionada com sucesso!";
    } else {
        echo "Erro ao adicionar publicação: " . $conn->error;
    }
}
?>
