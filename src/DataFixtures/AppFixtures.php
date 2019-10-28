<?php

namespace App\DataFixtures;

use App\Entity\Pays;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

 

class AppFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
{
    $this->encoder = $encoder;
} 
    public function load(ObjectManager $manager)
    {
        //Création d'user admin
         $userAdmin = new User();
         $userAdmin->setEmail('admin@gmail.com');
         $userAdmin->setRoles(['ROLE_ADMIN']);
         $password = $this->encoder->encodePassword($userAdmin, 'pass_4569');
         $userAdmin->setPassword($password);
         $manager->persist($userAdmin);
         $manager->flush();

        //Création d'un user 
        $user=new User();
        $user->setEmail('user@gmail.com');
        $user->setRoles(['ROLE_USER']);
        $password = $this->encoder->encodePassword($user, 'happy-password1');
        $user->setPassword($password);
        $manager->persist($user);
        $manager->flush();

        //Récupération des PAYS
        if (($paysFile = fopen(__DIR__ . "/../../data/ListePays.csv", "r")) !== FALSE){
            while (($data = fgetcsv($paysFile)) !== FALSE){
                $pays = new Pays();
                $pays->setNom($data[0]);
                $manager->persist($pays);
            }
            fclose($paysFile);
        }
        $manager->flush();


    }
}
