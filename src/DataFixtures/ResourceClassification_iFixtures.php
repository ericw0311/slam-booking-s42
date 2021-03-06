<?php
// App/DataFixtures/ResourceClassification_iFixtures.php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\File;
use App\Entity\User;
use App\Entity\ResourceClassification;

class ResourceClassification_iFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getData() as [$id, $userID, $fileID, $type, $code, $active]) {
            $user = $this->getReference('user-1');
            $file = $this->getReference('file-'.$fileID);
            $resourceClassification = new ResourceClassification($user, $file);
            $resourceClassification->setType($type);
            $resourceClassification->setInternal(true);
            $resourceClassification->setCode($code);
            $resourceClassification->setName($code);
            $resourceClassification->setActive($active);
            $manager->persist($resourceClassification);
            $manager->flush();
            $this->addReference('resourceClassification-'.$id, $resourceClassification);
        }
    }
    private function getData(): array
    {
        return [
        // $data = [$id, $userID, $fileID, $type, $code, $active]
        [6638, 1, 550, 'TOOL', 'COMPUTER', 0],
        [7827, 1, 612, 'PLACE', 'ROOM', 0],
        [7829, 1, 612, 'PLACE', 'HOUSE', 0],
        [7832, 1, 612, 'VEHICLE', 'CAR', 0],
        [7840, 1, 612, 'TOOL', 'COMPUTER', 0],
        [7845, 1, 612, 'SPORT', 'GYMNASIUM', 0],
        [7847, 1, 612, 'USER', 'TEACHER', 0],
        [7877, 1, 614, 'PLACE', 'HOUSE', 0],
        [7880, 1, 614, 'VEHICLE', 'CAR', 0],
        [7891, 1, 614, 'SPORT', 'COURT', 0],
        [7893, 1, 614, 'SPORT', 'GYMNASIUM', 0],
        [2479, 1, 321, 'VEHICLE', 'TRUCK', 1],
        [2483, 1, 321, 'VEHICLE', 'BOAT', 1],
        [2494, 1, 321, 'USER', 'CONTRACTOR', 1],
        [6372, 1, 538, 'VEHICLE', 'PLANE', 1],
        [6708, 1, 555, 'VEHICLE', 'PLANE', 1],
        [7890, 1, 614, 'TOOL', 'PROJECTOR', 1],
    ];
    }

    public function getDependencies()
    {
        return array(FileFixtures::class, UserFixtures::class);
    }
}
