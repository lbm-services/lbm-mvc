<?php


namespace Lbm\Mvc\Controllers;

use \Lbm\Mvc\Core\Db;
use Lbm\Mvc\Core\Response;
use Lbm\Mvc\Core\Request;
use Lbm\Mvc\Core\HtmlTemplateView;
use \Lbm\Mvc\Models;

class InstrumentController implements Controller
{
    protected $db;
    private $model;

    public function __construct()
    {
        $this->db = Db::getInstance();
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
