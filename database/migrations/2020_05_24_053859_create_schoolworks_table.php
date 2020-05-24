<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schoolworks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('description');
            $table->date('deadline');
            $table->date('date_submitted');
            $table->boolean('status'); //0 if not yet submitted and 1 if already submitted
            $table->foreignId('subject_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schoolworks');
    }
}
