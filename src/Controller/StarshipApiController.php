<?php 

namespace App\Controller;

use App\Model\Starship;
use App\Repository\StarshipRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getCollection(StarshipRepository $repository): Response
    {

        // dd($logger);
        // dd($repository);

        $starships = $repository->findAll();

        // $starships = [
        //     new Starship(
        //         1,
        //         'USS LeafyCruiser (NCC-0001)',
        //         'Garden',
        //         'Jean-Luc Pickles',
        //         'taken over by Q'
        //     ),
        //     new Starship(
        //         2,
        //         'USS Espresso (NCC-1234-C)',
        //         'Latte',
        //         'James T. Quick!',
        //         'repaired',
        //     ),
        //     new Starship(
        //         3,
        //         'USS Wanderlust (NCC-2024-W)',
        //         'Delta Tourist',
        //         'Kathryn Journeyway',
        //         'under construction',
        //     ),
        // ];

        // $starships = [
        //     [
        //         'name' => 'USS LeafyCruiser (NCC-0001)',
        //         'class' => 'Garden',
        //         'captain' => 'Jean-Luc Pickles',
        //         'status' => 'taken over by Q',
        //     ],
        //     [
        //         'name' => 'USS Espresso (NCC-1234-C)',
        //         'class' => 'Latte',
        //         'captain' => 'James T. Quick!',
        //         'status' => 'repaired',
        //     ],
        //     [
        //         'name' => 'USS Wanderlust (NCC-2024-W)',
        //         'class' => 'Delta Tourist',
        //         'captain' => 'Kathryn Journeyway',
        //         'status' => 'under construction',
        //     ],
        // ];

        return $this->json($starships);
        
    }

    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function get(int $id, StarshipRepository $repository): Response
    {
        // dd($id);
        $starship = $repository->find($id);

        if (!$starship) {
            throw $this->createNotFoundException('Starship not found');
        }

        return $this->json($starship);
    }
}

?>