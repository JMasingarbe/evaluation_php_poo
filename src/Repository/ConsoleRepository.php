<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Entity\Console;

class ConsoleRepository
{
    //Attribut
    private \PDO $connect;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->connect = (new Mysql)->connectBDD();
    }

    //Méthodes
    /**
     * Méthode qui retourne la liste des consoles (Console)
     * @return array<Console> Retourne le tableau des consoles (Console)
     * @throws \Exception Erreurs SQL
     */
    public function findAllConsoles(): array 
    {
        $consoles = [];

        try {

        $sql = "SELECT c.id, c.name, c.manufacturer FROM console AS c";

        $stmt = $this->connect->prepare($sql);

        $stmt->execute();

        $consoles = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        // Par défaut \PDO::FETCH_ASSOC dans Mysql.php

        // Si on veut utiliser la fonction d'hydratation
        // foreach ($data as $console) {
        //     $consoles[] = Console::hydrate($console);
        // }

        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage(); 
        }

        return $consoles;
    }

    /**
     * Méthode qui retourne la console (Console) qui correspond à un id
     * @return ?Console Retourne une console (Console) si elle existe sinon null
     * @throws \Exception Erreurs SQL
     */
    public function findConsoleById(int $id): ?Console 
    {
        try {

        $sql = "SELECT c.id, c.name, c.manufacturer FROM console AS c
                    WHERE c.id = ?";

        $stmt = $this->connect->prepare($sql);

        $stmt->bindValue(1, $id, \PDO::PARAM_INT);

        $stmt->execute();

        $console = $stmt->fetch(\PDO::FETCH_ASSOC);
        // Par défaut \PDO::FETCH_ASSOC dans Mysql.php

        // On utilise la fonction d'hydratation
        $console = Console::hydrate($console);

        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage(); 
        }

        return $console;
    }
}
