<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrintFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_files', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('shop_id')->unsigned();
            $table->integer('file_id')->unsigned();
            $table->string('name');
            $table->string('original_name')->nullable();
            $table->integer('num_of_pages')->nullable();
            $table->integer('total')->nullable();
            $table->integer('num_of_copies')->nullable();
            $table->boolean('recto_verso')->default(0);
            $table->boolean('black_white')->default(0);
            $table->boolean('color')->default(0);
            $table->boolean('is_downloaded')->default(0);
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
        Schema::dropIfExists('print_files');
    }
}
