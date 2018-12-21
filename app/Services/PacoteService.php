<?php

namespace App\Services;

use App\Models\Pacote;
use App\Models\ValidacaoPacote;
use App\Repositories\PacoteRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

/**
 * Class PacoteService
 * @package App\Services
 */
class PacoteService
{

    /**
     * @var PacoteRepositoryInterface
     */
    private $pacoteRepository;

    /**
     * PacoteService constructor.
     * @param PacoteRepositoryInterface $pacoteRepository
     */
    public function __construct(PacoteRepositoryInterface $pacoteRepository)
    {
        /** @var PacoteRepositoryInterface pacoteRepository */
        $this->pacoteRepository = $pacoteRepository;
    }


    /**
     * @return array|mixed
     */
    public function buscarTodosPacotes()
    {
        try {
            $pacotes = $this->pacoteRepository->buscarTodosPacotes();

            if (count($pacotes) > 0) {
//                return $pacotes;
                return response()->json($pacotes, Response::HTTP_OK);
            } else {
//                return array();
                return response()->json([], Response::HTTP_OK);
            }

        } catch (QueryException $e) {
            return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function buscarPacote($id)
    {
        try {
            $pacote = $this->pacoteRepository->buscarPacote($id);

            if (count($pacote) > 0) {
//                return $this->pacoteRepository->buscarPacote($id);
                return response()->json($pacote, Response::HTTP_OK);
            } else {
                return response()->json(null, Response::HTTP_NOT_FOUND);
            }
        } catch (QueryException $e) {
            return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function buscarDetalhesPacote(int $id)
    {
        /** @var Pacote $pacote */
        $pacote = $this->pacoteRepository->buscarDetalhesPacote($id);

        if (is_null($pacote)) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        } else {
            return response()->json(
                [
                    'id' => $pacote->id,
                    'descricao' => $pacote->descricao,
                    'urlImagem' => $pacote->urlImagem,
                    'site' => $pacote->site,
                    'telefone' => $pacote->telefone,
                    'pacote' => [
                        'id' => $pacote->id,
                        'dataInicio' => $pacote->dataInicio,
                        'dataFim' => $pacote->dataFim,
                        'valor' => $pacote->valor,
                    ],
                ],
                Response::HTTP_OK
            );
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function criarPacote(Request $request)
    {
        /** @var Validator $validacao */
        $validacao = Validator::make(
            $request->all(),
            ValidacaoPacote::REGRA_NOVO_PACOTE,
            ValidacaoPacote::MENSAGENS_DE_ERRO
        );

        if ($validacao->fails()) {
            return response()->json($validacao->errors(), Response::HTTP_BAD_REQUEST);
        } else {
            try {
//            return $this->pacoteRepository->criarPacote($request);
                $pacote = $this->pacoteRepository->criarPacote($request);
                return response()->json($pacote, Response::HTTP_CREATED);
            } catch (QueryException $e) {
                return response()->json(['erro' => 'Erro de conexão com o banco'],
                    Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function editarPacote(Request $request, $id)
    {
        try {
//            return $this->pacoteRepository->editarPacote($request, $id);
            $pacote = $this->pacoteRepository->editarPacote($request, $id);
            return response()->json($pacote, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function excluirPacote($id)
    {
        try {
//            return $this->pacoteRepository->excluirPacote($id);
            $pacote = $this->pacoteRepository->excluirPacote($id);
            return response()->json($pacote, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}