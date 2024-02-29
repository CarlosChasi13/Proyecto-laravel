<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\RoleHasPermission;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artisan::call('permissions:sync');

        $permisos = Permission::all();
        $guardName = 'web';

        foreach($permisos as $permiso){
            $existePermiso = RoleHasPermission::where('permission_id', $permiso->id)->exists();

            if(!$existePermiso && $permiso->guard_name == $guardName){
                RoleHasPermission::create([
                    'permission_id' => $permiso->id,
                    'role_id' => 1
                ]);
            }
        }

    }
}
