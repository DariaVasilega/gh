<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\User;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 100; $i++) {
            $product = new Product();
            $product->setName('product '.$i);
            $product->setPrice(mt_rand(10, 100));
            $product->setTitle('asdsa');
            $manager->persist($product);
        }

        for ($i = 0; $i < 30; $i++) {
            $category = new Category();
            $category ->setName('category' .$i);
            $manager->persist($category);
        }

        for ($i = 0; $i < 5; $i++){
            $user = new User();
            $user->setName('user' .$i);
            $user->setAge('123');
            $user->setFavoriteProducts('dasdasd');
            $user->setEmail('dass@dasd.com');
            $manager->persist($user);
        }
        $manager->flush();
    }
}
