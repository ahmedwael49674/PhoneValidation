<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;

class CustomersController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * get all customers with country attrbuties
     *
     * @return view
     */
    public function index()
    {
        $customers = $this->customerService->index();

        return response()->json($customers);
    }
}
