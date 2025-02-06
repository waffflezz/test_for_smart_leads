<?php

namespace App\Controller;

use App\Kernel\Controller\Controller;
use App\Kernel\Database\Database;
use App\Service\RandomService;

class RandomController extends Controller
{
    private RandomService $randomService;

    public function __construct()
    {
        $this->randomService = new RandomService();
    }

    public function random()
    {
        $result = $this->randomService->generateRandomInteger(0, 100);

        echo json_encode(['id' => $result['id'], 'number' => $result['number']]);
    }

    public function get()
    {
        $id = $this->request()->input('id');
        if (!ctype_digit($id)) {
            echo json_encode(['error' => 'invalid id']);
            exit();
        }

        try {
            $number = $this->randomService->getInteger($id);
        } catch (\Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
            exit();
        }

        echo json_encode(['number' => $number]);
    }
}