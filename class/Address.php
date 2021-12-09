<?php
namespace App;
/*----------------------------

Classe Address

----------------------------*/

class Address
{
    private string $street;
    private City $city;
    private int $postalCode;
    private string $country;

    
    public function __construct($street, City $city, $postalCode, $country) {
        $this->street = $street;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->country = $country;
    }

    public function getCompleteAddress(): string{
        return sprintf("%s %s, % %s", $this->street, $this->city, $this->postalCode, $this->country);
    }
}


