<?php

namespace App\Service;

use App\Repository\RandomRepository;

class RandomService
{
    private RandomRepository $repository;

    public function __construct()
    {
        $this->repository = new RandomRepository();
    }

    public function generateRandomInteger($min, $max): array
    {
        $integer = rand($min, $max);
        return ['id' => $this->repository->store($integer), 'number' => $integer];
    }

    /**
     * @throws \Exception
     */
    public function getInteger($id): int
    {
        return $this->repository->get($id);
    }
}