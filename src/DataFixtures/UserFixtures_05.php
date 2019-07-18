<?php
// App/DataFixtures/UserFixtures.php
namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
class UserFixtures_05 extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        foreach ($this->getIndividualData() as [$id, $username, $password, $email, $lastName, $firstName]) {
            $user = new User();
            $user->setAccountType('INDIVIDUAL');
            $user->setUserName($username);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
            $user->setEmail($email);
            $user->setLastName($lastName);
            $user->setFirstName($firstName);
            $user->setRoles(['ROLE_USER']);
            $manager->persist($user);
            $manager->flush();
            $reference = 'user-'.$id;
            $this->addReference($reference, $user);
        }
    }
    private function getAdministratorData(): array
    {
        return [
        // $userData = [id, username, password, email, lastName, firstName]
[1, 'eric', 'eric', 'eric.willard@slam-booking.net', 'WILLARD', 'Eric'],
    ];
    }
    private function getIndividualData(): array
    {
        return [
        // $userData = [id, username, password, email, lastName, firstName]
        [1403, 'cromonguy@gmail.com', 'slam1403', 'cromonguy@gmail.com', 'CROZET', 'Guy'],
        [1409, 'ludange', 'slam1409', 'ludovine.bullin@gmail.com', 'BONNET', 'Ludovine'],
        [1410, 'Vincent D', 'slam1410', 'vincentdbv@hotmail.fr', 'D', 'Vincent'],
        [1411, 'tazyannick', 'slam1411', 'tazyannick@yahoo.fr', 'TAZY', 'Annick'],
        [1412, 'gaetan', 'slam1412', 'gaetan.mitanchez@6-incendie.eu', 'MITANCHEZ', 'Gaetan'],
        [1413, 'robinyacout', 'slam1413', 'robin.yacout@gmail.com', 'YACOUT', 'Robin'],
        [1414, 'fabien dufour', 'slam1414', 'faduf@hotmail.fr', 'DUF', 'Fabien'],
        [1431, 'ejames', 'slam1431', 'slam-1431@slam-booking.net', 'JAMES', 'E'],
        [1433, 'edelon', 'slam1433', 'slam-1433@slam-booking.net', 'DELON', 'Eric'],
        [1434, 'lleroy', 'slam1434', 'slam-1434@slam-booking.net', 'LEROY', 'Luc'],
        [1435, 'ysouyris', 'slam1435', 'slam-1435@slam-booking.net', 'SOUYRIS', 'Yann'],
        [1436, 'sbenello', 'slam1436', 'slam-1436@slam-booking.net', 'BENELLO', 'Sylvie'],
        [1437, 'pmahauden', 'slam1437', 'slam-1437@slam-booking.net', 'MAHAUDEN', 'Pierre'],
        [1438, 'ncouffin', 'slam1438', 'slam-1438@slam-booking.net', 'COUFFIN', 'Nicole'],
        [1441, 'mcollet', 'slam1441', 'slam-1441@slam-booking.net', 'COLLET', 'Mélanie'],
        [1442, 'valentinbaligand', 'slam1442', 'valentinbaligand@gmail.com', 'BALIGAND', 'Valentin'],
        [1443, 'guillaumedesbourbes', 'slam1443', 'dessg71@hotmail.fr', 'DESBOURBES', 'Guillaume'],
        [1444, 'gerardmensoif', 'slam1444', 'clement.garraud@gmail.com', 'GARRAUD', 'Clement'],
        [1445, 'jc71', 'slam1445', 'gordatjc@gmail.com', 'GORDAT', 'J-C'],
        [1446, 'levieuxmichel', 'slam1446', 'michel.levieux199@orange.fr', 'LEVIEUX', 'Michel'],
        [1447, 'thierry71', 'slam1447', 'thierry.malosse@free.fr', 'MALOSSE', 'Thierry'],
        [1448, 'marius71600', 'slam1448', 'boucherie71600@gmail.com', 'PAUTONNIER', 'Marius'],
        [1449, 'aubretdavid', 'slam1449', 'david.aubret71@gmail.com', 'AUBRET', 'David'],
        [1450, 'bernardchristophe', 'slam1450', 'coco71160@msn.com', 'BERNARD', 'Christophe'],
        [1451, 'deguinsylvain', 'slam1451', 'sylvaind71@gmail.com', 'DEGUIN', 'Sylvain'],
        [1452, 'duliegebenoit', 'slam1452', 'bduliege@etu.isara.fr', 'DULIEGE', 'Benoit'],
        [1453, 'simonpacaud', 'slam1453', 'simonpacaud@hotmail.fr', 'PACAUD', 'Simon'],
        [1454, 'pab71', 'slam1454', 'pab71@hotmail.fr', 'BAUDOUX', 'Pierre-Antoine'],
        [1457, 'franckney', 'Salsa0707', 'franck.ney@gmail.com', 'NEY', 'Franck'],
        [1459, 'flothibert', 'slam1459', 'flo.thibert@gmail.com', 'THIBERT', 'Florent'],
        [1460, 'fableggieri', 'slam1460', 'fableggieri@hotmail.com', 'LEGGIERI', 'Fabien'],
        [1462, 'f2bo@hotmail.fr', 'slam1462', 'f2bo@hotmail.fr', 'DEBAUD', 'Florent'],
        [1464, 'bourgeong', 'slam1464', 'guillaume.bourgeon@laposte.net', 'BOURGEON', 'Guillaume'],
        [1468, 'jordan0411', 'slam1468', 'jordan0411@hotmail.fr', 'JORDAN', 'Martin'],
        [1471, 'louis1990', 'slam1471', 'louisdemontgrand@me.com', 'DE MONTGRAND', 'Louis'],
        [1474, 'ludovic7193', 'slam1474', 'ludovic.champet@free.fr', 'CHAMPET', 'Ludovic'],
        [1476, 'franckfourrier', 'slam1476', 'samislever@hotmail.com', 'FOURRIER', 'Franck'],
        [1477, 'jacky', 'slam1477', 'brigitte.mamessier@orange.fr', 'MAMESSIER', 'Jacky'],
        [1478, 'anthonycollodin', 'slam1478', 'anthony.collodin@orange.fr', 'ANTHONY', 'Collodin'],
        [1479, 'jllapandry', 'slam1479', 'jean-luc.lapandry@terreal.com', 'LAPANDRY', 'Jean-luc'],
        [1483, 'joaophil ', 'slam1483', 'joaophil@wanadoo.fr', 'MARTIN', 'Jean-Philippe'],
        [1485, 'damien', 'slam1485', 'damienbuchet01@gmail.com', 'BUCHET', 'Damien'],
        [1486, 'rachelheintz', 'slam1486', 'heintz.rachel@wanadoo.fr', 'HEINTZ', 'Rachel'],
        [1487, 'florians', 'slam1487', 'f.sivignon@hotmail.fr', 'SIVIGNON', 'Florian'],
        [1488, 'fabienc', 'slam1488', 'fab.combaluzier@gmail.com', 'COMBALUZIER', 'Fabien'],
        [1489, 'fchevrot', 'slam1489', 'fchevrot67@gmail.com', 'CHEVROT', 'Franck'],
        [1490, 'jtramoy', 'slam1490', 'jeremy.tramoy@gmail.com', 'TRAMOY', 'Jeremy'],
        [1496, 'dorineR', 'slam1496', 'raydorine@gmail.com', 'RAY', 'Dorine'],
        [1497, 'sebastienp', 'slam1497', 'seb.poll@hotmail.fr', 'POLLIER', 'Sebastien'],
        [1499, 'melaniet', 'slam1499', 'turland.melanie@neuf.fr', 'TURLAND', 'Melanie'],
   ];
    }
}