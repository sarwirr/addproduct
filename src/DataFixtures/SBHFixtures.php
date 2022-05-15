<?php

namespace App\DataFixtures;

use App\Entity\SBHArticle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SBHFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');
        // $product = new Product();
        // $manager->persist($product);
        for($i=0;$i<10;$i++){
            $article= new SBHArticle();
            $article->setNom($faker->name);
            $article->setPrix($faker->numberBetween(0,100));
            $manager->persist($article);

        }

        $manager->flush();
    }
}
