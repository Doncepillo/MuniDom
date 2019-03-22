<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Ruta Trabajadores
        Permission::create([
            'name' =>'Visualizar Trabajadores',
            'slug' =>'workers.index' ,
            'description' =>'Visualiza todos los trabajadores',
        ]);
        Permission::create([
            'name' =>'Detalle de Trabajadores',
            'slug' =>'workers.view' ,
            'description' =>'Visualiza el detalle de todos los trabajadores',
        ]);
        Permission::create([
            'name' =>'Registrae Trabajadores',
            'slug' =>'workers.create' ,
            'description' =>'Registra trabajadores en el sistema',
        ]);
        Permission::create([
            'name' =>'Editar Trabajadores',
            'slug' =>'workers.edit' ,
            'description' =>'Edita trabajadores en el sistema',
        ]);
        Permission::create([
            'name' =>'Eliminar Trabajadores',
            'slug' =>'workers.destroy' ,
            'description' =>'Elimina trabajadores en el sistema',
        ]);
        
    }
}
