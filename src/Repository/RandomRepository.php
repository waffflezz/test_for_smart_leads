<?php

namespace App\Repository;

use App\Kernel\Database\Database;

class RandomRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function store(int $value): int
    {
        return $this->db->insert('numbers', ['number' => $value]);
    }

    /**
     * @throws \Exception
     */
    public function get(int $id): int
    {
        $result = $this->db->find('numbers', $id);
        if (!$result) {
            throw new \Exception('Number not found');
        }
        return $result['number'];
    }
}