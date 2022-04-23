<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->foreignId('category_id')
            ->constrained()
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string('job_title', 255);
            $table->string('slug', 255)->unique();
            $table->string('company_name', 200);
            $table->string('company_type', 55)->nullable();
            $table->string('job_location', 255)->nullable();
            $table->date('published_on', 55)->nullable();
            $table->date('deadline', 55)->nullable();
            $table->text('req_degree', 350)->nullable();
            $table->string('age', 100)->nullable();
            $table->string('experience', 100)->nullable();
            $table->string('employment_status', 100)->nullable();
            $table->string('vacancy', 55)->nullable();
            $table->float('salary', 8,2)->nullable();
            $table->text('report', 300)->nullable();
            $table->text('description')->nullable();
            $table->string('job_thumbnail', 55)->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('is_published')->default(0);
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
        Schema::dropIfExists('job_posts');
    }
}
