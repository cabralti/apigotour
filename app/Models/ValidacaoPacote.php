<?php

namespace App\Models;

/**
 * Class ValidaoPacote
 *
 * Responsável por armazenar as constantes de validação da aplicação
 *
 * @package App\Models
 */
class ValidacaoPacote
{
    /**
     * Todas as regras de validação com suas respectivas mensagens
     */
    public const MENSAGENS_DE_ERRO = [
        'required' => 'O campo :attribute é obrigatório',
        'numeric' => 'O valor do campo :attribute deve ser numérico',
        'data_format' => 'O formato da data deve ser no padrão americano Y-m-d',
        'max' => 'O :attribute deve ter no máximo :max caracteres'
    ];

    /**
     * Todos os campos que serão validados e como serão validados
     */
    public const REGRA_NOVO_PACOTE = [
        'nome' => 'required | max:80',
        'valor' => 'required | numeric',
        'dataInicio' => 'required | date_format:"Y-m-d"',
        'dataFim' => 'required | date_format:"Y-m-d"',
        'descricao' => 'required'
    ];
}