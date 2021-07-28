<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use App\Http\Requests\FilterCustomer;

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
    public function index(FilterCustomer $request)
    {
        $customers = $this->customerService->indexWithPaggination($request->country, $request->state);
        // return response()->json($customers);
        return view('index', [
            'customers' => $customers
        ]);
    }
}
