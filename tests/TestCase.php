<?php

namespace Tests;

use Core\Constants\Constants;
use PHPUnit\Framework\TestCase as FrameworkTestCase;

//require dirname(__DIR__) . "/core/constants/general.php";
//require ROOT_PATH . "/core/debug/functions.php";

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
        $file = Constants::databasePath()->join($_ENV["DB_CAR"]);
        if (file_exists($file)) {
            unlink($file);
        }
    }
}