<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JobPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->bigIncrements('jobID');
            $table->string('jobTitle', 255)->collation('utf8mb4_unicode_ci');
            $table->string('jobLocation', 255)->collation('utf8mb4_unicode_ci');
            $table->text('jobDescription')->collation('utf8mb4_unicode_ci');
            $table->text('jobRequirements')->collation('utf8mb4_unicode_ci'); // Corrected column name
            $table->unsignedBigInteger('companyID');
            $table->unsignedBigInteger('categoryID');
            $table->date('deadline');
            $table->timestamps();

            $table->foreign('companyID')->references('userID')->on('users');
            $table->foreign('categoryID')->references('categoryID')->on('job_categories');
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
