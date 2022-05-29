<?php

use Illuminate\Database\Capsule\Manager;

require_once __DIR__ . "/../vendor/autoload.php";
require_once "init.php";

function run () {
    Manager::schema()->create('api_users', function ($table) {
        $table->id();
        $table->string('username');
        $table->string('password');
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
    Manager::schema()->create('students', function ($table) {
        $table->id();
        $table->string('nik_name');
        $table->string('first_name');
        $table->string('last_name');
        $table->string('group')->default('Default group');
        $table->timestamps();
    });
}

run();