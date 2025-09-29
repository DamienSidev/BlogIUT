<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $article = new Article();
        $article->setTitle('Article 1');
        $article->setContent('Du contenu pour mon premier article');
        $manager->persist($article);

        $article2 = new Article();
        $article2->setTitle('Article 2');
        $article2->setContent('Du contenu pour mon second article');
        $manager->persist($article2);

        $manager->flush();
    }
}
