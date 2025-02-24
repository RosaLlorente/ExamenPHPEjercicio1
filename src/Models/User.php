<?php
namespace Models;

class User{
    //PROPIEDADES
    protected static array $errores = [];

    //CONSTRUCTOR
    public function __construct(
        private int|null $id,
        private string $nombre,
        private string $apellido,
        private int $telefono,
        private string $dni,
        private string $compania,
        private string $email,
        private string $password,
        private string $role = 'user',
    ){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->dni = $dni;
        $this->compania = $compania;
        $this->email = $email;
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
    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }
    public function setTelefono(int $telefono): void
    {
        $this->telefono = $telefono;
    }
    public function setDni(string $dni): void
    {
        $this->dni = $dni;
    }
    public function setCompania(string $compania): void
    {
        $this->compania = $compania;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function setRole(string $role): void
    {
        $this->role = $role;
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
    public function getApellido(): string
    {
        return $this->apellido;
    }
    public function getTelefono(): int
    {
        return $this->telefono;
    }
    public function getDni(): string
    {
        return $this->dni;
    }
    public function getCompania(): string
    {
        return $this->compania;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getRole(): string
    {
        return $this->role;
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
     * Valida la información del usuario.
     *
     * @return bool Devuelve true si la validación es exitosa, de lo contrario false.
     */
    public function ValidateRegister(): bool
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
        if(empty($this->apellido))
        {
            self::$errores[] = 'El apellido es obligatorio';
        }
        else
        {
            $patron = '/^[a-zA-Z, ]*$/';
            if(!preg_match($patron,$this->apellido))
            {
                self::$errores[] = 'El apellido no es valido';
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

        // Validacion campo dni
        if(empty($this->dni))
        {
            self::$errores[] = 'El dni es obligatorio';
        }
        else
        {
            $patron = '/[A-Za-z0-9]{8}/';
            if(!preg_match($patron,$this->dni))
            {
                self::$errores[] = 'El dni no es valido';
            }
        }

        // Validacion campo compania
        $patron = '/^[a-zA-Z, ]*$/';
        if(!preg_match($patron,$this->compania))
        {
            self::$errores[] = 'La compañia no es valido';
        }

        //Validacion campo email
        if(empty($this->email))
        {
            self::$errores[] = 'El email es obligatorio';
        }
        else
        {
            $patron = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/';
            if(!preg_match($patron,$this->email))
            {
                self::$errores[] = 'El email no es valido';  
            }
        }

        //Validacion campo password(minimo 8 caracteres, una mayuscula, una minuscula y un numero)
        if(empty($this->password))
        {
            self::$errores[] = 'La contraseña es obligatoria';
        }
        else
        {
            $patron = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
            if(!preg_match($patron,$this->password))
            {
                self::$errores[] = 'La contraseña no es valida';     
            }
        }

        //Validacion campo rol
        if(empty($this->role))
        {
            self::$errores[] = 'El rol es obligatorio';
        }
        else
        {
            $patron = '/^(admin|user)$/';
            if(!preg_match($patron,$this->role))
            {
                self::$errores[] = 'El rol no es valido';     
            }
        }
        return self::$errores ? false : true;
    }
    
    /**
     * Valida los datos de inicio de sesión del usuario.
     *
     * @return bool Devuelve true si los datos de inicio de sesión son válidos, de lo contrario, devuelve false.
     *
     */
    public function ValidateLogin(): bool
    {
        self::$errores = [];

        //Validacion campo email
        if(empty($this->email))
        {
            self::$errores[] = 'El email es obligatorio';
        }
        else
        {
            $patron = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/';
            if(!preg_match($patron,$this->email))
            {
                self::$errores[] = 'El email no es valido';  
            }
        }

        //Validacion campo password(minimo 8 caracteres, una mayuscula, una minuscula y un numero)
        if(empty($this->password))
        {
            self::$errores[] = 'La contraseña es obligatoria';
        }
        else
        {
            $patron = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
            if(!preg_match($patron,$this->password))
            {
                self::$errores[] = 'La contraseña no es valida';     
            }
        }

        return self::$errores ? false : true;
    }

    /**
     * Sanea los datos del usuario.
     *
     * Este método se encarga de limpiar y validar los datos del usuario
     * para asegurar que no contengan caracteres o valores no deseados.
     *
     * @return void
     */
    public function sanitate(): void
    {
        $this->nombre = filter_var($this->nombre, FILTER_SANITIZE_STRING);
        $this->apellido = filter_var($this->apellido, FILTER_SANITIZE_STRING);
        $this->telefono = filter_var($this->telefono, FILTER_SANITIZE_NUMBER_INT);
        $this->dni = filter_var($this->dni, FILTER_SANITIZE_STRING);
        $this->compania = filter_var($this->compania, FILTER_SANITIZE_STRING);
        $this->email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
        $this->password = filter_var($this->password, FILTER_SANITIZE_STRING);
        $this->role = filter_var($this->role, FILTER_SANITIZE_STRING);
    }
    
    /**
     * Crea una instancia de User a partir de un array de datos.
     *
     * @param array $data Los datos para crear la instancia de User.
     * @return User La instancia de User creada.
     */
    public static function fromArray(array $data): User
    {
        return new User(
            id: $data['id'] ?? null,
            nombre: $data['nombre'] ?? '',
            telefono: (int)($data['telefono'] ?? 0),
            dni: $data['dni'] ?? '',
            compania: $data['compania'] ?? '',
            apellido: $data['apellido'] ?? '',
            email: $data['email'],
            password: $data['password'],
            role: $data['role'] ?? 'user'
        );
    }

}