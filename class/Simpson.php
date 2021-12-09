<?php
namespace App;

class Simpson
{
    public string $name;
    public string $dateOfBirth;
    public string $gender;
    private int $age;
    private string $city = 'Springfield';
    private int $speed;
    public int $health = 100;
    public array $foodEated = [];
    private bool $sleeping = false;

    private function setAge(): void {
        $this->age = date_diff(date_create($this->dateOfBirth), date_create('today'))->y;
    }

    public function setFoodEated($food): void {
        array_push($this->foodEated, $food);
    }

    public function setHealth($newHealth): void {
        if ($newHealth > 100) {
            $this->health = 100;
        } else if ($newHealth < 0){
            $this->health = 0;
            $this->sleep();
        } else{
            $this->health = $newHealth;
        }
    }

    public function getAge(): int {
        return $this->age;
    }

    public function getCompleteName(): string {
        return $this->name .' Simpson';
    }

    public function isOlder($member): bool {
        return $this->getAge() > $member->getAge() ? true : false;
    }

    public function eat($food): void {
        $this->setFoodEated($food);
        $bonusHealth = match ($food) {
            'donut' => 100 - $this->health,
            'bean' => 20,
            'beer' => 5
        };
        $this->setHealth(($this->health + $bonusHealth));
    }

    private function setSpeed($time): void {
        $this->speed = 100 * $this->health / $time;
    }

    public function getDistance($time): int {
        $time = $time / 60;
        $this->setSpeed($time);
        return $this->speed * $time ;

        $this->setHealth(($this->health - 10));
    }

    private function sleep(): void {
        $this->sleeping = true;
        $this->setHealth(($this->health + 10));
        $this->wakeUp();
    }

    public function wakeUp(): void {
        $this->sleeping = false;        
    }

    public function isSleeping(): bool {
        return $this->sleeping;        
    }

    public function __construct($name, $dateOfBirth, $gender) {
        $this->name = $name;
        $this->dateOfBirth = $dateOfBirth;
        $this->gender = $gender;
        $this->setAge();
        // $_SESSION['personnages'][$this->name] = serialize($this);
        $_SESSION['personnages'][$this->name] = $this;
    }
}