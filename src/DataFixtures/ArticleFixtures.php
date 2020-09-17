<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Article;
use App\Entity\Category;

class ArticleFixtures extends Fixture
{
    protected $faker;
    public function load(ObjectManager $manager)
    {
        $this->$faker = Factory::create();
        //Créer 3 catégories fakées
        for($i=1;$i<=3;$i++){
            $category = new Category();
        }
        for($i=1;$i<=10;$i++){
            $article = new Article();
            $article->setTitle("Titre de l'article n°$i")
                    ->setContent("<p>Contenu de l'article n°$i</p>")
                    ->setImage("http://placehold.it/350x150")
                    ->setCreatedAt(new \DateTime());
            $manager->persist($article);
        }
        $manager->flush();
    }
}
