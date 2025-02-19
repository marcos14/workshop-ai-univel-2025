<?php
$dbFile = './workshop_ai_univel_2025.db';

// Cria a conexão
$conn = new SQLite3($dbFile);

// Lê o arquivo SQL
$sql = file_get_contents('./database.sql');

// Executa as queries do arquivo SQL
if ($conn->exec($sql)) {
    echo "Database and tables created successfully";
} else {
    echo "Error creating database and tables: " . $conn->lastErrorMsg();
}

// Fecha a conexão
$conn->close();
?>
