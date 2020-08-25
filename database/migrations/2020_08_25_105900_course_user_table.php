<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CourseUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('course_user')) {
            Schema::create('course_user', function (Blueprint $table) {
                $table->foreignId('course_id')->nullable()->constrained()->onDelete('cascade');;
                $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');;
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_user');
    }
}
