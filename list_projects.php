<?php
require 'database.php';

$db = new Database('./workshop_ai_univel_2025.db');
$projects = $db->getProjects();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Projetos</title>
</head>
<body>
    <h1>Lista de Projetos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
        </tr>
        <?php foreach ($projects as $project): ?>
        <tr>
            <td><?php echo htmlspecialchars($project['id']); ?></td>
            <td><?php echo htmlspecialchars($project['name']); ?></td>
            <td><?php echo htmlspecialchars($project['description']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
