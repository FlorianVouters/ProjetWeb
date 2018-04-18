<?php

namespace App\DataFixtures;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Media;

class MediaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $media1 = new Media('http://cp.lakanal.free.fr/exercices/jeux/memory/legumes/legumes.png', 'Légumes');
        $manager->persist($media1);

        $media2 = new Media('http://img0.mxstatic.com/wallpapers/238cdfc903a19ad39ea901619dd55d47_large.jpeg', 'Fruits');
        $manager->persist($media2);

        $media3 = new Media('http://cuisine.larousse.fr/lcfilestorage/8A/DA/POIVRON_D_636x380.jpg','Poivron rouge');
        $manager->persist($media3);

        $media4 = new Media('http://www.princedebretagne-pro.com/medias/5114fcd91ae7e.JPG', 'Piment');
        $manager->persist($media4);

        $media5 = new Media('http://www.niffylux.com/image-gratuite/Tomate__7_4b71e7e13f85b.jpg', 'Tomate');
        $manager->persist($media5);

        $media6 = new Media('http://le-mag-de-lea.com/wp-content/uploads/Poivron-vert-11.jpg', 'Poivron vert');
        $manager->persist($media6);

        $media7 = new Media('http://www.boitearecettes.com/fruits_legumes/raisins-6.gif', 'Raisin');
        $manager->persist($media7);

        $media8 = new Media('http://www.orangeclaire.com/images/oce_orange_01.jpg', 'Orange');
        $manager->persist($media8);

        $this->addReference('media1', $media1);
        $this->addReference('media2', $media2);
        $this->addReference('media3', $media3);
        $this->addReference('media4', $media4);
        $this->addReference('media5', $media5);
        $this->addReference('media6', $media6);
        $this->addReference('media7', $media7);
        $this->addReference('media8', $media8);

        $manager->flush();

    }

    public function getOrder()
    {
        return 1;
    }
}