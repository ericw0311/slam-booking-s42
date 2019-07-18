<?php
// App/DataFixtures/UserFixtures.php
namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        foreach ($this->getOrganisationData() as [$id, $username, $password, $email, $lastName, $firstName, $uniqueName]) {
            $user = new User();
            $user->setAccountType('ORGANISATION');
            $user->setUserName($username);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
            $user->setEmail($email);
            $user->setLastName($lastName);
            $user->setFirstName($firstName);
            $user->setUniqueName($uniqueName);
            $user->setRoles(['ROLE_USER']);
            $manager->persist($user);
            $manager->flush();
            $reference = 'user-'.$id;
            $this->addReference($reference, $user);
        }
    }
    private function getOrganisationData(): array
    {
        return [
        // $userData = [id, username, password, email, lastName, firstName, uniqueName]
        [527, 'PLANNING RTSYS - NEOTEK', 'slam527', 'rtsys@rtsys.fr', 'X', 'X', 'PLANNING RTSYS - NEOTEK'],
        [530, 'neotek@neotek-web.com', 'slam530', 'neotek@neotek-web.com', 'X', 'X', 'NEOTEK'],
        [861, 'ecoledetennis', 'slam861', 'slam-861@slam-booking.net', 'X', 'X', 'Ecole de Tennis'],
        [862, 'entrainementsadultes', 'slam862', 'slam-862@slam-booking.net', 'X', 'X', 'Entrainements Adultes'],
        [1022, 'multimédia-SC', 'slam1022', 'piel.l@moka-sacrecoeur.fr', 'PIEL', 'L', 'Sacré Coeur'],
        [1077, 'ARC', 'slam1077', 'marnaytennis@gmail.com', 'X', 'X', 'ARC-EN-CIEL'],
        [1095, 'aeroclub_de_gray', 'DR340', 'sommerjeanluc@gmail.com', 'SOMMER', 'Jean-Luc', 'aeroclub_de_gray'],
        [1139, 'LePlanB', 'slam1139', 'laure.desconseil@gmail.com', 'DESCONSEIL', 'Laure', 'LePlanB'],
        [1160, 'DOKI', 'slam1160', 'philippe.chenevier@wanadoo.fr', 'CHENEVIER', 'Philippe', 'doki'],
        [1161, 'babou', 'slam1161', 'slam-1161@slam-booking.net', 'X', 'X', 'babou'],
        [1191, 'vajallet', 'VJ27121970', 'mpmaffre@wanadoo.fr', 'X', 'X', 'vajallet'],
        [1192, 'jelagrange', 'slam1192', 'pierre497@infonie.fr', 'X', 'X', 'jelagrange'],
        [1242, 'nidotreppe', 'vO88#~9jn,#{J!XL2Lm5', 'dotreppetoulouse@gmail.com', 'X', 'X', 'nidotreppe'],
        [1405, 'EUSTACHE', 'slam1405', 'slam-1405@slam-booking.net', 'X', 'X', 'EUSTACHE'],
        [1406, 'S_PLOUZENNEC', 'slam1406', 'slam-1406@slam-booking.net', 'X', 'X', 'PLOUZENNEC'],
        [1408, 'bullincharolais', 'slam1408', 'bullincharolais@gmail.com', 'X', 'X', 'bullin'],
        [1416, 'zacetlili', 'massillia1993', 'zacetlili@gmail.com', 'X', 'X', 'Bouchareb'],
        [1418, 'jb', '1479slam', 'jananive79@gmail.com', 'X', 'X', 'jb'],
        [1420, 'scassel', 'slam1420', 'slam-1420@slam-booking.net', 'X', 'X', 'Scassel'],
        [1429, 'ext', 'slam1429', 'slam-1429@slam-booking.net', 'X', 'X', 'ext'],
        [1430, 'crivemale', 'slam1430', 'slam-1430@slam-booking.net', 'X', 'X', 'crivemale'],
        [1475, 'millenium71600', 'slam1475', 'samisilver@hotmail.com', 'X', 'X', 'samisilver'],
        [1505, 'nad71', 'slam1505', 'cabinet.djemaa@gmail.com', 'X', 'X', 'nad'],
        [1507, 'nico', 'slam1507', 'bethycarli@orange.fr', 'X', 'X', 'nicolas'],
        [1546, 'marwa', 'slam1546', 'fly1977@sfr.fr', 'X', 'X', 'lahbaka'],
        [1553, 'mideoliveira', 'slam1553', 'mickael127@hotmail.com', 'X', 'X', 'mideoliveira'],
        [1570, 'Jiminy', 'slam1570', 'xprost@gmail.com', 'X', 'X', 'Zav'],
        [1575, 'celinem', 'slam1575', 'rafclcfinance@gmail.com', 'X', 'X', 'celinem'],
        [1631, 'toutoun007', 'slam1631', 'mamstony71@hotmail.fr', 'X', 'X', 'mams'],
        [1658, 'marwa1', 'slam1658', 'fly1977@orange.fr', 'X', 'X', 'hicham'],
        [1686, 'frkoziol', 'slam1686', 'earl-koziol@wanadoo.fr', 'X', 'X', 'frkoziol'],
        [1692, 'geoliva', 'arpete70', 'zaers@aol.com', 'X', 'X', 'geoliva'],
        [1748, 'rityman', 'slam1748', 'rityman2@gmail.com', 'X', 'X', 'Mirly'],
        [1769, 'Sibille', 'slam1769', 'gabriel.sibille@hotmail.fr', 'X', 'X', 'Flo'],
        [1800, 'bambi15', 'slam1800', 'demirema@hotmail.com', 'X', 'X', 'Bambi15'],
        [1893, 'xahelle', 'slam1893', 'xh3198@gmail.com', 'X', 'X', 'xahelle'],
        [1896, 'mabrocas', 'slam1896', 'thoux32@sfr.fr', 'X', 'X', 'mabrocas'],
        [1897, 'daabadie', 'slam1897', 'd.abadie32@gmail.com', 'X', 'X', 'daabadie'],
        [1906, 'famillegoncalves4', 'slam1906', 'fonctionair@hotmail.com', 'X', 'X', 'famillegoncalves'],
        [1926, 'mf', 'slam1926', 'slam-1926@slam-booking.net', 'X', 'X', 'Maintenance_informatique'],
    ];
    }

	 public function getDependencies()
    {
        return array(UserFixtures_01::class, UserFixtures_02::class, UserFixtures_03::class, UserFixtures_04::class, UserFixtures_05::class,
            UserFixtures_06::class, UserFixtures_07::class, UserFixtures_08::class, UserFixtures_09::class, UserFixtures_10::class, UserFixtures_11::class);
    }
}