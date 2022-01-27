<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use App\Entity\Categorie;
use App\Entity\Realisation;
use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder=$encoder;
    }
    public function load(ObjectManager $manager): void
    {
        //utilisation de faker
        $faker = Factory::create('fr_FR');

        // creation d'un utilisteur
        $user= new User();

        $user->setEmail('user@test.com')
            ->setPrenom($faker->firstName())
            ->setNom($faker->lastName())
            ->setTelephone($faker->phoneNumber())
            ->setAPropos($faker->text())
            ->setInstagram('instagram');
        $password= $this->encoder->hashPassword($user, 'password');
        $user->setPassword($password);
        $manager->persist($user);

        // creation de 10 blogpost
        for ($i=0; $i<10; $i++) {
            $blogpost= new BlogPost();
            $blogpost->setTitre($faker->word(3, true))
                    ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                    ->setContenu($faker->text(350))
                    ->setSlug($faker->slug(3))
                    ->setUser($user);
            $manager->persist($blogpost);
        }

        //Création des catégories
        for ($i=0; $i <5 ; $i++) {
            # code...
            $categorie=new Categorie();
            $categorie->setNom($faker->word())
            ->setDescription($faker->word(10, true))
            ->setSlug($faker->slug());
            $manager->persist(($categorie));
            for ($j=0; $j <2 ; $j++) {
                # code...
                $realisation=new Realisation();
                $realisation->setNom($faker->word())
                ->setDescription($faker->text())
                ->setPortfolio($faker->randomElement([true, false]))
                ->setSlug($faker->slug())
                ->setFile('img/plachelder.jpeg')
                ->addCategorie($categorie)
                ->setUser($user)
                ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                ->setDateRealisation($faker->dateTimeBetween('-6 month', 'now'));
                $manager->persist(($realisation));
            }
        }

        $manager->flush();
    }
}
