<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Entity\Console;
use App\Entity\Game;

class GameRepository
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
     * Méthode qui ajoute une jeu (Game) en BDD
     * @return ?Game
     * @throws \Exception Erreurs SQL
     */
    public function saveGame(Game $game): ?Game {
        try {

            $sql = "INSERT INTO video_game (title, `type`, publish_at, id_console) VALUE (?, ?, ?, ?)";

            $stmt = $this->connect->prepare($sql);
            
            $stmt->bindValue(1, $game->getTitle(), \PDO::PARAM_STR);
            $stmt->bindValue(2, $game->getType(), \PDO::PARAM_STR);
            $stmt->bindValue(3, $game->getPublishAt()->format("Y-m-d"), \PDO::PARAM_STR);
            $stmt->bindValue(4, $game->getConsole()->getId(), \PDO::PARAM_INT);

            $stmt->execute();

            $id = $this->connect->lastInsertId();
            $game->setId($id);

        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage(); 
            return null;
        }

        return $game;
    }
    
    /**
     * Méthode qui retourne la liste des jeux (Game)
     * @return array<Game> Retourne le tableau des jeux (Game)
     * @throws \Exception Erreurs SQL
     */
    public function findAllGames(): ?array 
    {
        try {

            $sql = "SELECT vg.title, vg.type, vg.publish_at, c.name FROM video_game AS vg
                        INNER JOIN console AS c ON c.id = vg.id_console";

            $stmt = $this->connect->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll();

        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage(); 
            return null;
        }

        return $data;
    }
}