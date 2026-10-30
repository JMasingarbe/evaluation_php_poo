<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Repository\ConsoleRepository;
use App\Repository\GameRepository;
use App\Entity\Console;
use App\Entity\Game;
use App\Utils\Tools;
use App\Database\Mysql;

class GameController extends AbstractController
{
    //Attributs
    private ConsoleRepository $consoleRepository;
    private GameRepository $gameRepository;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->consoleRepository = new ConsoleRepository();
        $this->gameRepository = new GameRepository();
    }

    //Méthodes

    /**
     * Méthode pour ajouter un Jeu (Game)
     * @return mixed Retourne le template
     */
    public function addGame(): mixed 
    {
        // Tableau des données pour la page
        $data = [];
        $consoles = $this->consoleRepository->findAllConsoles();
        $data["consoles"] = $consoles;

        // Aujouter un jeu
        if (isset($_POST["submit"])) {

            if (!empty(trim($_POST["title"]))) {

                if (!empty(trim($_POST["type"]))) {

                    if (!empty($_POST["publish_at"])) {

                        if (!empty(trim($_POST["console"]))) {

                            // Création de l'objet Console qui correspond à l'id console du formulaire
                            $console = $this->consoleRepository->findConsoleById(Tools::sanitize($_POST["console"]));

                            // Création de l'objet Game selon le formulaire
                            $game = new Game(
                                Tools::sanitize($_POST["title"]), 
                                Tools::sanitize($_POST["type"]),
                                new \DateTimeImmutable(Tools::sanitize($_POST["publish_at"])),
                                $console
                            );

                            // Envoie à la bdd le nouveau jeu
                            $game = $this->gameRepository->saveGame($game);

                            if ($game != null) {
                                // Message de réussite
                                $data["valid"] = "Le jeu " . Tools::sanitize($_POST["title"]) . " a bien été enregistré.";
                            } else {
                                $data["errors"] = "Le jeu " . Tools::sanitize($_POST["title"]) . " n'a pas pu être enregistré.";
                            }
                        } else {
                            $data["errors"] = "Veuillez remplir tous les champs.";
                        }
                    } else {
                        $data["errors"] = "Veuillez remplir tous les champs.";
                    }
                } else {
                    $data["errors"] = "Veuillez remplir tous les champs.";
                }
            } else {
                $data["errors"] = "Veuillez remplir tous les champs.";
            }
        }

        return $this->render('add_game', 'Ajouter un jeu', $data ?? []);
    }

    /**
     * Méthode pour afficher la liste des Jeux (Game)
     * @return mixed Retourne le template
     */
    public function showAllGames(): mixed 
    {
        return "template avec la méthode render";
    }
}
