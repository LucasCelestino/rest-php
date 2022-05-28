<?php

namespace Util;

abstract class ConstantesGenericasUtil
{
    /* REQUESTS */
    public const TYPE_REQUEST = ['GET', 'POST', 'DELETE', 'PUT'];
    public const TYPE_GET = ['USUARIOS'];
    public const TYPE_POST = ['USUARIOS'];
    public const TYPE_DELETE = ['USUARIOS'];
    public const TYPE_PUT = ['USUARIOS'];

    /* ERROS */
    public const MSG_ERROR_TYPE_ROUTE = 'Rota não permitida!';
    public const MSG_ERROR_RESOURCERS_NONEXISTENT = 'Recurso inexistente!';
    public const MSG_ERROR_GENERIC = 'Algum erro ocorreu na requisição!';
    public const MSG_ERROR_NO_RETURN = 'Nenhum registro encontrado!';
    public const MSG_ERROR_NO_AFFECTED = 'Nenhum registro afetado!';
    public const MSG_ERROR_TOKEN_EMPTY = 'É necessário informar um Token!';
    public const MSG_ERROR_TOKEN_NOT_AUTORIZED = 'Token não autorizado!';
    public const MSG_ERROR_JSON_EMPTY = 'O Corpo da requisição não pode ser vazio!';

    /* SUCESSO */
    public const MSG_DELETED_SUCCESS = 'Registro deletado com Sucesso!';
    public const MSG_UPDATED_SUCCESS = 'Registro atualizado com Sucesso!';

    /* RECURSO USUARIOS */
    public const MSG_ERROR_ID_REQUIRED = 'ID é obrigatório!';
    public const MSG_ERROR_LOGIN_EXIST = 'Login já existente!';
    public const MSG_ERROR_LOGIN_PASSWORD_REQUIRED = 'Login e Senha são obrigatórios!';

    /* RETORNO JSON */
    const TYPE_SUCCESS = 'sucesso';
    const TYPE_ERROR = 'erro';

    /* OUTRAS */
    public const YES = 'S';
    public const TYPE = 'tipo';
    public const RESPONSE = 'resposta';
}