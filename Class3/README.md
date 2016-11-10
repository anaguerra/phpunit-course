## Objetivos

Conocer el concepto de Fixture
crear Fixtures de entrada ( Setup ) y salida ( TearDown )
Conocer los Fixtures generales de entrada y FIxtures generales de salida
Sumar a nuestro arsenal funcionalidades de Phpunit


## Contenido 

En la clase 2 tuvimos la oportunidad de definir proveedores de datos para nuestros tests, esto nos permite revisar el comportamiento de los métodos que estamos intentando probar con diferentes cargas de datos sin tener que crear una prueba diferente para un dato de prueba diferente, ahora bien, es inevitable cuando utilizamos estos proveedores de datos pensar en la necesidad de tener una meanera ya no solo de setear datos sino de setear el ESTADO de nuestra aplicación o la clase que estamos intentando probar para evaluar su comportamiento según su interacción con otros elementos en un momento determinado en el flujo de uso que esta clase pueda tener, resumiendo un poco, a medida que avanzamos con nuestras pruebas vemos la imperativa necesidad de querer probar un método seteando un ecosistema compuesto por variables con valores determinados, objetos y sus propiedades, etc,  con el que ha de interactuar y que posee un estado.  


### Fixture

Un fixture se define como un ajuste previo de estado, su traducción más simple del inglés es "instalación" "arreglo/corrección instalado", los fixtures resultan necesarios en nuestras baterías de prueba, recordemos que cada clase de tests de Phpunit ejecuta todos los métodos que contengan la palabra test y que cada uno de estos se ejecuta de manera aislada, es decir, los resultados del test uno, no influyen en el estado del test dos y así para cada uno de los tests que componen una clase, pero, ¿ como es esto posible ?, es muy sencillo, por cada método de test contenido en un testCase ( a partir de ahora llamaremos testCase a cada clase de tests que desarrollemos ) Phpunit utiliza una copia de la clase con lo cual cada método se ejecuta de manera aislada, comprobemos con un ejemplo:  

La clase a continuación podrá ser conseguida en el folder Class 3, aquí solo una muestra comprimida 

Class Class3Example1 extends testCase 
{

    public flag = "Not Affected";

    public function testSettingTheflagToAffected()
    {
        $this->flag = "Affected";
        $this->assertTrue( $this->flag, "Affected");
    }

    public function testGettingTheflag()
    {
        $this->assertTrue( $this->flag, "Affected");
    }
    
}

Si ejecutamos la prueba anterior ( recuerde que tiene una copia en este folder ) en Phpunit, veremos como el segundo test falla demostrando que cada método esta auto contenido y que no puede afectar a otros. 

### setUp()


### tearDown()

### setUpBeforeClass()

### tearDownAfterClass()
 
## Ejercicios 

Cree una nuevo testCase que permita setear el objeto Car, el objeto persona, y el objeto repairment como propiedades del testCase para luego poder ser utilizados por nuestros tests.Cree la siguiente batería de pruebas:
    probar si un coche es reparable por una persona ( utilizar varios tests para probar que el coche tiene una llanta mala, llanta de repuesto, gato )
    probar que cuando se aplica la reparación el coche vuelve a estar en condiciones.

## Por donde empezar 

  



