<?php 


namespace App\Controller;
use App\Repository\StarshipRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function homepage(StarshipRepository $starshipRepository): Response
    {

        $ships = $starshipRepository->findAll();
        $starshipCount = count($ships);

        $myShip = $ships[array_rand($ships)];

        // $myShip = [
        //     'name' => 'USS LeafyCruiser (NCC-0001)',
        //     'class' => 'Garden',
        //     'captain' => 'Jean-Luc Pickles',
        //     'status' => 'under construction',
        // ];

        return $this->render('main/homepage.html.twig', [
            'numberOfStarships' => $starshipCount,
            'myShip' => $myShip,
            'ships' => $ships,
        ]);
    }
}

?>