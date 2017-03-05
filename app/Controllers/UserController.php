<?php

namespace Lbm\Mvc\Controllers;

use Lbm\Mvc\Core\Db;
use Lbm\Mvc\Core\Registry;
use Lbm\Mvc\Core\Response;
use Lbm\Mvc\Core\Request;
use Lbm\Mvc\Core\HtmlTemplateView;
use \Lbm\Mvc\Models;


class UserController implements Controller
{

    protected $db;
    public $instruments = null;
    public $depot = null;
    protected $depotId = null;
    protected $userId;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->users = new Models\User($this->db);

        $this->instruments = new Models\Instrument($this->db);
        $this->depot = new Models\Depot($this->db);

        $reg = Registry::getInstance();
        $request = $reg->getRequest();
        if ($auth = $request->getAuthData()) {
            $userId = $this->users->getUserbyLogin($auth['user']);
            $this->userId = (integer) $userId->id;
            if ($depot = $this->depot->getDepotId($this->userId)) {
                $this->depotId = $depot->id;
            }
        }
    }

    /**
     * function index
     * 
     * @param Request $request
     * @param Response $response
     */
    public function index(Request $request, Response $response)
    {
        $view = new HtmlTemplateView('User');

        $instruments = $this->instruments->getAllInstruments();
        $amount_of_instruments = $this->instruments->getAmountOfInstruments();
        $depot = $this->depot->getAllInstruments($this->depotId);

        $view->assign('instruments', $instruments);
        $view->assign('amount_of_instruments', $amount_of_instruments);
        $view->assign('depot', $depot);
        $view->render($request, $response);
    }

    /**
     * function editInstrument
     * 
     * @param Request $request
     * @param Response $response
     * @param type $instrument_id
     */
    public function editInstrument(Request $request, Response $response, $instrument_id)
    {
        if (isset($instrument_id)) {
            $instrument = $this->depot->getInstrument($instrument_id);
            if (empty($instrument)) {
                $instrument = $this->instruments->getInstrument($instrument_id);
            }
            $view = new HtmlTemplateView('Depot_Edit');
            $view->assign('instrument', $instrument);
            $view->render($request, $response);
        } else {
            $response->redirect('admin/index');
        }
    }

    /**
     * function addInstrument
     * 
     * @param Request $request
     * @param Response $response
     */
    public function addInstrument(Request $request, Response $response)
    {
        $data = $request->getPost();
        if (null !== $data) {
            if (isset($data["submit_update_instrument"])) {
                $data['depot_id'] = $this->depotId;
                $this->depot->addtoDepot($data);
            }

            $response->redirect('user/index');
        }
    }

    /**
     * function updateInstrument
     * 
     * @param Request $request
     * @param Response $response
     */
    public function updateInstrument(Request $request, Response $response)
    {
        $data = $request->getPost();
        if (null !== $data) {
            if (isset($data["submit_update_instrument"])) {
                $data['depot_id'] = $this->depotId;
                $this->depot->updateInstrument($data);
            }
            $response->redirect('user/index');
        }
    }

    /**
     * function deleteInstrument
     * 
     * @param Request $request
     * @param Response $response
     * @param type $instrument_id
     */
    public function deleteInstrument(Request $request, Response $response, $instrument_id)
    {
        if (isset($instrument_id)) {
            $this->depot->deleteInstrument($instrument_id, $this->depotId);
        }

        $response->redirect('user/index');
    }

}
