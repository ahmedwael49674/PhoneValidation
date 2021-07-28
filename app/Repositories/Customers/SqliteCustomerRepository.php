<?php

namespace App\Repositories\Customers;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Customers\CustomerRepositoryInterface as CustomerInterface;

class SqliteCustomerRepository implements CustomerInterface
{
    /**
     * get all custmers
     *
     * @return Collection
     */
    public function index():Collection
    {
        return Customer::all();
    }
}
