<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Herencia en PHP</title>
<?php
    # ¿Qué es Herencia?
    #   - Son todos los comportamientos y atributos que mantienen los hijos propios de los padres
    #     Class Padre -> Class Hija
    # ¿Qué es encapsulamiento
    #   - Es una medida de protección de datos
    # ¿Qué es Polimorfismo
    #   - Sobrecarga de métodos.
    # ¿Qué es abstracción?
    #   - Tomar el atributo relevante para la regla de negocio

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
    
    # Clases hijas de la clase persona:
    class Estudiante extends Persona {
        private $curso;
        # El constructor de la clase:
        public function __construct($nombre, $apellido, $genero, $id, $numMatricula){
            # Implemente el constructor de la clase Persona:
            parent::__construct($nombre, $apellido, $genero, $id);
            $this -> matricula = $numMatricula; 
        }
        # Funciones propias de la clase Estudiante:
        public function setCurso($curso_matriculado){
            return $this -> $curso = $curso_matriculado;
        }
    }

    print '<h4>Herencia en PHP POO:</h4>';
    # Objetos:
    $student = new Estudiante("Andrea", "Rios Perez", "Femenino", 1006234543, 986);
    # Datos de la clase persona que es estudiante:
    print $student -> getPersona();
    
    # Clase Padre - Hijo - Nieto:

    # Clase madre modela el telefono original:
    class Telefono {
        # Atributos propios del telefono:
        public $marca;
        public $modelo;
        protected $cable = true;
        protected $comunicacion;

        public function __construct($marca, $modelo){
            # Asignación de valores a los atributos:
            $this -> marca = $marca;
            $this -> modelo = $modelo;
            $this -> comunicacion = ($this -> cable ) ? 'Alambrica' : 'Inalambrica';
        }

        # Funciones de un teléfono:
        public function llamar(){
            $retorno ='<em>Rinnnng Rinnnnng!!!</em>';
            return $retorno;
        }

        public function masInfo(){
            $info = '
                    <ul>
                        <li>Marca: '.$this -> marca.'</li>
                        <li>Modelo: '.$this -> modelo.'</li>
                        <li>Comunicacion: '.$this -> comunicacion.'</li>
                    </ul>';
            return $info; 
        }

    }

    class Celular extends Telefono {
        # Atributos propios de celular:
        protected $cable = false;

        # Constructor de la clase:
        public function __construct($marca, $modelo){
            parent::__construct($marca, $modelo);
        }
    }

    class SmartPhone extends Celular {
        protected $cable = false;
        public $internet = true;
        
        # Constructor
        public function __construct($marca, $modelo){
            parent::__construct($marca, $modelo);
        }

        # Métodos propios de la clase:
        public function masInfo(){
            $info = '
                    <ul>
                        <li>Marca: '.$this -> marca.'</li>
                        <li>Modelo: '.$this -> modelo.'</li>
                        <li>Comunicacion: '.$this -> comunicacion.'</li>
                        <li>Dispositivo con acceso a internet</li>
                    </ul>';
            return $info; 
        }
    }
    print('<br>');
    print('#####  Telefono  ####');
    # Creamos los objetos de cada una de las clases:
    $oGB = new Telefono("Panasonic", "XT 045");
    # Hagamos los llamados a las acciones:
    print $oGB -> llamar();
    print('<br>');
    print $oGB -> masInfo();
    print('<br>');
    print('#### Celular ####');
    $oCL = new Celular("Nokia", "1100");
    print('<br>');
    print $oCL -> llamar();
    print('<br>');
    print $oCL -> masInfo();
    print('<br>');
    print('#### SmartPhone ####');
    $oBB = new SmartPhone("Samsumg","J5");
    print('<br>');
    print $oBB -> llamar();
    print('<br>');
    print $oBB -> masInfo();

    print('<br>');

    # Funciones propias de la clase:
    function descuentos(){
        # Calcular el descuento de nomina:
        $s_social = ((4000000 / 240) * 240) * 0.04 ;
        return $s_social;
    }

print descuentos();

?>
