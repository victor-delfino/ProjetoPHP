<?php include 'db.php'; ?>

<h2>Lista de Convidados</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Ações</th>
    </tr>

    <?php
    // Consulta para obter todos os convidados
    $query = "SELECT * FROM Convidado";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td><a href='delete_convidado.php?id=" . $row['id'] . "' onclick='return confirm(\"Tem certeza que deseja excluir este convidado?\")'>Excluir</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Nenhum convidado encontrado.</td></tr>";
    }
    ?>
</table>
<a href="create_convidado.php">Adicionar Novo Convidado</a>
