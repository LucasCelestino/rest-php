<?php

namespace Repository;

use DB\MySQL;
use InvalidArgumentException;
use Util\ConstantesGenericasUtil;

class TokensAutorizadosRepository
{
    private object $mySQL;
    private const TABLE = 'tokens_autorizados';

    public function __construct()
    {
        $this->mySQL = new MySQL();
    }

    public function validateToken($token)
    {
        $token = str_replace([' ', 'Bearer'], '', $token);
        
        if($token)
        {
            $consultaToken = 'SELECT id FROM '.self::TABLE.' WHERE token = :token AND status = :status';

            $stmt = $this->mySQL->getDb()->prepare($consultaToken);
            $stmt->bindValue(':token', $token);
            $stmt->bindValue(':status', 'Y');
            $stmt->execute();

            if($stmt->rowCount() != 1)
            {
                header('HTTP/1.1 401 Unauthorized');
                throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERROR_TOKEN_NOT_AUTORIZED);
            }
            
            echo 'token autorizado';
        }
        else
        {
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERROR_TOKEN_EMPTY);
        }
    }

    public function getMySql(): object
    {
        return $this->mySQL;
    }
}