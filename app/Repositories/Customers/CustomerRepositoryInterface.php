<?php
namespace App\Repositories\Customers;

use Illuminate\Database\Eloquent\Collection;

interface CustomerRepositoryInterface
{
    public function index():Collection;
}
