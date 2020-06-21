<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use App\Entity\Media;
use App\Entity\Reference;
use App\Entity\Skill;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixturesAll extends Fixture
{
    private $userPasswordEncoder;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }


    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setPassword($this->userPasswordEncoder->encodePassword($admin, 'password'))
            ->setEmail('admin@email.com')
            ->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        for ($i = 1; $i <= 5; $i++) {
            $media = new Media();
            $media->setPath('uploads/image.png');

            $reference = new Reference();
            $reference->setTitle('Référence ' . $i)
                ->setCompany('Company ' . $i)
                ->setDescription('Description ' . $i)
                ->setStartedAt(new DateTimeImmutable('5 years ago'))
                ->setEndedAt(new DateTimeImmutable('3 years ago'))
                ->addMedia($media);
            $manager->persist($reference);

            $skill = new Skill();
            $skill->setLevel(rand(1, 8))
                ->setName('Skill ' . $i);
            $manager->persist($skill);

            $formation = new Formation();
            $formation->setGradeLevel(rand(1, 5))
                ->setName('Formation ' . $i)
                ->setSchool('School ' . $i)
                ->setDescription('Description ' . $i)
                ->setStartedAt(new DateTimeImmutable('5 years ago'))
                ->setEndedAt(new DateTimeImmutable('3 years ago'));
            $manager->persist($formation);
        }


        $manager->flush();
    }
}
