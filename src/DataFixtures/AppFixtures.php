<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager  $manager)
    {

        $blogPost = new BlogPost();
        // create 20 $blogPost! Bam!
        for ($i = 0; $i < 20; $i++) {
            $blogPost = new BlogPost();
            $blogPost->setTitle('Post '.$i);
            $blogPost->setAuthor(mt_rand(10, 100));
            $blogPost->setSlug(mt_rand(10, 100));
//            $blogPost->setPublished($this->addTime($i));
            $blogPost->setPublished(self::addTime($i));
            $manager->persist($blogPost);
        }
        $manager->flush();
    }


    /**
     * @param int $i
     * @return \DateTime
     */
    public function addTime(int $i)
    {
        $date =new \DateTime('now +'.$i .'min');
        $date->add(new \DateInterval('PT1H'));
        return $date;
    }
}
