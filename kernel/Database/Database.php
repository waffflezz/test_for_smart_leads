<?php

namespace App\Kernel\Database;

use App\Kernel\Database\DatabaseInterface;

class Database extends \SQLite3 implements DatabaseInterface
{
    private static $instance = null;

    private function __construct()
    {
        $this->open('random_numbers.db');

        $this->exec("
            CREATE TABLE IF NOT EXISTS numbers (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                number INTEGER NOT NULL
            )
        ");
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    /**
     * @inheritDoc
     */
    public function insert(string $table, array $data)
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));

        $stmt = $this->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");

        $index = 1;
        foreach ($data as $value) {
            $stmt->bindValue($index, $value);
            $index++;
        }

        $stmt->execute();

        return $this->lastInsertRowID();
    }

    public function find(string $table, int $id)
    {
        $stmt = $this->prepare("SELECT * FROM $table WHERE id = :id");
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

        $result = $stmt->execute();

        return $result->fetchArray(SQLITE3_ASSOC) ?: false;
    }
}