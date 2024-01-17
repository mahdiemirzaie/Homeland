<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'mobile' => '09151111111',
            'mobile_verify_at' => now(),
            'password' => 'password',
        ]);

//        Favorite::factory(5)->create();
//        $admin->syncRoles(RoleEnum::ADMIN->value);
//        User::factory(1)->create()->each(function (User $user) {
//            ActivationCode::factory(3)->create([
//                'user_id' => $user->id,
//            ]);
//        });
    }
}
