<?php
use Illuminate\Database\Capsule\Manager as Capsule;

class Migration extends Controller {
 public function todo()
 {

    Capsule::schema()->create('todos', function ($table) {
           $table->increments('id');
           $table->string('todo');
           $table->string('description');
           $table->string('category');
           $table->integer('user_id')->unsigned();
           $table->timestamps();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       });
 }

 public function user() {
    Capsule::schema()->create('users', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('userimage')->nullable();
        $table->string('api_key')->nullable()->unique();
        $table->rememberToken();
        $table->timestamps();
    });
 }

}