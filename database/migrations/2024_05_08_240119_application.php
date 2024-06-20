<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Applications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application', function (Blueprint $table) {
            $table->bigIncrements('appID');
            $table->unsignedBigInteger('jobPostID');
            $table->unsignedBigInteger('jobSeekerID');
            $table->string('applicantName',30);
            $table->string('email');
            $table->integer('phoneNumber');
            $table->string('faculty');
            $table->year('graduationYear');
            $table->text('experience');
            $table->text('coverLetter');
            $table->timestamps();
            $table->foreign('jobPostID')->references('jobID')->on('job_posts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jobSeekerID')->references('userID')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
