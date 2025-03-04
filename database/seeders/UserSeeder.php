<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultUserData = [
            'email_verified_at' => now(),
        ];

        $initialUsers = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => 'adminpassword',
                'role' => UserRole::ADMIN
            ],
            [
                'name' => 'Manager',
                'email' => 'manager@manager.com',
                'password' => 'managerpassword',
                'role' => UserRole::MANAGER
            ],
            [
                'name' => 'Test Client',
                'email' => 'client@example.com',
                'password' => 'password',
                'role' => UserRole::CLIENT
            ]
        ];

        foreach ($initialUsers as $userData) {
            $this->createUser(array_merge(
                $defaultUserData,
                [
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'password' => bcrypt($userData['password'])
                ]
            ), $userData['role']);
        }
    }

    private function createUser(array $userData, UserRole $role): void
    {
        $user = User::create($userData);
        $user->assignRole($role);
    }
}
