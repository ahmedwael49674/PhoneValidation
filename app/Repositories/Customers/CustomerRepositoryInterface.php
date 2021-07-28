<?php
namespace App\Repositories\Customers;

use Illuminate\Support\Collection;

interface CustomerRepositoryInterface
{
    public function pagginate(?string $country):Collection;
}
