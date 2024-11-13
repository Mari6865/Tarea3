Persona
<?php
//clase abstracta base persona

abstract class Persona{

    protected $nombre;
    protected $apellido1;
    protected $apellido2;

    protected $fechaNacimiento;
    protected $dni;
    protected $direccion;
    protected $telefono;
    protected $sexo;


 //contador statico para saber cuantos objetos se ha creado

 protected Static $contador=0;
  

//constructor para inicializar los atributos
public function __construct($nombre,$apellido1,$apellido2,$fechaNacimiento,$dni,$direccion,$telefono,$sexo)
{
    



    $this->nombre=$nombre;
    $this->apellido1=$apellido1;
    $this->apellido2=$apellido2;
    $this->fechaNacimiento=$fechaNacimiento;
    $this->dni=$dni;
    $this->direccion=$direccion;
    $this->telefono=$telefono;
    $this->sexo=$sexo;
    self::$contador++;

}

//metodo getter para obtener el numero de objetos creados

public static function numeroObjetosCreado(){

    return self ::$contador;
}
//metodo abstracto para generar un objeto aleatorio
abstract public  static function generarAlAzar();

//metodo abstracto que cada clase debe implementar

abstract public function trabajar();

//metodo para coventir el objeto a cadena

public function __toString()
{
 return "Nombre:".$this->nombre. $this->apellido1 .$this->apellido2 ."/n "."Dni:".$this->dni."/n "."FechaNaciniento:".$this->fechaNacimiento." /n"." sexo:".$this->sexo."/n";  
}

}

//Clase administrativos
  class Administrativos extends persona{

private $anosServicio;

public function __construct($nombre,$apellido1,$apellido2,$fechaNacimiento,$dni,$direccion,$telefono,$sexo,$anosServicio)
{
    

parent::__construct($nombre,$apellido1,$apellido2,$dni,$fechaNacimiento,$direccion,$telefono,$sexo);
 $this->$anosServicio=$anosServicio;

}
public static function generarAlAzar() {
    // Generación de datos aleatorios
    return new Administrativos("Juan", "Perez", "Gomez", "1980-05-15", "12345678A", "Calle Falsa 123", "123456789", "Hombre", rand(1, 30));
}

public function trabajar() {
    return "Soy un administrativo y estoy gestionando documentos.";

}
public function __toString(){
    return parent::__toString()."Años de servicio:".$this->anosServicio."/n";

}
}

//clase conserje
 class Conserje extends persona{

    private $anosServicio;
    public function _construct($nombre,$apellido1,$apellido2,$fechaNacimiento,$dni,$direccion,$telefono,$sexo,$anosServicio){
parent:: __construct($nombre,$apellido1,$apellido2,$fechaNacimiento,$dni,$direccion,$telefono,$sexo);
        $this->$anosServicio=$anosServicio;
    }
    
    public static function generarAlAzar() {
        return new Conserje("Carlos", "Lopez", "Diaz", "1975-09-10", "23456789B", "Calle Real 456", "234567890", "Hombre", rand(5, 40));
    }

    public function trabajar() {
        return "Soy un conserje y estoy asegurando la seguridad y el orden en el instituto.";
    }
    public function __toString() {
        return parent::__toString() . "Años de servicio:". $this->anosServicio."\n";


 }

}

//clase persona de limpieza

class PersonalLimpieza extends Persona {

    private $anosServicio;

    public function __construct($nombre,$apellido1,$apellido2,$fechaNacimiento,$dni,$direccion,$telefono,$sexo,$anosServicio){

        parent::__construct($nombre,$apellido1,$apellido2,$fechaNacimiento,$dni,$direccion,$telefono,$sexo);

        $this-> $anosServicio=$anosServicio;
    }
    public static function generarAlAzar() {
        return new PersonalLimpieza("Maria", "Fernandez", "Ruiz", "1990-11-22", "34567890C", "Calle del Sol 789", "345678901", "Mujer", rand(1, 20));
    }

    public function trabajar() {
        return "Soy una persona de limpieza y estoy limpiando el instituto.";
    }

    public function __toString() {
        return parent::__toString() . "Años de servicio:" .$this->anosServicio."\n";
    }
}
//clase profesorado
class Profesor extends Persona{
private $anosServicio;
private $materiasImparte;
private $cargoDirectivo;
const CARGO_NINGUNO="Ninguno";
const CARGO_DIRECCION="Direccion";
const CARGO_SECRETARIO="Secretario";
const CARGO_GEFATURA_ESTUDIOS="Jefatura de estudios";
const CARGO_VICEDIRECCION="Vicedireccion";

public function __construct($nombre,$apellido1,$apellido2,$fechaNacimiento,$dni,$direccion,$telefono,$sexo,$anosServicio,$materiasImparte,$cargoDirectivo){
parent::__construct($nombre,$apellido1,$apellido2,$fechaNacimiento,$dni,$direccion,$telefono,$sexo);

$this->anosServicio=$anosServicio;

$this->materiasImparte=$materiasImparte;
$this->cargoDirectivo=$cargoDirectivo;
    
}

public static function generarAlAzar() {

$cargos=[self::CARGO_NINGUNO,self::CARGO_DIRECCION,self::CARGO_SECRETARIO,self::CARGO_GEFATURA_ESTUDIOS,self::CARGO_VICEDIRECCION];
return new Profesor("Ana", "Garcia", "Martinez", "1985-04-20", "45678901D", "Avenida Libertad 101", "456789012", "Mujer", rand(5, 30), ["Matemáticas", "Física"], $cargos[array_rand($cargos)]);

}
public function trabajar(){
    return"Soy un profesor y estoy enseñando las materias:".implode($this->materiasImparte);
}
public function __toString()
{
   return parent::__toString()."Años de servicio:".$this->anosServicio."/n"."Materias".implode($this->materiasImparte) ."/n"."Cargo directivo:".$this->cargoDirectivo."/n";
}
}
//clase alumno

abstract class Alumno extends Persona{
protected $curso;
protected $grupo;

public function __construct($nombre,$apellido1,$apellido2,$fechaNacimiento,$dni,$direccion,$telefono,$sexo,$curso,$grupo){
 parent::__construct($nombre,$apellido1,$apellido2,$fechaNacimiento,$dni,$direccion,$telefono,$sexo);

 $this->curso=$curso;
 $this->grupo=$grupo;

}

public function __toString()
{
    return parent::__toString()."Curso:".$this->curso."/n"."Grupo:".$this->grupo."/n";
}
}

//clase AlumnoEso
class AlumnoEso extends Alumno{
public function _construct($nombre,$apellido1,$apellido2,$fechaNacimiento,$dni,$direccion,$telefono,$sexo,$curso,$grupo){
parent::__construct($nombre,$apellido1,$apellido2,$fechaNacimiento,$dni,$direccion,$telefono,$sexo,$curso,$grupo);
}
public  static function generarAlAzar(){

    return new AlumnoEso("Laura","Sánchez","Martin","2006-07-12","56789012E","Calle Mayor 202","Mujer",rand(1,4),"2","A");
}
public function trabajar(){

    return"Soy un estudiante de la ESO y estoy estudiando";
}
}
// Clase AlumnoBachillerato
class AlumnoBachillerato extends Alumno {
    public function __construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, $curso, $grupo) {
        parent::__construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, $curso, $grupo);
    }

    public static function generarAlAzar() {
        return new AlumnoBachillerato("Pedro", "González", "Lozano", "2004-03-20", "67890123F", "Calle Luna 303", "678901234", "Hombre", rand(1, 2), "B");
    }

    public function trabajar() {
        return "Soy un estudiante de Bachillerato y estoy estudiando.";
    }
}

//clase AlumnoFP
class AlumnoFP extends Alumno{

private $cicloFormativo;

public function _construct($nombre,$apellido1,$apellido2,$fechaNacimiento,$dni,$direccion,$telefono,$sexo,$grupo,$curso,$cicloFormativo){

parent::__construct($nombre,$apellido1,$apellido2,$fechaNacimiento,$dni,$direccion,$sexo,$grupo,$curso);

$this->cicloFormativo=$cicloFormativo;
}
public static function generarAlAzar(){

    return new AlumnoFP( "David", "Hernández", "Serrano", "2002-09-15", "78901234G", "Calle Sol 404", "789012345", "Hombre",  rand(1, 2),"3", "C","Desarrollo de Aplicaciones Web");
}

public function trabajar(){

    return "Soy un estudiante de Formación Profesional y estoy estudiando mi ciclo formativo.";
}
public  function  __toString(){

return parent::__toString()."CicloFormativo:".$this->cicloFormativo."/n";
}

}
// Función para generar 100 objetos aleatorios
$personas = [];
for ($i = 0; $i < 100; $i++) {
    $randClass = rand(1, 7);  // Genera un número aleatorio entre 1 y 7
    switch ($randClass) {
        case 1:
            $personas[] = Administrativos::generarAlAzar();  // Clase Administrativo
            break;
        case 2:
            $personas[] = Conserje::generarAlAzar();  // Clase Conserje
            break;
        case 3:
            $personas[] = PersonalLimpieza::generarAlAzar();  // Clase PersonalLimpieza
            break;
        case 4:
            $personas[] = Profesor::generarAlAzar();  // Clase Profesor
            break;
        case 5:
            $personas[] = AlumnoESO::generarAlAzar();  // Clase AlumnoESO
            break;
        case 6:
            $personas[] = AlumnoBachillerato::generarAlAzar();  // Clase AlumnoBachillerato
            break;
        case 7:
            $personas[] = AlumnoFP::generarAlAzar();  // Clase AlumnoFP
            break;
    } 
} 

// Mostrar cuántos objetos se han creado de cada clase
$clases = ['Administrativos'
, 'Conserje', 'PersonalLimpieza', 'Profesor', 'AlumnoESO', 'AlumnoBachillerato', 'AlumnoFP'];
foreach ($clases as $clase) {
    echo "$clase: " . $clase::numeroObjetosCreado() . " objetos creados"."\n";
}


//mostrar lo que hace cada persona

foreach($personas as $persona){

    echo $persona->trabajar()."/n";


}
?>