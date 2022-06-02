<?php

namespace App\DataFixtures;

use App\Entity\Post;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $dateTime = new DateTime();

        $post = new Post();
        $post->setTitle('Ah! Sun-flower');
        $post->setDate($dateTime);
        $post->setSubject('Poetry');
        $post->setAuthor('William Blake');
        $post->setBody('Ah! sunflower, weary of time,
        Who countest the steps of the sun,
        Seeking after that sweet golden clime
        Where the traveller\'s journey is done;

        Where the youth pined away with desire,
        And the pale virgin shrouded in snow,
        Arise from their graves and aspire;
        Where my sunflower wishes to go.');
        $post->setImagePath('https://cdn.pixabay.com/photo/2016/08/28/23/18/sunflower-1627179_1280.jpg');
        $manager->persist($post);
        
        $post2 = new Post();
        $post2->setTitle('The Trees');
        $post2->setDate($dateTime);
        $post2->setSubject('Poetry');
        $post2->setAuthor('Philip Larkin');
        $post2->setBody('The trees are coming into leaf
        Like something almost being said;
        The recent buds relax and spread,
        Their greenness is a kind of grief.

        Is it that they are born again
        And we grow old? No, they die too.
        Their yearly trick of looking new
        Is written down in rings of grain.
        
        Yet still the unresting castles thresh
        In fullgrown thickness every May.
        Last year is dead, they seem to say,
        Begin afresh, afresh, afresh.');
        $post2->setImagePath('https://media.istockphoto.com/photos/sunlight-through-tender-green-picture-id472936290?s=612x612');
        $manager->persist($post2);

        $manager->flush();
    }
}
