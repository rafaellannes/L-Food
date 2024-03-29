<?php

use App\Models\{
    User,
    Tenant
};
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();

        $tenant->users()->create([
            'name' => 'Rafael Lannes',
            'email' => 'teste@teste.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
