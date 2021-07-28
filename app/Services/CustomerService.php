<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Services\Country\CountryFactory;
use App\Repositories\Customers\CustomerRepositoryInterface as CustomerInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator as PaginatedCollection;

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
    public function setCountryAndStateAttributes($customer):void
    {
        $countryObject      = $this->countryFactory->createFromPhoneNum($customer->phone);
        if ($countryObject) {
            $customer->country  = $countryObject->getName();
            $customer->state    = $countryObject->getState();
        }
    }

    public function setStateAttribute($customer)
    {
        $countryObject      = $this->countryFactory->createFromCountryName($customer->country, $customer->phone);
        $customer->state    = $countryObject->getState();
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
        filled($customer->country) ? $this->setStateAttribute($customer) : $this->setCountryAndStateAttributes($customer);
    }
    
    /**
     * get all customers with country attrbuties
     *
     * @return Collection
     */
    public function indexWithPaggination(?string $country, ?bool $state):Collection
    {
        $response  = collect();
        $customers = $this->customerRepository->pagginate($country);

        foreach ($customers as $customer) {
            $customer->country  = $country ?? null;
            $this->setCountryAttributes($customer);
            if (filled($state) && $customer->state != $state) {
                continue;
            }
            $response[] = $customer;
        }

        return $response;
    }
}
