<?php
namespace Controllers;

use Lib\Pages;
use Services\MedicoService;

class MedicosController{
    //PROPIEDADES
    private Pages $page;
    private MedicoService $medicoService;

    //CONSTRUCTOR
    function __construct(){
        $this->page = new Pages();
        $this->medicoService = new MedicoService();
    }

    //METODOS
    public function ListMedicos()
    {
        try{
            $medicos = $this->medicoService->ListMedicos();
            $this->page->render('Medicos/ListaMedicos',['medicos' => $medicos]);

        }
        catch(\Exception $e){
            error_log("Error al mostrar los medicos: " . $e->getMessage());
            $_SESSION['error'] = 'No se pudieron cargar los productos.';
            $this->page->render('Medicos/ListaMedicos');
        }   
    }
}