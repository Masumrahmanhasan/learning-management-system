<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('option_text');
            $table->tinyInteger('correct')->nullable()->default(0);
            $table->text('explanation')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions_options');
    }
}
