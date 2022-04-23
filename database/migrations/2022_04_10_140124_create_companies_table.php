<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->constrained()
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->unsignedBigInteger('industry_id');
            $table->string('company_name', 150)->nullable();
            $table->string('entrepreneur', 10)->nullable();
            $table->text('company_address', 300)->nullable();
            $table->string('employee_size', 150)->nullable();
            $table->string('district', 55)->nullable();
            $table->string('thana', 55)->nullable();
            $table->string('trade_license', 150)->nullable();
            $table->string('website_url', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
