<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->tinyInteger('user_type');
            $table->tinyInteger('looking_for');
            $table->tinyInteger('interested_in');
            $table->boolean('can_relocate')->default(0);
            $table->json('can_relocate_to_city')->nullable();
            $table->string('stream', 200);
            $table->string('college', 300);
            $table->tinyInteger('semester');
            $table->date('graduation');
            $table->json('interested_roles');
            $table->json('skills');
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
        Schema::dropIfExists('user_infos');
    }
}
