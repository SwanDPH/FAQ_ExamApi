<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Quetion;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordHasherInterface $motDePassehashe){
        $this->passwordEncoder = $motDePassehashe;
    }
    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i < 3; $i++) {
            $user = new User;
                    if ($i == 1) {
                        $user->setRoles(["ROLE_ADMIN"]);
                    } else {
                        $user->setRoles(["ROLE_USER"]);
                    }
            $user->setUsername("User".$i);
            $MDPhashe = $this->passwordEncoder->hashPassword($user,"user".$i);
            $user->setPassword($MDPhashe);
            $manager->persist($user);
        }

        for ($i=1; $i < 10; $i++) {
            $question = new Quetion;
            $question->setTitre("Question"." - Titre - ".$i);
            $question->setScore(0);
            $question->setDescription("Description de la Question ".$i." xxxLoremIpsum !");

            $manager->persist($question);
        }

        $manager->flush();
    }
}
