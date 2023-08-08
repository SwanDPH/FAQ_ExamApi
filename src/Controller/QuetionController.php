<?php

namespace App\Controller;

use App\Entity\Quetion;
use App\Form\QuetionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class QuetionController extends AbstractController
{
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    #[Route('/api/down/{quetion}', name: 'app_quetion_score_Down', methods: ["PATCH"])]
    public function downScore(Quetion $quetion, EntityManagerInterface $em): Response
    {

        $scorePrecedent = $quetion->getScore();
        // dd($scorePrecedent);
        $newScore = $scorePrecedent-1;
        // dd($newScore);
        $quetion->setScore($newScore);

        $em->flush();
        return $this->json("Le precedent score etait de ".$scorePrecedent." et le nouveau score est de ".$newScore);
    }

    #[Route('/api/up/{quetion}', name: 'app_quetion_score_Up', methods: ["PATCH"])]
    public function upScore(Quetion $quetion, EntityManagerInterface $em): Response
    {

        $scorePrecedent = $quetion->getScore();
        // dd($scorePrecedent);
        $newScore = $scorePrecedent+1;
        // dd($newScore);
        $quetion->setScore($newScore);

        $em->flush();
        return $this->json("Le precedent score etait de ".$scorePrecedent." et le nouveau score est de ".$newScore);
    }
}
