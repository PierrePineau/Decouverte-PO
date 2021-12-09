<?php
namespace App;

abstract class Citizen
{
    public function __construct($name) {
        $this->name = $name;
    }

    public abstract function isBuddyWith(Citizen $citizen);
}

class Simpson extends Citizen
{
    public function isBuddyWith(Citizen $citizen) {
        return ($citizen instanceof Grimes) ? false : true;
    }
}

class Grimes extends Citizen
{
    public function isBuddyWith(Citizen $citizen) {
        return false;
    }
}

class Leonard extends Citizen
{
    public function isBuddyWith(Citizen $citizen) {
        return ($citizen instanceof Simpson) ? true : false;
    }
}

$homer = new Simpson('Homer');
$grimes = new Grimes('Grimes');
$leonard = new Leonard('Leonard');

echo $grimes->isBuddyWith($homer);