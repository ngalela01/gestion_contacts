<?php

namespace App\DataFixtures;
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
        $faker= Factory::create('fr_FR');  // pour generer des donnees aléatoirement en francais
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
                 ->setAvatar("https:/randomuser.me/api/portraits/" .$type . "/$i.jpg");
                 $manager->persist(($contact));
        }
                 
                 $manager->flush();
                }
            }