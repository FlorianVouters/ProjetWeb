<?php
namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Product;

class ProductData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $produit1 = new Product();
        $produit1->setCategory($this->getReference('categorie1'));
        $produit1->setDescription("Le poivron rouge est un groupe de cultivars de l'espèce Capsicum annuum.");
        $produit1->setImage($this->getReference('media3'));
        $produit1->setName('Poivron rouge');
        $produit1->setPrice('1.99');
        $manager->persist($produit1);

        $produit2 = new Product();
        $produit2->setCategory($this->getReference('categorie1'));
        $produit2->setDescription("Piment est généralement associé à la saveur du piquant (pimenté).");
        $produit2->setImage($this->getReference('media4'));
        $produit2->setName('Piment');
        $produit2->setPrice('3.99');
        $manager->persist($produit2);

        $produit3 = new Product();
        $produit3->setCategory($this->getReference('categorie1'));
        $produit3->setDescription("La tomate est une espèce de plantes herbacées de la famille des Solanacées, originaire du nord-ouest de l'Amérique du Sud.");
        $produit3->setImage($this->getReference('media5'));
        $produit3->setName('Tomate');
        $produit3->setPrice('0.99');
        $manager->persist($produit3);

        $produit4 = new Product();
        $produit4->setCategory($this->getReference('categorie1'));
        $produit4->setDescription("Le poivron vert est un groupe de cultivars de l'espèce Capsicum annuum.");
        $produit4->setImage($this->getReference('media6'));
        $produit4->setName('Poivron vert');
        $produit4->setPrice('2.99');
        $manager->persist($produit4);

        $produit5 = new Product();
        $produit5->setCategory($this->getReference('categorie2'));
        $produit5->setDescription("Le raisin est le fruit de la Vigne. Le raisin de la vigne cultivée Vitis vinifera est un des fruits les plus cultivés au monde, avec 68 millions de tonnes produites en 2010.");
        $produit5->setImage($this->getReference('media7'));
        $produit5->setName('Raisin');
        $produit5->setPrice('0.97');
        $manager->persist($produit5);

        $produit6 = new Product();
        $produit6->setCategory($this->getReference('categorie2'));
        $produit6->setDescription("L’orange est un agrume, fruit des orangers, des arbres de différentes espèces de la famille des Rutacées ou d'hybrides de ceux-ci.");
        $produit6->setImage($this->getReference('media8'));
        $produit6->setName('Orange');
        $produit6->setPrice('1.20');
        $manager->persist($produit6);

        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }
}