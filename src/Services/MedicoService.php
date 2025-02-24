<?php
namespace Services;
use Repositories\MedicoRepository;

class MedicoService{
    //PROPIEDADES
    private MedicoRepository $medicoRepository;

    //CONSTRUCTOR
    public function __construct()
    {
        $this->medicoRepository = new MedicoRepository();
    }

    public function ListMedicos() : array
    {
        return $this->medicoRepository->ListMedicos();
    }
}