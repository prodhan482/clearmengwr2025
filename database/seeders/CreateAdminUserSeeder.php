<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        'name' => 'HIGH VOLTAGE LTD.',
            'email' => 'dulal.prodhan@highvoltage.ltd',
            'password' => Hash::make('hvl2025'),
            'phone' => '01641366908',
        ]);

        $role = Role::findOrCreate('SUPER_ADMIN');

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
