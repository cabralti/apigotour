<?php

namespace App\Http\Controllers;

use App\Models\Pacote;
use App\Services\PacoteService;
use Illuminate\Http\Request;

/**
 * Class PacoteController
 * @package App\Http\Controllers
 */
class PacoteController extends Controller
{
    /**
     * @var PacoteService
     */
    private $pacoteService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PacoteService $pacoteService)
    {
        /** @var Pacote pacoteService */
        $this->pacoteService = $pacoteService;
    }

    public function index()
    {
        return view('home.index');
    }

    /**
     * @return array|mixed
     */
    public function buscarTodosPacotes()
    {
        //        Acesando diretamente a model
        //        $pacotes = new Pacote();
        //        return $pacotes->all();

        return $this->pacoteService->buscarTodosPacotes();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function buscarPacote($id)
    {
        return $this->pacoteService->buscarPacote($id);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function buscarDetalhesPacote(int $id)
    {
        return $this->pacoteService->buscarDetalhesPacote($id);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function criarPacote(Request $request)
    {
        return $this->pacoteService->criarPacote($request);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function editarPacote(Request $request, int $id)
    {
        return $this->pacoteService->editarPacote($request, $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function excluirPacote(int $id)
    {
        return $this->pacoteService->excluirPacote($id);
    }
}