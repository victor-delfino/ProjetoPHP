<?php include 'db.php'; ?>

<h2>Adicionar Novo Autor</h2>
<form action="create_autor.php" method="POST">
    Nome: <input type="text" name="nome" required><br>
    Tipo de Autor: <input type="text" name="descricao" required><br>
    <input type="submit" name="submit" value="Adicionar">
</form>
<a href="list_autor.php">Verificar a Lista de Autores.</a>

<?php
// código para adicionar a inserção na classificação autor e após isso, salvar o nome do autor na tabela Autor;
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    // Verifica se a classificação de autor já existe
    $checkQuery = "SELECT id FROM ClassificacaoAutor WHERE descricao = '$descricao'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        // Se a classificação já existe, obtém o ID
        $row = $result->fetch_assoc();
        $tipo_autor_id = $row['id'];
    } else {
        // Se a classificação não existe, insere uma nova
        $insertClassQuery = "INSERT INTO ClassificacaoAutor (descricao) VALUES ('$descricao')";
        if ($conn->query($insertClassQuery) === TRUE) {
            $tipo_autor_id = $conn->insert_id;
        } else {
            echo "Erro ao inserir classificação de autor: " . $conn->error;
            exit();
        }
    }

    // Insere o autor com o ID da classificação obtido
    $insertAuthorQuery = "INSERT INTO Autor (nome, tipo_autor_id) VALUES ('$nome', '$tipo_autor_id')";

    if ($conn->query($insertAuthorQuery) === TRUE) {
        echo "Novo autor adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar autor: " . $conn->error;
    }
}
?>
