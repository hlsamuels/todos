<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                    ->constrained()
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->foreignId('todo_list_id')
                    ->nullable()
                    ->constrained()
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
            $table->tinyInteger('completed')->default(0);
            $table->string('title');
            $table->longText('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
