<?php
namespace Tests\Unit\Controllers;
use Core\Constants\Constants;
use Tests\TestCase;

abstract class ControllerTestCase extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        require Constants::teste()->join('/config/routes.php');
    }

    public function get(string $action, string $controller): string
    {
        echo "Creating controller instance: $controller\n";
        $controllerInstance = new $controller();

        ob_start();
        try {
            echo "Calling action: $action\n";
            $controllerInstance->$action();
            return ob_get_clean();
        } catch (\Exception $e) {
            echo "Exception: " . $e->getMessage() . "\n";
            throw $e;
        }
    }
}






?>