<?php

namespace App\DataFixtures;

use App\Entity\Offer;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $user = new User();
        $user->setEmail('admin@admin.com')
             ->setPassword(password_hash('admin', PASSWORD_BCRYPT));

        $manager->persist($user);

        for ($i = 0; $i < 50; $i++)
        {
          $product = new Offer();
          $product->setDescription($faker->sentence)
                  ->setSurface($faker->numberBetween(20, 100))
                  ->setRooms($faker->numberBetween(3, 5))
                  ->setBedrooms($faker->numberBetween(2,3))
                  ->setFloor($faker->numberBetween(0, 4))
                  ->setPrice($faker->numberBetween(500, 1000))
                  ->setHeat($faker->numberBetween(1, 2))
                  ->setCity($faker->city)
                  ->setAddress($faker->streetAddress)
                  ->setPostalCode($faker->postcode)
                  ->setType($faker->numberBetween(1, 2))
                  ->setHabitat($faker->numberBetween(1, 2));

          $manager->persist($product);
        }

        $manager->flush();
    }
}
