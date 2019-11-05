<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture {
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder) {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager) {
        $user = new User();
        $user->setEmail('admin@test.com');
        $user->setPassword('$argon2i$v=19$m=65536,t=4,p=1$VjhqanAuOFNIbWtuRnkzVQ$UurJBdCIs0+5VNsG2eBND8hUUU6JKvaCph1Ashs70Is');
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        $manager->flush();
    }
}
