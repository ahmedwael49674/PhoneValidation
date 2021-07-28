<?php

namespace App\Services\Country;

class CountryFactory
{
    const Countries     = ["237" => "Cameroon", "251" => "Ethiopia", "212" => "Morocco", "258" => "Mozambique", "256" => "Uganda"];
    const CountryCodes  = ["237" , "251" , "212" , "258" , "256" ];

    /**
     * retrun the country code form phone number
     *
     * @param String $phoneNum
     *
     * @return null|string
     */
    public function getCountryCode(String $phoneNum):?string
    {
        $countryCode = data_get(\explode(' ', $phoneNum), 0);
        return trim($countryCode, '()');
    }

    /**
     * using polymorphism and abstract factory design pattern
     * create an object from country classess
     *
     * @param String $phoneNum
     *
     * @return null|object
     */
    public function create(String $phoneNum):?Object
    {
        $countryCode = $this->getCountryCode($phoneNum);
        if (in_array($countryCode, self::CountryCodes)) {
            $class =  "App\\Services\\Country\\Countries\\" . self::Countries[$countryCode];
            return new $class($phoneNum);
        }
        return null;
    }
}
