<?php

namespace Models;

class Medico{
     //PROPIEDADES
    protected static array $errores = [];

     //CONSTRUCTOR
    public function __construct(
        private int|null $id,
        private string $nombre,
        private string $apellidos,
        private string $telefono,
        private string $especialidad,
    )
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->especialidad = $especialidad;
    }

    //SETTERS
    public function setId(int|null $id): void
    {
        $this->id = $id;
    }
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setApellido(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }
    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }
    public function setEspecialidad(string $especialidad): void
    {
        $this->especialidad = $especialidad;
    }
    //GETTERS
    public function getId(): int|null
    {
        return $this->id;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getApellidos(): string
    {
        return $this->apellidos;
    }
    public function getTelefono(): string
    {
        return $this->telefono;
    }
    public function getEspecialidad(): string
    {
        return $this->especialidad;
    }

    //METODOS
    /**
     * Obtiene una lista de errores.
    *
    * @return array Lista de errores.
    */
    public static function getErrores(): array
    {
        return self::$errores;
    }

    /**
     * Obtiene una lista de campos con errores.
    *
    * @return array Lista de campos con errores.
    */
    public static function getErroresCampos(): array 
    {
        return array_keys(self::$errores);
    }

    /**
     * Establece los errores en el sistema.
    *
    * @param array $errores Lista de errores a establecer.
    * @return void
    */
    public static function SetErrores(array $errores): void
    {
        self::$errores = $errores;
    }

    /**
     * Valida la información del medico.
     *  
     * @return bool Devuelve true si la validación es exitosa, de lo contrario false.
     */
    public function ValidateMedico(): bool
    {
        self::$errores = [];
        //Validacion campo nombre
        if(empty($this->nombre))
        {
            self::$errores[] = 'El nombre es obligatorio';
        }
        else
        {
            $patron = '/^[a-zA-Z, ]*$/';
            if(!preg_match($patron,$this->nombre))
            {
                self::$errores[] = 'El nombre no es valido'; 
            }
        }
        //Validacion campo apellido
        if(empty($this->apellidos))
        {
            self::$errores[] = 'El apellidos es obligatorio';
        }
        else
        {
            $patron = '/^[a-zA-Z, ]*$/';
            if(!preg_match($patron,$this->apellidos))
            {
                self::$errores[] = 'El apellidos no es valido';
            }
        }
        
        //Validacion campo telefono
        if(empty($this->telefono))
        {
            self::$errores[] = 'El telefono es obligatorio';
        }
        else
        {
            $patron = '/^[0-9]*$/';
            if(!preg_match($patron,$this->telefono))
            {
                self::$errores[] = 'El telefono no es valido';
            }
        }

        //Validacion campo especialidad
        if(empty($this->especialidad))
        {
            self::$errores[] = 'La especialidad es obligatoria';
        }
        else
        {
            $patron = '/^[a-zA-Z, ]*$/';
            if(!preg_match($patron,$this->especialidad))
            {
                self::$errores[] = 'La especialidad no es valido';
            }
        }

        return self::$errores ? false : true;
    }

    /**
     * Sanea los datos del medico.
     *
     * Este método se encarga de limpiar y validar los datos del medico
     * para asegurar que no contengan caracteres o valores no deseados.
     *
     * @return void
     */
    public function sanitate(): void
    {
        $this->nombre = filter_var($this->nombre, FILTER_SANITIZE_STRING);
        $this->apellidos = filter_var($this->apellidos, FILTER_SANITIZE_STRING);
        $this->telefono = filter_var($this->telefono, FILTER_SANITIZE_NUMBER_INT);
        $this->especialidad = filter_var($this->especialidad, FILTER_SANITIZE_STRING);
    }
    
    /**
     * Crea una instancia de Medico a partir de un array de datos.
     *
     * @param array $data Los datos para crear la instancia de Medico.
     * @return Medico La instancia de Medico creada.
     */
    public static function fromArray(array $data): Medico
    {
        return new Medico(
            id: $data['id'] ?? null,
            nombre: $data['nombre'] ?? '',
            apellidos: $data['apellidos'] ?? '',
            telefono: $data['telefono'] ?? '',
            especialidad: $data['especialidad'] ?? ''
        );
    }
}