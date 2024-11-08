<?php include 'db.php'; ?>

<h2>Lista de Autores</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Classificação</th>
        <th>Ação</th>
    </tr>

    <?php
    $sql = "SELECT Autor.id, Autor.nome, ClassificacaoAutor.descricao AS classificacao
            FROM Autor
            JOIN ClassificacaoAutor ON Autor.tipo_autor_id = ClassificacaoAutor.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nome']}</td>
                    <td>{$row['classificacao']}</td>
                    <td><a href='delete_autor.php?id={$row['id']}' onclick='return confirmDelete();'>Deletar</a></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Nenhum autor encontrado.</td></tr>";
    }
    ?>

</table>
<a href="create_autor.php">Voltar para a Criação de Autores.</a>
