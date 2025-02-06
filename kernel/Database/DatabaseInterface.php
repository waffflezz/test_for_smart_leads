<?php

namespace App\Kernel\Database;

interface DatabaseInterface
{
    /**
     * @param string $table
     * @param array $data
     * @return int|false
     */
    public function insert(string $table, array $data);

    /**
     * @param string $table
     * @param int $id
     * @return array|false
     */
    public function find(string $table, int $id);
}