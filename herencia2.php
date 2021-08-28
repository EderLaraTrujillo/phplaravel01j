<?php

    /**
     * Herencia con Funciones mágicas de PHP
     */

    class Persona{
        # Atributos propios de la clase:
        protected $identificacion;
        protected $fecha_nace;

        # Constructor de la clase:
        public function __construct($nombrefull, $identificacion, $fecha_nace, $genero, $estado){
            # Asignacion de valores en la construccion del objeto:
            $this -> nombrecompleto = $nombrefull;
            $this -> numeroid = $identificacion;
            $this -> cumpleanios = $fecha_nace;
            $this -> genero = $genero;
            $this -> estado = $estado;
        }

        # Funcion para traer el objeto con sus atributos:
        public function __toString(){
           return $this-> nombrecompleto.' '. $this -> numeroid.' '.$this -> genero.' '. $this -> estado.'<br>'; # estado = 1:
        }
    }
    # Ejemplo de como se imprime un objeto desde la clase usando __toString():
    $persona = new Persona('Eder Lara Trujillo', 14399999, '1982-03-30', 'Masculino', true);
    print $persona;

    # Clase hija de persona: Empleado extends Persona:
    class Empleado extends Persona{
        # Atributos de la clase:
        protected $cargo;
        protected $salario;
        # Constructor de la clase:
        public function __construct($nombrefull, $identificacion, $fecha_nace, $genero, $estado, $cargo, $salario){
            # Implementamos el constructor de la clase madre:
            parent::__construct($nombrefull, $identificacion, $fecha_nace, $genero, $estado);
            # Asignamos los valores a los atributos de la clase:
            $this -> cargo = $cargo;
            $this -> salario = $salario;
        }

        # Funcion de impresion de objeto:
        public function __toString(){
            return parent::__toString().' '. $this->cargo .' $'. number_format($this->salario).'<br>';
        }
    }
    print '<br>';
    print ' ######### Impresión de objetos desde la clase hija, llamando a la clase madre #########';
    print '<br>';
    $empleado = new Empleado('Tania Rodriguez', 28899222, '1985-06-30', 'Femenino', true, 'Ingeniera de Datos', 4000000);
    print $empleado;

    # Clase hija de Empleado:
    final class Nomina extends Empleado{
        # Atributos propios de la clase:

        # Constructor de la clase:
        public function  __construct($nombrefull, $identificacion, $fecha_nace, $genero, $estado, $cargo, $salario, $horas_trabajadas, $horas_extras){
            # Implementamos constructor de la mamá:
            parent::__construct($nombrefull, $identificacion, $fecha_nace, $genero, $estado, $cargo, $salario);
            # Asignamos valores a los atributos propios:
            $this -> horas_mes = $horas_trabajadas;
            $this -> horas_extras = $horas_extras;
        }

        # Funciones propias de la clase:
        private function descuentos(){
            # Calcular el descuento de nomina:
            $s_social = ((($this->salario / 240) * $this -> horas_mes) + (($this->salario / 240) * ($this -> horas_extras * 0.25))) * 0.08;
            return $s_social;
        }

        private function netoPagar(){
            $base = (($this->salario / 240) * $this -> horas_mes) + (($this->salario / 240) * ($this -> horas_extras * 0.25));
            $descuento = $this -> descuentos();
            $neto = $base - $descuento;
            return number_format($neto);
        }

        # Impresión de objeto de la clase:
        public function __toString(){
            return parent::__toString().'Salario Neto: $'.$this-> netoPagar().'<br>Descuentos de Seguridad social: $'.number_format($this->descuentos());
        }
    }

    print '<br>';
    print '###### Nomina Agosto ######';
    print '<br>';
    # Creamos los objetos de la clase Nomina:
    $pagoagosto1 = new Nomina('Helen Lara Rodriguez', 1106983345, '2000-12-10', 'Femenino', true, 'Ingeniera de Devops', 6000000, 100, 20);
    $pagoagosto2 = new Nomina('TaniaRodriguez', 28899222, '1985-06-30', 'Femenino', true, 'Ingeniera de Datos', 4000000, 240, 20);
    
    print $pagoagosto1;
    print '<br>';
    print $pagoagosto2;
?>