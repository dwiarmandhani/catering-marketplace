<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $merchantRole = Role::create(['name' => 'merchant']);
        $customerRole = Role::create(['name' => 'customer']);

        $permissions = [
            'create_menu',
            'edit_menu',
            'delete_menu',
            'view_menu',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $admin->roles()->attach($adminRole);

        for ($i = 1; $i <= 3; $i++) {
            $merchant = User::create([
                'name' => 'Merchant User ' . $i,
                'email' => 'merchant' . $i . '@example.com',
                'password' => Hash::make('password'),
            ]);
            $merchant->roles()->attach($merchantRole);
        }

        for ($i = 1; $i <= 3; $i++) {
            $customer = User::create([
                'name' => 'Customer User ' . $i,
                'email' => 'customer' . $i . '@example.com',
                'password' => Hash::make('password'),
            ]);
            $customer->roles()->attach($customerRole);
        }
    }
}
