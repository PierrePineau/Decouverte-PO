<?php
namespace App;

class City
{
    private string $name;
    public array $buildings;
    
    public function __construct($name, $buildings) {
        $this->name = $name;
        $this->setBuildings($buildings);
    }

    public function setBuildings(array $buildings): void {
        foreach ($buildings as $building) {
            $this->addBuilding($building);
        }
    }

    protected function addBuilding(Building $newBuilding): void{
        array_push($this->building, $newBuilding);  
    }

    public function getPopulation(): int {
        $population = array_map(
            fn ($building) => $building->getNbSimpson(),
            $this->buildings
        );
        return array_sum($population);
    }

    public function getHigherPopulationAddress(): string {
        $buildings = $this->buildings;
        uasort($buildings, function(Building $a, Building $b) {
            return ($a->getNbSimpson() > $b->getNbSimpson()) ? -1 : 1;
        });

        return array_shift($buildings)->getCompleteAddress();
    }

    public function getOlder(): Simpson {
        $buildings = $this->buildings;
        uasort($buildings, function(Building $a, Building $b) {
            return ($a->getOlderSimpson()->getAge() > $b->getOlderSimpson()->getAge()) ? -1 : 1;
        });

        return array_shift($buildings)->getOlderSimpson();
    }

    public function getWeakSimpsons(): array {
        $weakSimpsons = [];
        // foreach ($buildings as $building) {
        //     foreach ($building->simpsons as $simpson) {
        //         if ($simpson->health < 40) {
        //             array_push($weakSimpsons, $simpson);
        //         }
        //     }
        // }
        // return $weakSimpsons;
        // $weakSimpsons = array_map(function($building) {
        //     return ($simpson)
        // })
        foreach ($this->buildings as $building) {
            array_push($weakSimpsons, array_map(function($simpson) {
                return ($simpson->health < 40);
            }, $building->simpsons));
        }
        return $weakSimpsons;
    }
    
}