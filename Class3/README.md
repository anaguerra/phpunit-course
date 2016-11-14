## Objetivos

Conocer el concepto de Fixture
crear Fixtures de entrada ( Setup ) y salida ( TearDown )
Conocer los Fixtures generales de entrada y FIxtures generales de salida
Sumar a nuestro arsenal funcionalidades de Phpunit


## Contenido 

En la clase 2 tuvimos la oportunidad de definir proveedores de datos para nuestros tests, esto nos permite revisar el comportamiento de los métodos que estamos intentando probar con diferentes cargas de datos sin tener que crear una prueba diferente para un dato de prueba diferente, ahora bien, es inevitable cuando utilizamos estos proveedores de datos pensar en la necesidad de tener una meanera ya no solo de setear datos sino de setear el ESTADO de nuestra aplicación o la clase que estamos intentando probar para evaluar su comportamiento según su interacción con otros elementos en un momento determinado en el flujo de uso que esta clase pueda tener, resumiendo un poco, a medida que avanzamos con nuestras pruebas vemos la imperativa necesidad de querer probar un método seteando un ecosistema compuesto por variables con valores determinados, objetos y sus propiedades, etc,  con el que ha de interactuar y que posee un estado.  


### Fixture

Un fixture se define como un ajuste previo de estado, su traducción más simple del inglés es "instalación" "arreglo/corrección instalado", los fixtures resultan necesarios en nuestras baterías de prueba, recordemos que cada clase de tests de Phpunit ejecuta todos los métodos que contengan la palabra test y que cada uno de estos se ejecuta de manera aislada, es decir, los resultados del test uno, no influyen en el estado del test dos y así para cada uno de los tests que componen una clase, pero, ¿ como es esto posible ?, es muy sencillo, por cada método de test contenido en un testCase ( a partir de ahora llamaremos testCase a cada clase de tests que desarrollemos ) Phpunit utiliza una copia de la clase con lo cual cada método se ejecuta de manera aislada, comprobemos con un ejemplo:  

La clase a continuación podrá ser conseguida en el folder Class 3/example1Test.php, si desea puede ejecutar este ejemplo con el comando: 

    phpunit example1Test.php --colors

A continuación una vista comprimida:
  

    Class example1Test extends \PHPUnit\Framework\TestCase 
    {

        public $flag = "Not Affected";

        public function testSettingTheflagToAffected()
        {
            $this->flag = "Affected";
            $this->assertEquals( $this->flag, "Affected");
        }

        public function testGettingTheflag()
        {
            $this->assertEquals( $this->flag, "Affected");
        }
    
    }

Si ejecutamos la prueba anterior ( recuerde que tiene una copia en este folder ) en Phpunit, veremos como el segundo test falla demostrando que cada método está auto contenido y que no puede afectar a otros. 

### setUp()

El método setUp es uno de los métodos para la creación de fixtures más utilizado, lo que se defina en este método será ejecutado una vez antes de cada método de test sea ejecutado, con esto podremos setear estados en nuestro test Case
antes de la ejecución de cada método, si volvemos al ejemplo anterior teniendo ahora un setUp(); 

    Class example2Test extends \PHPUnit\Framework\TestCase 
    {

        public $flag = "Not Affected";

        public function setUp()
        {
            $this->flag = "Affected";
        }


        public function testSettingTheflagToAffected()
        {
            $this->assertEquals( $this->flag, "Affected");
        }

        public function testGettingTheflag()
        {
            $this->assertEquals( $this->flag, "Affected");
        }
    
    }

Si ejecutamos el código anterior ( disponible en Class3/example2Test.php ) podremos observar como ahora ambos tests ejecutan satisfactoriamente debido a que el método setUp se ejecutará una vez por cada método test.

### tearDown()

El método tearDown es un método proporcionado por phpUnit para ser ejecutado una vez que termina la ejecución de cada test de nuestro testCase, pero ¿ porque necesitamos este tipo de método si cada test es autocontenido ?, es decir ¿ por que necesitamos un método que se ejecute con cada nuevo test si cada nuevo test comenzará reinicializado al mismo estado al estar autocontenido ? La respuesta es que nuestro código puede no solo afectar el estado aplicativo sino tambien recursos o filesystems, un ejemplo de recurso podría ser una base de datos, en ese caso sería propicio utilizar tearDown para invocar a nuestro softwarede migración y restablecer la base de datos a un punto inicial. 

Veamos un ejemplo de test que origina la necesidad de tearDown ( Class3/example3Test.php )


    lass example3Test extends \PHPUnit\Framework\TestCase 
    {

        public function testCanCreateDir()
        {
            $dir = mkdir( dirname( __FILE__ ).'/newDirectory' );
            $this->assertTrue( $dir );
        }

        public function testCanCreateDirWithPermissions()
        {
            $dir = mkdir( dirname( __FILE__ ).'/newDirectory', 0775 );
            $this->assertTrue( $dir );
        }
    
    }

Al ejecutar el test Case anterior podemos observar como falla al ejecutar el segundo test, adicionalmente ud tendrá que recordarse de borrar el directorio newDirectory la próxima vez que quiera ejecutar este test. sin embargo, si tuviesemos
el método tearDown definido en nuestro testCase podríamos hacer: 

    ...
    public function tearDown()
    {
        rmdir( dirname( __FILE_ ).'newDirectory' );
    }
    ...

### setUpBeforeClass()


### tearDownAfterClass()
 
## Ejercicios 

Cree una nuevo testCase que permita setear el objeto Car, el objeto persona, y el objeto repairment como propiedades del testCase para luego poder ser utilizados por nuestros tests. Cree la siguiente batería de pruebas:
    probar si un coche es reparable por una persona ( utilizar varios tests para probar que el coche tiene una llanta mala, llanta de repuesto, gato )
    probar que cuando se aplica la reparación el coche vuelve a estar en condiciones.

## Por donde empezar 

  



