## Objetivos

Trabajar con proveedores de datos en los tests Unitarios.
Entender las funcionalidades básicas por comentarios de PHPUnit.
Sumar tests básicos a nuestro arsenal

## Contenido 

En la Clase 1 pudimos comprender la filosofía básica de trabajo con TDD así como comprender el espacio básico de trabajo con PHPUnit, es momento de poder sumar a nuestro arsenal herramientas para desarrollar nuestros tests.

### Proveedores de datos en PHPUnit

Una de las necesidades en nuestros tests es poder utilizar datos como input que puedan ser reutilizados, mas aún utilizar estructuras de datos como arrays de manera consistente en nuestra batería de datos es una feature importante que nos libera de repetir información en las pruebas (metodos dentro de la clase de pruebas), adicionalmente es importante saber que cada test se realiza en un ambiente aislado aunque se ejecuten todos a la vez por lo cual la información no puede ser compartida entre métodos sin la figura del proveedor de datos.

para declarar un proveedor de datos lo podemos hacer de la siguiente manera 

    public function nameOfProviderProvider()
    {
        return array( ... );
    }

done nameOfProvider es el nombre que queremos que asuma nuestro proveedor de datos, fijaros que la nomenclatura para el Naming del métodos es del tipo <<NameOfProvider>>Provider. Al crear el proveedor de datos este estará disponible en la clase en la que se haya definido pero no podrá ser usado por ningún test salvo que su uso sea explícitamente declarado, para ello debemos entender otro concepto importante en PHPUnit, Los comentarios son cosas. 

### Los comentarios son cosas 

En PHPUnit los comentarios cumplen una funciones más allá de la documentación, poseen funciones definidas que dotan al test de funcionalidad extra, tal y como vimos en la solución del ejercicio de la Clase 1 con el uso de @depends, los comentarios de tipo docBlock poseen una amplia lista de funcionalidad.

En el caso concreto del uso de proveedores de datos la propiedad @dataprovider permite a los tests hacer uso de los proveedores de datos que tengamos declarados de la siguiente manera: 

    /**
     * @dataprovider colorsProvider 
     */
    public function testColorsExists( array $colors )
    {
        $palette = new Palette();
        $assert = true;
        foreach( $colors as $color ){
            if ( !$palette->isValidColor( $color ) ){
                $assert = false;
                break;
            }
        }
        $this->assertTrue( false );
    }
 
    public function colorsProvider()
    {

        return array(array('yellow', 'blue', 'red', 'apple'));
    
    }

El proveedor de datos en el ejercicio anterior será el encargado de inyectar valores a través del argumento del test testColorExists en $colors, al devolder un array contenido en un array, indicamos que cualquier test que haga uso del proveedor de datos inyectará como primer argumento el array del proveedor de datos.

Es importante recalcar que las propiedades o funcionalidades que definimos en el bloque de comentarios puede ser combinados para dotar de funcionalidad extra a nuestros tests, con lo cual no estamos supeditados a usar una única funcionalidad a la vez. 


## Ejercicios 

Cree un proveedor de datos con objetos ( Car ) que representen tres modelos de coches Seat, cada objeto tendrá que tener las propiedades Marca, Modelo, color y Número de llantas, deberá crear pruebas para cada una de estas propiedades, luego utilice este proveedor de datos para verificar que para cada objeto estas propiedades están seteadas.

## Por donde empezar 

  



