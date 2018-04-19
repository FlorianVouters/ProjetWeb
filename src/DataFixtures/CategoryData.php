<?php
namespace App\DataFixtures;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Category;
use App\Entity\Media;

class CategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $categorie1 = new Category();
        $categorie1->setName('Légumes');
        $categorie1->setImage($this->getReference('media1'));
        $manager->persist($categorie1);

        $categorie2 = new Category();
        $categorie2->setName('fruits');
        $categorie2->setImage($this->getReference('media2'));
        $manager->persist($categorie2);

        $this->addReference('categorie1', $categorie1);
        $this->addReference('categorie2', $categorie2);

        $manager->flush();


    }

    public function getOrder()
    {
        return 2;
    }
}