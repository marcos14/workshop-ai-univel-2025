<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Projeto</title>
</head>
<body>
    <h1>Inserir Novo Projeto</h1>
    <form action="insert_project.php" method="post">
        <label for="name">Nome do Projeto:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="description">Descrição:</label>
        <textarea id="description" name="description" required></textarea><br><br>
        
        <label for="start_date">Data de Início:</label>
        <input type="date" id="start_date" name="start_date" required><br><br>
        
        <label for="end_date">Data de Término:</label>
        <input type="date" id="end_date" name="end_date"><br><br>
        
        <input type="submit" value="Inserir Projeto">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        require 'database.php';
        $db = new Database('./workshop_ai_univel_2025.db');


        $sql = "INSERT INTO projects (name, description, start_date, end_date) VALUES (?, ?, ?, ?)";
        $stmt = $db->getPdo()->prepare($sql);

        if ($stmt) {
            $stmt->execute([$name, $description, $start_date, $end_date]);

            if ($stmt->rowCount() > 0) {
                echo "Novo projeto inserido com sucesso!";
            } else {
                echo "Erro ao inserir o projeto.";
            }
        } else {
            echo "Erro ao preparar a declaração SQL.";
        }
    }
    ?>
</body>
</html>
