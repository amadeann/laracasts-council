<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        collect([
            [
                'email' => 'aa+2@ak-ventures.eu',
                'name' => 'amade2',
                'confirmed' => true,
                'password' => bcrypt('secret'),
            ],
            [
                'email' => 'aa@ak-ventures.eu',
                'name' => 'amade',
                'confirmed' => true,
                'password' => bcrypt('secret'),
            ],
            [
                'name' => 'John Doe',
                'username' => 'johndoe',
                'email' => 'john@example.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Indiana Jones',
                'username' => 'rotla1981',
                'email' => 'indy@example.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Ben Solo',
                'username' => 'KyloRen',
                'email' => 'kylo@example.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Marty McFly',
                'username' => '121gigawatts',
                'email' => 'calvin@example.com',
                'password' => bcrypt('password')
            ],
        ])->each(function ($user) {
            factory(User::class)->create(
                [
                    'name' => $user['name'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'password' => $user['password']
                ]
            );
        });
    }
}
