<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Repository\ConsoleRepository;
use App\Repository\GameRepository;
use App\Entity\Console;
use App\Entity\Game;
use App\Utils\Tools;
use App\Database\Mysql;
use App\Service\GameService;

class GameController extends AbstractController
{
    //Attributs
    private ConsoleRepository $consoleRepository;
    private GameRepository $gameRepository;
    private GameService $gameService;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->consoleRepository = new ConsoleRepository();
        $this->gameRepository = new GameRepository();
        $this->gameService = new GameService();
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

        // Aujouter un jeu si le formulaire est soumis
        if (isset($_POST["submit"])) {
            $data = $this->gameService->gameForm($_POST);
        }

        return $this->render('add_game', 'Ajouter un jeu', $data ?? []);
    }

    /**
     * Méthode pour afficher la liste des Jeux (Game)
     * @return mixed Retourne le template
     */
    public function showAllGames(): mixed 
    {
        $data = [];
        $games = $this->gameRepository->findAllGames();
        $data["games"] = $games;

        return $this->render('show_all_games', "Tous les jeux", $data ?? []);
    }
}
