<?php
namespace App;
/*----------------------------

Interface Item

----------------------------*/


interface Item
{
    public function getName(): string;
}

/*----------------------------

Class Inventory

----------------------------*/

class Inventory 
{
    private array $items;

    
    public function __construct(array $items) {
        $this->setItems($items);
    }

    private function setItems(array $items): void {
        foreach ($items as $item) {
            ($item instanceof Item) ? array_push($this->items, $item) : throw new Exception("L'élément ajouté n'est pas un item");
        }        
    }
    public function getItemsName(): array {
        $itemsName = [];
        foreach ($this->items as $item) {
            array_push($itemsName, $item->getName());
        }
        return $itemsName;
    }
    
}


class Item1 implements Item
{   
    private string $name;

    public function __construct($name) {
        $this->name = $name;
    }
    public function getName(): string {
        return $this->name;
    }
}
