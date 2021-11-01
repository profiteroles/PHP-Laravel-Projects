<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::connection('mongodb')->create('books', function ($collection) {
            $collection->index('id');
            $collection->string('title');
            $collection->string('author');
            $collection->string('desc');
            $collection->year('published_year');
        });

//        Schema::create('books', function (Blueprint $table) {
//            $table->id();
//            $table->string('title', 128);
//            $table->string('author',128);
//            $table->string('desc',255)->nullable();
//            $table->year('published_year')->nullable();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection('mongodb')->drop(['books']);
    }
}
