<?php

namespace App\Entity;

class Console
{
    //Attributs
    private ?int $id = null;
    private string $name;
    private string $manufacturer;

    //Constructeur
    public function __construct(
        string $name,
        string $manufacturer
    )
    {
        $this->name = $name;
        $this->manufacturer = $manufacturer;
    }

    //Getters et Setters
    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    
    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }
    public function setManufacturer(string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }
    
    // Hydratation
    public static function hydrate(array $data): Console
    {
        $console = new Console($data["name"], $data["manufacturer"]);

        $console->setId($data["id"]);

        // Retourner un objet Console
        return $console;
    }
}
