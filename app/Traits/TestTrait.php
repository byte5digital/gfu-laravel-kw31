<?php

namespace App\Traits;

trait TestTrait
{
    public function returnIdFromModel()
    {
        return $this->id;
    }
}
