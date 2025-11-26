<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\Obce;
use App\Models\Okres;
use App\Models\Kraj;

class Main extends BaseController
{
    var $obce;
    var $okres;
    var $kraj;
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->obce = new Obce();
        $this->okres = new Okres();
        $this->kraj = new Kraj();
    }

    public function index(){
        $okresyData = $this->okres->where('kraj', 141)->findAll();
        $data = [
            "okresyData" => $okresyData
        ];
        echo view('hlavni', $data);
    }
}
