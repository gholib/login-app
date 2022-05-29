<?php

use Illuminate\Database\Capsule\Manager;

require_once __DIR__ . "/../vendor/autoload.php";
require_once "init.php";

function run () {
    Manager::table('api_users')->insert([
        [
            'username' => 'test1',
            'password' => password_hash('123456', PASSWORD_DEFAULT)
        ],
        [
            'username' => 'test2',
            'password' => password_hash('12345', PASSWORD_DEFAULT)
        ],
    ]);
    Manager::table('students')->insert([
        [
            'nik_name' => 'test1',
            'first_name' => 'first_name1',
            'last_name' => 'last_name1'
        ],
        [
            'nik_name' => 'test2',
            'first_name' => 'first_name2',
            'last_name' => 'last_name2'
        ],
        [
            'nik_name' => 'test3',
            'first_name' => 'first_name3',
            'last_name' => 'last_name3'
        ],
        [
            'nik_name' => 'test4',
            'first_name' => 'first_name4',
            'last_name' => 'last_name4'
        ],
        [
            'nik_name' => 'test5',
            'first_name' => 'first_name5',
            'last_name' => 'last_name5'
        ],
        [
            'nik_name' => 'test6',
            'first_name' => 'first_name6',
            'last_name' => 'last_name6'
        ],
        [
            'nik_name' => 'test7',
            'first_name' => 'first_name7',
            'last_name' => 'last_name7'
        ],
        [
            'nik_name' => 'test8',
            'first_name' => 'first_name8',
            'last_name' => 'last_name8'
        ],
        [
            'nik_name' => 'test9',
            'first_name' => 'first_name9',
            'last_name' => 'last_name9'
        ],
        [
            'nik_name' => 'test10',
            'first_name' => 'first_name10',
            'last_name' => 'last_name10'
        ],
        [
            'nik_name' => 'test11',
            'first_name' => 'first_name11',
            'last_name' => 'last_name11'
        ],
        [
            'nik_name' => 'test12',
            'first_name' => 'first_name12',
            'last_name' => 'last_name12'
        ],
        [
            'nik_name' => 'test13',
            'first_name' => 'first_name13',
            'last_name' => 'last_name13'
        ],
        [
            'nik_name' => 'test14',
            'first_name' => 'first_name14',
            'last_name' => 'last_name14'
        ],
        [
            'nik_name' => 'test15',
            'first_name' => 'first_name15',
            'last_name' => 'last_name15'
        ],
        [
            'nik_name' => 'test16',
            'first_name' => 'first_name16',
            'last_name' => 'last_name16'
        ],
        [
            'nik_name' => 'test17',
            'first_name' => 'first_name17',
            'last_name' => 'last_name17'
        ],
        [
            'nik_name' => 'test18',
            'first_name' => 'first_name18',
            'last_name' => 'last_name18'
        ],
        [
            'nik_name' => 'test19',
            'first_name' => 'first_name19',
            'last_name' => 'last_name19'
        ],
        [
            'nik_name' => 'test20',
            'first_name' => 'first_name20',
            'last_name' => 'last_name20'
        ],
        [
            'nik_name' => 'test21',
            'first_name' => 'first_name21',
            'last_name' => 'last_name21'
        ],
    ]);
}

run();