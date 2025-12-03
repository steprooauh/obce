<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\Obce;
use App\Models\Okres;
use App\Models\Kraj;
use App\Config\ConfigPage;
use App\Models\AdresniMista;
use App\Models\CastObce;
use App\Models\Ulice;

class Main extends BaseController
{
    var $obce;
    var $okresM;
    var $kraj;
    var $config;
    var $adresniMista;
    var $ulice;
    var $castObce;
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->obce = new Obce();
        $this->okresM = new Okres();
        $this->kraj = new Kraj();
        $this->config = new ConfigPage();
        $this->adresniMista = new AdresniMista();
        $this->ulice = new Ulice();
        $this->castObce = new CastObce();
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
        $poradi = $this->adresniMista->where('ulice', $this->ulice->where('cast_obce', $this->castObce->where('obec', $this->obce->where('okres', $id))))->findAll();
        $pager = $this->obce->pager;
        $data = [
            "poradi" => $poradi,
            "okresyData" => $okresyData,
            "obceData" => $obceData,
            "pager" => $pager
        ];
        echo view('okres', $data);
    }
}
