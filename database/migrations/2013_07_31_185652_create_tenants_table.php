<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();

            $table->string('cnpj')->unique();
            $table->unsignedBigInteger('plan_id'); //plano
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->string('email')->unique();
            $table->string('logo')->nullable();


            //Status tenant (se inativar 'N', perderá acesso)
            $table->enum('active', ['Y', 'N'])->default('Y');

            //Subscription

            $table->date('subscription')->nullable(); //Data inscricao
            $table->date('expires_at')->nullable(); //Data que expira acesso
            $table->string('subscription_id')->nullable(); // Identificado do gateway de pagamento

            $table->boolean('subscription_active')->default(false); //Assinatura ativa
            $table->boolean('subscription_suspended')->default(false); //Assinatura  cancelada (n irá renovar)

            $table->timestamps();

            $table->foreign('plan_id')->references('id')->on('plans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
