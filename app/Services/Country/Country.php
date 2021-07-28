<?php

namespace App\Services\Country;

class Country
{
    /**
     * retrun the protected property country name
     *
     * @return String
     */
    public function getName():String
    {
        return $this->name;
    }

    /**
     * retrun the phone num state by applying country regex
     *
     * @return Bool
     */
    public function getState():Bool
    {
        return (bool) preg_match($this->regex, $this->customerPhoneNum, $matches);
    }
}
