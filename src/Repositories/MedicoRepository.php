<?php
namespace Repositories;
use Models\Medico;
use PDOException;
use PDO;

use Lib\DataBase;

class MedicoRepository{
    private DataBase $db;

    public function __construct()
    {
        $this->db = new DataBase;
    }

    public function ListMedicos(): array
    {
        try{
            $sql = $this->db->prepare('SELECT * FROM medicos');
            $sql->execute();
            $medicos = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $medicos;
        }
        catch(\Exception $e){
            error_log("Error al mostrar los productos:" . $e->getMessage());
            return [];
        }
    }
}