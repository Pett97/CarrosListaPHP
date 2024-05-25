<?php

    namespace Core\Debug;

class Debugger
{
    public static function dd(): void
    {       
            echo "<pre>";
            var_dump(func_get_args());
            exit;
            echo "</pre>";
    }
}
