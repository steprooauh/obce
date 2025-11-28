<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\Obce;
use App\Models\Okres;
use App\Models\Kraj;
use App\Config\ConfigPage;

class Main extends BaseController
{
    var $obce;
    var $okresM;
    var $kraj;
    var $config;
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->obce = new Obce();
        $this->okresM = new Okres();
        $this->kraj = new Kraj();
        $this->config = new ConfigPage();
    }

    public function index(){
        $okresyData = $this->okresM->where('kraj', 141)->findAll();
        $data = [
            "okresyData" => $okresyData
        ];
        echo view('hlavni', $data);
    }

    public function okres($id){
        $okresyData = $this->okresM->where('kraj', 141)->findAll();
        $obceData = $this->obce->where('okres', $id)->orderBy('nazev', 'asc')->paginate($this->config->stranek1);
        $pager = $this->obce->pager;
        $data = [
            "okresyData" => $okresyData,
            "obceData" => $obceData,
            "pager" => $pager
        ];
        echo view('okres', $data);
    }
}
