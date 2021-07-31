<?php

use App\Models\{
    Tenant,
    Plan,
};
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '1',
            'name' => 'Empresa 1',
            'url' => 'empresa1',
            'email' => 'teste@teste.com',
        ]);
    }
}
