<?php

namespace DB;

use InvalidArgumentException;
use PDO;
use PDOException;
use Util\ConstantesGenericasUtil;

class MySQL
{
    private object $db;

    /**
     * MySQL constructor.
     */
    public function __construct()
    {
        $this->db = $this->setDB();
    }

    /**
     * @return PDO
     */
    public function setDB()
    {
        try {
            return new PDO(
                'mysql:host=' . HOST . '; dbname=' . DATABASE . ';', USER, PASSWORD
            );
        } catch (PDOException $exception) {
            throw new PDOException($exception->getMessage());
        }
    }

    /**
     * @param $tabela
     * @param $id
     * @return string
     */
    public function delete($tabela, $id)
    {
        $consultaDelete = 'DELETE FROM ' . $tabela . ' WHERE id = :id';
        if ($tabela && $id) {
            $this->db->beginTransaction();
            $stmt = $this->db->prepare($consultaDelete);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $this->db->commit();
                return ConstantesGenericasUtil::MSG_DELETED_SUCCESS;
            }
            $this->db->rollBack();
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERROR_NO_RETURN);
        }
        throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERROR_GENERIC);
    }

    /**
     * @param $tabela
     * @return array
     */
    public function getAll($tabela)
    {
        if ($tabela) {
            $consulta = 'SELECT * FROM ' . $tabela;
            $stmt = $this->db->query($consulta);
            $registros = $stmt->fetchAll($this->db::FETCH_ASSOC);
            if (is_array($registros) && count($registros) > 0) {
                return $registros;
            }
        }
        throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERROR_NO_RETURN);
    }

    /**
     * @param $tabela
     * @param $id
     * @return mixed
     */
    public function getOneByKey($tabela, $id)
    {
        if ($tabela && $id) {
            $consulta = 'SELECT * FROM ' . $tabela . ' WHERE id = :id';
            $stmt = $this->db->prepare($consulta);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $totalRegistros = $stmt->rowCount();
            if ($totalRegistros === 1) {
                return $stmt->fetch($this->db::FETCH_ASSOC);
            }
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERROR_NO_RETURN);
        }

        throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERROR_ID_REQUIRED);
    }

    /**
     * @return object|PDO
     */
    public function getDb(): PDO
    {
        return $this->db;
    }
}