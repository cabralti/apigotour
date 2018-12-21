<?php

namespace App\Repositories;

use App\Models\Pacote;
use Illuminate\Http\Request;

/**
 * Class PacoteRepositoryEloquent
 * @package App\Repositories
 */
class PacoteRepositoryEloquent implements PacoteRepositoryInterface
{

    /**
     * @var Pacote
     */
    private $pacote;

    /**
     * PacoteRepositoryEloquent constructor.
     * @param Pacote $pacote
     */
    public function __construct(Pacote $pacote)
    {
        /** @var Pacote pacote */
        $this->pacote = $pacote;
    }

    /**
     * @return mixed
     */
    public function buscarTodosPacotes()
    {
        return $this->pacote
            ->select(
                'id',
                'nome',
                'valor',
                'dataInicio',
                'dataFim',
                'urlImagem'
            )->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function buscarPacote(int $id)
    {
        return $this->pacote
            ->select(
                'id',
                'nome',
                'valor',
                'dataInicio',
                'dataFim',
                'urlImagem'
            )
            ->where('id', $id)
            ->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function buscarDetalhesPacote(int $id)
    {
        return $this->pacote->find($id);
    }

    /**
     * @param Request $request
     * @return mixed|void
     */
    public function criarPacote(Request $request)
    {
        return $this->pacote->create($request->all());
    }

    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function editarPacote(Request $request, int $id)
    {
        return $this->pacote->where('id', $id)->update($request->all());
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function excluirPacote(int $id)
    {
//        $pacote = $this->pacote->find($id);
//        return $pacote->delete();
        return $this->pacote->where('id', $id)->delete();
    }

}