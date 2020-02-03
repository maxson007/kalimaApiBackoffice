<?php

namespace App\DataFixtures;

use App\Entity\Theme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data=[
        array(
            'text'=> "J’apprends les bases",
            'icon'=>"../assets/images/screens/theme/base.png"
        ),
            array(
                'text'=> "Se saluer et se présenter",
                'icon'=>"../assets/images/screens/theme/handshake.png"
            ),
            array(
                'text'=> "Demander son chemin",
                'icon'=>"../assets/images/screens/theme/road.png"
            ),
            array(
                'text'=> "Utiliser les transports",
                'icon'=>"../assets/images/screens/theme/taxi.png"
            ),
            array(
                'text'=> "Déclarer sa flamme",
                'icon'=>"../assets/images/screens/theme/give.png"
            ),
            array(
                'text'=> "Commander au restaurant",
                'icon'=>"../assets/images/screens/theme/fast-food.png"
            ),
            array(
                'text'=> "Parler de ses loisirs",
                'icon'=>"../assets/images/screens/theme/sports.png"
            ),
];
        // $product = new Product();
        // $manager->persist($product);

        foreach ($data as $value){

            $theme=new Theme();
            $theme->setIcon($value['icon'])
            ->setLibelle($value['text'])
            ->setName($value['text']);

            $manager->persist($theme);
        }

        $manager->flush();
    }
}
