<?php include 'db.php'; ?>

<h2>Lista de Divulgações</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Data do Evento</th>
        <th>Publicação</th>
        <th>Convidado</th>
        <th>Ações</th>
    </tr>

    <?php
    // Consulta para obter todas as divulgações com detalhes da publicação e convidado
    $query = "SELECT Divulgacao.id, Divulgacao.data_evento, Publicacao.titulo AS publicacao_titulo, Convidado.nome AS convidado_nome 
              FROM Divulgacao 
              JOIN Publicacao ON Divulgacao.publicacao_id = Publicacao.id
              JOIN Convidado ON Divulgacao.convidado_id = Convidado.id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['data_evento'] . "</td>";
            echo "<td>" . $row['publicacao_titulo'] . "</td>";
            echo "<td>" . $row['convidado_nome'] . "</td>";
            echo "<td><a href='delete_divulgacao.php?id=" . $row['id'] . "' onclick='return confirm(\"Tem certeza que deseja excluir esta divulgação?\")'>Excluir</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Nenhuma divulgação encontrada.</td></tr>";
    }
    ?>
</table>
<a href="create_divulgacao.php">Adicionar Nova Divulgação</a>
