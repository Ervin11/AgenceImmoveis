<?php

namespace App\DataFixtures;

use App\Entity\Offer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 20; $i++)
        {
          $product = new Offer();
          $product->setTitle($faker->words($nb = 3, $asText = true))
                  ->setDescription($faker->sentence)
                  ->setSurface($faker->numberBetween(20, 100))
                  ->setRooms($faker->numberBetween(3, 5))
                  ->setBedrooms($faker->numberBetween(2,3))
                  ->setFloor($faker->numberBetween(0, 4))
                  ->setPrice($faker->numberBetween(500, 1000))
                  ->setHeat($faker->numberBetween(0, 1))
                  ->setCity($faker->city)
                  ->setAddress($faker->streetAddress)
                  ->setPostalCode($faker->postcode)
                  ->setType($faker->numberBetween(0, 1))
                  ->setHabitat($faker->numberBetween(0, 1));

          $manager->persist($product);
        }

        $manager->flush();
    }
}
