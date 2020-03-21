<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create();

        //

        DB::table('role_user')->truncate();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.fr',
            'password' => Hash::make('password')
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.fr',
            'password' => Hash::make('password')
        ]);


        $adminRole = Role::where('name','admin')->first();
        $userRole = Role::where('name','user')->first();

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
