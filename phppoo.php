<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">  <!-- Etiqueta para tildes y acentos -->
<title>Programación POO en PHP</title>                              <!-- Etiqueta del titulo -->
<?php
    # error_reporting(0);
    /**
     * Programación Orientada a Objetos PHP
     * Instructor: @EderLarat
     * 2021.
     * Temas a tratar en este apartado:
     * - Clases
     * - Objetos
     * - Métodos
     * - Constructores
     * ## Qué es una Clase:
     *      - Una clase es una plantilla que se utiliza para crear objetos que comparten un mismo comportamiento, estado e identidad.
     * ## Qué es un Objeto:
     *      - Es una entidad provista de métodos o mensajes a los cuales responde (comportamiento); atributos con valores concretos (estado); y propiedades (identidad).
     * ## Métodos:
     *      - Es el algoritmo asociado a un objeto que indica la capacidad de lo que éste puede hacer.
     * ## Constructores:
     *      - Es un método para asignar valores iniciales a los atributos de la clase
     * 
     * ## Estructura de la sintaxis de las clases y objetos:
     * - Una clase va precedida del término "class" ej: class Vehiculo {} se debe escribir en el formato PascalCase
     *   Los atributos de la clase se escriben de acuerdo a la particularidad del mismo: (público, staticos, privados, constantes) se encriben en snake_case
     * - Un objeto se apropia de los atributos de la clase. se pueden escribir en snake_case, kebab-case
     * - Métodos son funciones que hacen relacion a las actividades del objeto, se escriben en camelCase
    */
    print '<h3>Programación Orientada a Objetos PHP</h3>';
    # Creacion de una clase en php:
    class MiClase{
        # Atributos públicos, de fácil acceso desde fuera de la clase:
        public $nombre;
        public $estado;
        # Atributo Estatico:
        public static $precio = 140000;
        # Atributo Constante:
        const SALUDO = 'Hola soy constante de la clase MiClase';
        const SALTO = '<br>';
        # Atributos privados
        private $privado = 'Atributo Privado';

        # Métodos de la clase:
        public function miFuncion(){
            # Esta es un función que no necesita parárametros:
            $respuesta = 'Este es un valor retornado desde una función';
            return $respuesta;
        }
        # Método con parametros:
        public function funcionParam($clave){
            # Operaciones dentro de la función
            if($clave == 'clave'){
                $saludo = MiClase::SALUDO;
            }else {
                $saludo = 'Hola esa no era la clave, pero igualmente te saludo!';
            }
            # Retornamos el resultado del algoritmo:
            return $saludo;
        }
        # Método para acceder a los atributos privados:
        public function privateAcces(){
            return $this -> privado;
        }
    }
    # Objetos de la clase:
    $obj_clase = new MiClase;
    # Asignacion de valores al objeto:
    # Impresión de objetos en el front:
    print '<h4>Imprensión de atributos publicos de la clase:</h4>';
    print $obj_clase -> nombre = 'Mesa <br>';
    print $obj_clase -> estado = 'Disponible <br>';

    print '<h4>Impresión de atributos static de la clase:</h4>';
    print MiClase::$precio;

    print '<h4>Impresión de constantes clase:</h4>';
    print MiClase::SALUDO;
    
    # Acceder a los métodos de la clase:
    print '<h4>Acceder a los métodos de la clase:</h4>';
    print $obj_clase -> miFuncion();
    print MiClase::SALTO;
    print $obj_clase -> funcionParam('clave');
    print '<h5>Acceder al atributo privado de la clase:</h5>';
    print $obj_clase -> privateAcces();

    print MiClase::SALTO;
    # Clases con constructores:
    class Persona {
        # Atributos statics y privates:
        public static $especie = 'Hominidos';
        # Atributos Privados:
        private $identificacion;

        # Constructores 
        public function __construct($nombre, $apellido, $genero, $id){
            # Asociamos los valores a las varaibles o parametros de la clase:
            $this -> name = $nombre;
            $this -> lastname = $apellido;
            $this -> gender = $genero;
            # para modificar atributos privados :
            $this -> identificacion = number_format($id);
        }
        # Método para impresión de datos de la clase:
        public function getPersona(){
            $datos = 'Este es el objeto de persona con estos datos: '.$this->name.' '.$this->lastname.' '.$this->gender.' '.$this->identificacion;
            return $datos;
        }
    }
    print '<h4>Clases con contructores:</h4>';
    $new_person = new Persona('Eder','Lara Trujillo', 'Masculino','143999943');
    # $new_person = new Persona($_POST['correo'])
    print $new_person -> getPersona();
    
?>