<?php
require __DIR__ . "/vendor/autoload.php";

$pdo = new PDO("mysql:host=localhost;database=dbmi", "root", "");

call_user_func(new \dbmigrate\Initialize($pdo));

$installedMigrations = call_user_func(
    new \dbmigrate\MigrateDryRun(
        $pdo, new \SplFileInfo("db/mysql")));

var_dump($installedMigrations);