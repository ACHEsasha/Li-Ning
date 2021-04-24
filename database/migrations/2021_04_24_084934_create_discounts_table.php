<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
  {
    /**
     * Запуск миграций
     *
     * @return void
     */
    public function up()
    {
      Schema::create('discounts', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->integer('user_id')->unsigned()->index();
        $table->string('name');
        $table->timestamps();
      });
    }

    /**
     * Откатить миграции
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('discounts');
    }
  }
