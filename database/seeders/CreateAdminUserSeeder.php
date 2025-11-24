<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
            'name' => 'HIGH VOLTAGE LTD.',
            'email' => 'dulal.prodhan@highvoltage.ltd',
            'password' => Hash::make('hvl2025'),
            'phone' => '01641366908',
            ],
            [
            'name' => 'Admin User',
            'email' => 'admin@highvoltage.ltd',
            'password' => Hash::make('hvl@admin2025'),
            'phone' => '01999999990',
            ],
            [
            'name' => 'Manager',
            'email' => 'manager@highvoltage.ltd',
            'password' => Hash::make('hvl@manager2025'),
            'phone' => '01999999991',
            ],
            [
            'name' => 'Support',
            'email' => 'activation@highvoltage.ltd',
            'password' => Hash::make('hvl@activation2025'),
            'phone' => '01999999992',
            ],
            [
            'name' => 'Test',
            'email' => 'test@highvoltage.ltd',
            'password' => Hash::make('hvl@test2025'),
            'phone' => '01999999993',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);
        }

        $role = Role::findOrCreate('SUPER_ADMIN');

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
