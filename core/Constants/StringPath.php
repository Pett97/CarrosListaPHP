<?php

namespace Core\Constants;

class StringPath
{
    public function __construct(private string $path)
    {
    }
    public function join(string $path):string
    {
        $this->path .= $path;
        return $this;
    }

    public function __toString()
    {
        return $this->path;
    }
}
