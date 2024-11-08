<?php include 'db.php'; ?>

<h2>Adicionar Nova Divulgação</h2>
<form action="create_divulgacao.php" method="POST">
    Data do Evento: <input type="date" name="data_evento" required><br>

    <!-- Seleção de Publicação -->
    Publicação:
    <select name="publicacao_id" required>
        <option value="">Selecione uma Publicação</option>
        <?php
        $pubQuery = "SELECT id, titulo FROM Publicacao";
        $pubResult = $conn->query($pubQuery);

        if ($pubResult->num_rows > 0) {
            while ($pubRow = $pubResult->fetch_assoc()) {
                echo "<option value='" . $pubRow['id'] . "'>" . $pubRow['titulo'] . "</option>";
            }
        }
        ?>
    </select>
    <br>

    <!-- Seleção de Convidado -->
    Convidado:
    <select name="convidado_id" required>
        <option value="">Selecione um Convidado</option>
        <?php
        $convidadoQuery = "SELECT id, nome FROM Convidado";
        $convidadoResult = $conn->query($convidadoQuery);

        if ($convidadoResult->num_rows > 0) {
            while ($convidadoRow = $convidadoResult->fetch_assoc()) {
                echo "<option value='" . $convidadoRow['id'] . "'>" . $convidadoRow['nome'] . "</option>";
            }
        }
        ?>
    </select>
    <br>

    <input type="submit" name="submit" value="Adicionar Divulgação">
</form>

<?php
if (isset($_POST['submit'])) {
    $data_evento = $_POST['data_evento'];
    $publicacao_id = $_POST['publicacao_id'];
    $convidado_id = $_POST['convidado_id'];

    // Insere a nova divulgação
    $insertQuery = "INSERT INTO Divulgacao (data_evento, publicacao_id, convidado_id) VALUES ('$data_evento', '$publicacao_id', '$convidado_id')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "Nova divulgação adicionada com sucesso!";
    } else {
        echo "Erro ao adicionar divulgação: " . $conn->error;
    }
}
?>
<br>
<a href="list_divulgacoes.php">Voltar para a Lista de Divulgações</a>
