<?php

namespace App\Command;

interface CommandInterface
{
    /**
     * @return mixed
     */
    public function run();
}
