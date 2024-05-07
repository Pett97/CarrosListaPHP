<?php

namespace Tests;

use PHPUnit\Framework\TestCase as FrameworkTestCase;

require "var/www/core/debug/functions.php";

class TestCase extends FrameworkTestCase
{
    public function setUp(): void
    {
        $this->clearDatabase();
    }

    public function tearDown(): void
    {
        $this->clearDatabase();
    }

    private function clearDatabase(): void
    {
        $file ="/var/www/database/".$_ENV["DB_CAR"];
        if(file_exists($file)) unlink($file);
    }
}
