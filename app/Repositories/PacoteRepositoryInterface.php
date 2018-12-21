<?php

namespace App\Repositories;

use Illuminate\Http\Request;

/**
 * Interface PacoteRepositoryInterface
 * @package App\Repositories
 */
interface PacoteRepositoryInterface
{
    /**
     * @return mixed
     */
    public function buscarTodosPacotes();

    /**
     * @param int $id
     * @return mixed
     */
    public function buscarPacote(int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function buscarDetalhesPacote(int $id);

    /**
     * @param Request $request
     * @return mixed
     */
    public function criarPacote(Request $request);

    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function editarPacote(Request $request, int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function excluirPacote(int $id);
}