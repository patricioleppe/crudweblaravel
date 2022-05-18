*  Laravel - Patricio Andres Leppe Astorga!

`composer create-project laravel/laravel crud` -- creamos el proyecto en laravel

`php artisan serve` - iniciar servidor

`resources\views\`
crear carpeta: productos, e ingresar arhivos.


**Migraciones**

`php artisan make:migration tienda` -> crea una nueva migracion
`php artisan make:migration create_productos_table` - otra forma de crear migraciones. crea algunos campos y hace la sintaxis de un archivo de migraciones.

`php artisan reset` -- para borrar todo, hace drop a todas las tablas

`php artisan migrate` - migra a base de datos.
`php artisan migrate:rollback` - elimina todo desde un ultimo punto de la migracion.

`php artisan migrate:fresh` - refresca las tablas, hace el down y el up // destruye todos los datos
`php artisan migrate:refresh` - refresca las tablas // destruye todos los datos

`php artisan make:migration add_descripcion_to_productos` -


* Eloquen Orm de laravel - Patricio Andres Leppe Astorga!

`composer require laravel/tinker` -- instalamos tinker
`php artisan tinker` -- crea consola nueva tinker

`php artisan make:model autor` -- crea modelo en workspace\php\Laravel\Laravel1\laravel\app\Models\autor.php

------ Tinker -------

`php artisan tinker` -- consola
`use App\Models\autor;` -- escribir y darle Enter!


Antes crear
`php artisan make:migration autors`
    Schema::create('autors', function (Blueprint $table){
        $table->id();
        $table->string('nombre');
        $table->string('email')->unique();
        $table->string('password');
        $table->timestamps();
    });
`php artisan migrate`



`$dato = new autor();` -- le damos enter, crea un objeto
`=> App\Models\autor {#3545}` -- mostrara algo como esto

`$dato->nombre = 'Rodrigo';` -- le damos enter...
`=> "Rodrigo"` -- mostrara algo como esto

`$dato->email = 'r@r.r';` -- le damos enter...
`=> "r@r.r"` -- mostrara algo como esto

`$dato->password = '123123';` -- le damos enter...
`=> "123123"` -- mostrara algo como esto


`$dato` -- le damos enter...
`=> App\Models\autor {#3545`
     `nombre: "Rodrigo",`
     `email: "r@r.r",`
     `password: "123123",`
   `}` -- mostrara algo como esto


`$dato -> save();` -- Enter
`=> true` -- si todo esta bien envia un true

------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------


-- en app/Models/autor.php
-- agrear hace referencia a la migracion 2014_10_12_000000_create_users_table.php y hereda de users
* protected $table = 'users';


`php artisan db:seed` -- actualizado datos ingresados en DatabaseSeeder.php
* public function run()
    {
        $dato = new autor();
        $dato->nombre='Patricio';
        $dato->email='patricio.leppe@gmail.com';
        $dato->password='abril1524';
        $dato->comentario='soy super simpatico, tolerante y bueno';
        $dato->save();
    }
* "


* CRUD * * CRUD * * CRUD * * CRUD *

**MODELOS!**
--este comando crea 3 archivos, crea un archivo en Models, Crea una migracion 2022_04_30_005700_create_clients_table.php y crea un controlador en Controller
`php artisan make:model Client -mcr` -- en el caso de los modelos siempre tratar de que el nombre sea singular! -mcr crea la migracion a demas.


**PLANTILLAS**
Vamos a crear una caerpeta dentro de views. llammada theme, y ahi pondremos el archivo base para nuestros templates.
`views/theme/base.blade.php`

` php artisan route:list` -- muestra todas las rutas routes/api, channel, web

**MVC**
`index.blade.php` -- tiene un ruta que envio hacia client.create pregunta en routes/web.php este va a buscar ClientController.php
`public function create()`
`{`
   `return view('client.form');` -- este redirecciona a la vista cliente/form.blade.php
`}`



**Migraciones**


<!--  -->

