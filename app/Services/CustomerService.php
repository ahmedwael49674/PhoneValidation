<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Services\Country\CountryFactory;
use App\Repositories\Customers\CustomerRepositoryInterface as CustomerInterface;

class CustomerService
{
    protected $customerRepository;
    protected $countryFactory;

    public function __construct(CustomerInterface $customerRepository, CountryFactory $countryFactory)
    {
        $this->customerRepository = $customerRepository;
        $this->countryFactory     = $countryFactory;
    }

    /**
     * set country properties for given customer
     *
     * @param $customer
     *
     * @return void
     */
    public function setCountryAttributes($customer):void
    {
        $country            = $this->countryFactory->create($customer->phone);
        if ($country) {
            $customer->country  = $country->getName();
            $customer->state    = $country->getState();
        }
    }
    
    /**
     * get all customers with country attrbuties
     *
     * @return Collection
     */
    public function index():Collection
    {
        $customers = $this->customerRepository->index();
        foreach ($customers as $customer) {
            $this->setCountryAttributes($customer);
        }
        return $customers;
    }
}
