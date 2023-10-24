<?php

namespace App\Services;

class OrderService
{

    public function orderTypeBgToClass(string|null $status = null): string
    {
        return 'bg-success';
    }

}
