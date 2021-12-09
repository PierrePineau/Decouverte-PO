<?php
namespace App;

class Building
{
    protected string $name;
    private array $simpsons = [];
    protected int $nbSimpsons = 0;
    const MIN_PEOPLE = 1;
    const MAX_PEOPLE = 10;
    private Adress $address;

    public function getSimpsons(): array {
        return $this->simpsons;
    }
    
    public function setSimpsons($simpsons): void {

        if (is_array($simpsons)) {
            foreach ($simpsons as $simpson) {
                $this->addSimpson($simpson);
            }
        }
    }

    protected function addSimpson($newSimpson): void{
        // $class = get_called_class();
        if (count($this->simpsons) < static::MAX_PEOPLE && count($this->simpsons) > static::MIN_PEOPLE && $newSimpson instanceof Simpson) {
            array_push($this->simpsons, $newSimpson);  
        }
    }

    public function getNbSimpsons(): int {        
        return count($this->simpsons);
    }

    public function getOlderSimpson(): object {
        $older = $this->simpsons[0];
        foreach ($this->simpsons as $simpson) {
            if ($simpson->getAge() > $older->getAge()) {
                $older = $simpson;
            }
        }
        return $older;
    }

    public function setAdress($street, City $city, $postalCode, $country): void {
        $this->address = new \App\Address($street, $city, $postalCode, $country);
    }

    public function getAdress(): string {
        $this->address->getCompleteAddress();
    }

    public function __construct($name, $simpsons, $street = '', $city = '', $postalCode = '', $country = '' ) {
        $this->name = $name;
        $this->setSimpsons($simpsons);
        $this->nbSimpsons = $this->getNbSimpsons();
        $this->setAdress($street, $city, $postalCode, $country);
    }
}

class House extends Building {
}

class Factory extends Building {
    const MAX_PEOPLE = 50;
}