<?php
class Database {
    private $pdo;

    public function __construct($dbFile) {
        $this->pdo = new PDO("sqlite:" . realpath($dbFile));
        $this->createTable();
    }

    private function createTable() {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS projects (
            id INTEGER PRIMARY KEY,
            name TEXT NOT NULL,
            description TEXT
        )");
    }

    public function getProjects() {
        $stmt = $this->pdo->query("SELECT * FROM projects");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPdo() {
        return $this->pdo;
    }
}
?>
