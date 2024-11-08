<?php include 'db.php'; ?>

<h2>Lista de Publicações</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Tipo de Publicação</th>
        <th>Autor</th>
        <th>Ações</th>
    </tr>

    <?php
    // Consulta para obter todas as publicações com seus respectivos tipos e autores
    $query = "SELECT Publicacao.id, Publicacao.titulo, TipoPublicacao.descricao AS tipo_descricao, Autor.nome AS autor_nome 
              FROM Publicacao 
              JOIN TipoPublicacao ON Publicacao.tipo_publicacao_id = TipoPublicacao.id
              JOIN Autor ON Publicacao.autor_id = Autor.id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['titulo'] . "</td>";
            echo "<td>" . $row['tipo_descricao'] . "</td>";
            echo "<td>" . $row['autor_nome'] . "</td>";
            echo "<td><a href='delete_publicacao.php?id=" . $row['id'] . "' onclick='return confirm(\"Tem certeza que deseja excluir esta publicação?\")'>Excluir</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Nenhuma publicação encontrada.</td></tr>";
    }
    ?>
</table>
<a href="create_publicacao.php">Adicionar Nova Publicação</a>
