<?php

namespace Repository;

class TokensAutorizadosRepository
{
    private object $mySQL;
    private const TABLE = 'tokens_autorizados';

    public function __construct()
    {
        
    }

    public function validateToken(string $token)
    {

    }

    public function getMySql(): object
    {
        return $this->mySQL;
    }
}