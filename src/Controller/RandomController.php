<?php

namespace App\Controller;

use App\Kernel\Controller\Controller;
use App\service\RandomService;

class RandomController extends Controller
{
    private RandomService $randomService;

    public function __construct()
    {
        $this->randomService = new RandomService();
    }

    public function random()
    {
        $id =  $this->request()->input('id');
        echo json_encode(['id' => $id]);
    }

    public function get()
    {

    }
}