<?php


namespace Lbm\Mvc\Controllers;

use Lbm\Mvc\Response;
use Lbm\Mvc\Request;
use Lbm\Mvc\HtmlTemplateView;
use \Lbm\Mvc\Models;
use Lbm\Mvc\Controller as Controller;
use \Lbm\Mvc;


class InstrumentController implements Controller
{
    
    protected $db;
    private $model;
    
    public function __construct()
    {
        $this->db = Mvc\Db::getInstance();
        $this->model = new Models\Instrument($this->db);
        
    }

    public function index(Request $request, Response $response)
    {
        $view = new HtmlTemplateView('Instrument');
        
        $instruments = $this->model->getAllInstruments();
        $amount_of_instruments = $this->model->getAmountOfInstruments();
        
        $view->assign('instruments', $instruments);
        $view->assign('amount_of_instruments', $amount_of_instruments);
        
        $view->render($request, $response);
    }
    
    
    
   public function deleteInstrument(Request $request, Response $response, $instrumentId)
    {
        if (isset($instrumentId)) {
            $this->model->deleteInstrument($instrumentId);
        }

        $response->redirect('instrument/index');
    }

}
