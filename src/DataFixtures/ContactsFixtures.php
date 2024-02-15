<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Faker\Factory;
use App\Entity\Contacts;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

use function PHPSTORM_META\type;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // $product = new Product();
        // $manager->persist($product);
        $categories=["Privé","Sport","Professionnel"];
        $faker= Factory::create('fr_FR');  // pour generer des donnees aléatoirement en francais
        $categories=[];

        
        $categorie=new Categorie();
        $categorie->setLibelle("Sport")
                      ->setimage("/asset/img/img_categorie/img_sport.jpg")
                      ->setDescription($faker->sentence((50)));

        $manager->persist(($categorie));
        $categories[]=$categorie;              


        $categorie=new Categorie();
            $categorie->setLibelle("professionnel")
                      ->setimage("/asset/img/img_categorie/img_professionnel.jpg")
                      ->setDescription($faker->sentence((50)));
            $manager->persist($categorie);
            $categories[]=$categorie; 
            
        $categorie=new Categorie();
        $categorie->setLibelle("Privé")
              ->setimage("/asset/img/img_categorie/img_prive.jpg")
              ->setDescription($faker->sentence((50)));

              $manager->persist(($categorie));
              $categories[]=$categorie; 


        
        $genres=["male","female"];
               
        for($i=0;$i<100;$i++)
        {
                $sexe=mt_rand(0,1);
            if  ($sexe==0){
                $type="men";
            }else{
                $type="women";}
            $contact=new contacts();
            
            $contact ->setNom($faker->lastname())
                    ->setPrenom($faker->firstName($genres[$sexe]))
                    ->setRue($faker->streetAddress())
                    ->setCp($faker->numberBetween(33000,75000))
                    ->setVille($faker->city())
                    ->setMail($faker->email())
                    ->setSexe($sexe)
                    ->setCategorie($categories[mt_rand(0,2)])
                    ->setAvatar("https:/randomuser.me/api/portraits/" .$type . "/$i.jpg");
            $manager->persist($contact);
                    
        }
                 
                 $manager->flush();
    }
 }