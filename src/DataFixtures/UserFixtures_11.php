<?php
// App/DataFixtures/UserFixtures.php
namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
class UserFixtures_11 extends Fixture
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
    private function getIndividualData(): array
    {
        return [
        // $userData = [id, username, password, email, lastName, firstName]
        [2041, 'AnnRenson', 'slam2041', 'slam-2041@slam-booking.net', 'RENSON', 'Ann'],
        [2042, 'MariegabrielleGriboul', 'slam2042', 'slam-2042@slam-booking.net', 'GRIBOUL', 'Marie-Gabrielle'],
        [2043, 'ophelie.salvador@gmail.com', 'slam2043', 'ophelie.salvador@gmail.com', 'SALVADOR', 'Ophelie'],
        [2044, 'MarioMalafosse', 'slam2044', 'slam-2044@slam-booking.net', 'MALAFOSSE', 'Mario'],
        [2047, 'SergeUrzainqui', 'slam2047', 'slam-2047@slam-booking.net', 'URZAINQUI', 'Serge'],
        [2048, 'LE_BELLER', 'slam2048', 'slam-2048@slam-booking.net', 'LE BELLER', 'Yoann'],
        [2049, 'NicolasHillion', 'slam2049', 'slam-2049@slam-booking.net', 'HILLION', 'Nicolas'],
        [2050, 'ENAULT', 'slam2050', 'slam-2050@slam-booking.net', 'ENAULT', 'Christophe'],
        [2051, 'COURANGE', 'slam2051', 'courdierangelique@hotmail.fr', 'COURDIER', 'Angelique'],
        [2052, 'Maé', 'slam2052', 'franckcrespo@hotmail.fr', 'CRESPO', 'Mae'],
        [2053, 'OlivierRascol', 'slam2053', 'slam-2053@slam-booking.net', 'RASCOL', 'Olivier'],
        [2054, 'RoseDoyle', 'slam2054', 'slam-2054@slam-booking.net', 'DOYLE', 'Rose'],
        [2057, 'baffait.n', 'slam2057', 'slam-2057@slam-booking.net', 'BAFFAIT', 'N'],
        [2058, 'vivienmoison.v', 'slam2058', 'slam-2058@slam-booking.net', 'VIVIENMOISON', 'V'],
        [2059, 'hardy.e', 'slam2059', 'slam-2059@slam-booking.net', 'HARDY', 'E'],
        [2060, 'desriac.p', 'slam2060', 'slam-2060@slam-booking.net', 'DESRIAC', 'P'],
        [2061, 'lemaitre.j', 'slam2061', 'slam-2061@slam-booking.net', 'LEMAITRE', 'J'],
        [2062, 'nole.novakovic75@gmail.com', 'slam2062', 'nole.novakovic75@gmail.com', 'NOVAKOVIC', 'Nole'],
        [2063, 'AnneHarris', 'slam2063', 'slam-2063@slam-booking.net', 'HARRIS', 'Anne'],
        [2065, 'javelier.l', 'slam2065', 'slam-2065@slam-booking.net', 'JAVELIER', 'L'],
        [2066, 'lecutiez.m', 'slam2066', 'slam-2066@slam-booking.net', 'LECUTIEZ', 'M'],
        [2067, 'delabourdonnaye.s', 'slam2067', 'slam-2067@slam-booking.net', 'DE LA BOURDONNAYE', 'S'],
        [2068, 'omnes.l', 'slam2068', 'slam-2068@slam-booking.net', 'OMNES', 'L'],
    ];
    }
}