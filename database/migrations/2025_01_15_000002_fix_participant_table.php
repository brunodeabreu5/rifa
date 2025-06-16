
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixParticipantTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('participant')) {
            Schema::create('participant', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('telephone');
                $table->string('email')->nullable();
                $table->string('cpf')->nullable();
                $table->decimal('valor', 10, 2)->default(0);
                $table->integer('reservados')->default(0);
                $table->integer('pagos')->default(0);
                $table->unsignedBigInteger('product_id');
                $table->json('numbers')->nullable();
                $table->unsignedBigInteger('customer_id')->nullable();
                $table->boolean('conferido')->default(false);
                $table->boolean('confirmacao_msg')->default(false);
                $table->timestamps();

                $table->foreign('product_id')->references('id')->on('products');
                $table->foreign('customer_id')->references('id')->on('customers');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('participant');
    }
}
