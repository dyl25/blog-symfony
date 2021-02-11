<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $author = $this
        ->getDoctrine()
        ->getRepository(User::class)
        ->find(1);

        for($i = 0; $i < 19; $i++) {
            $article = new Article();

            $article->setTitle('Article num ' . $i);
            $article->setContent('Lorem ipsum dolor es Lorem ipsum dolor esLorem ipsum dolor esLorem ipsum dolor esLorem ipsum dolor es');
            $article->setUser($author);

            $manager->persist($article);
        }

        $manager->flush();
    }
}
