<?php
// App/DataFixtures/UserFixtures.php
namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
class UserFixtures_10 extends Fixture
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
        [1981, 'PEYREGNE', 'slam1981', 'slam-1981@slam-booking.net', 'PEYREGNE', 'X'],
        [1984, 'gontrand02', 'slam1984', 'slam-1984@slam-booking.net', 'COULET', 'Gontrand'],
        [1985, 'Baptou28', 'slam1985', 'b.martin2810@icloud.com', 'MARTIN', 'Baptiste'],
        [1986, 'KEVINTENNIS', 'slam1986', 'kevin.marsot@orange.fr', 'MARSOT', 'Kevin'],
        [1987, 'arbartels', 'slam1987', 'arnd.b@rtels.eu', 'ARND', 'B'],
        [1988, 'pibartels', 'Louvetaux31', 'pierre.bartels@hotmail.fr', 'BARTELS', 'Pierre'],
        [1989, 'jebascou', 'SteFoy31', 'jean-jacques.bascou@orange.fr', 'BASCOU', 'Jean-jacques'],
        [1990, 'jecazelles', 'slam1990', 'cazelles.jeanphilippe@gmail.com', 'CAZELLES', 'Jeanphilippe'],
        [1991, 'tennisarcenciel', 'slam1991', 'sebastiao.nunesdasilva@hotmail.fr', 'NUNESDASILVA', 'Sebastiao'],
        [1992, 'sdesbrosses', 'slam1992', 'sdesbrosses@bouyer-leroux.fr', 'DESBROSSES', 'Stéphane'],
        [1993, 'LESAUSSE.G', 'slam1993', 'slam-1993@slam-booking.net', 'LESAUSSE', 'G'],
        [1994, 'EBHENGA.A', 'slam1994', 'slam-1994@slam-booking.net', 'EBHENGA', 'A'],
        [1995, 'AudelineEscande', 'slam1995', 'slam-1995@slam-booking.net', 'ESCANDE', 'Audeline'],
        [1998, 'rathierquentin71@gmail.com', 'slam1998', 'rathierquentin71@gmail.com', 'RATHIER', 'Quentin'],
        [1999, 'WilfriedDozeville', 'slam1999', 'slam-1999@slam-booking.net', 'DOZEVILLE', 'Wilfried'],
        [2000, 'CarolineBaskaya', 'slam2000', 'slam-2000@slam-booking.net', 'BASKAYA', 'Caroline'],
        [2001, 'AntoineDigout', 'slam2001', 'slam-2001@slam-booking.net', 'DIGOUT', 'Antoine'],
        [2002, 'JérômeDuchanoy', 'slam2002', 'slam-2002@slam-booking.net', 'DUCHANOY', 'Jérôme'],
        [2003, 'NathalieSoulages', 'slam2003', 'slam-2003@slam-booking.net', 'SOULAGES', 'Nathalie'],
        [2004, 'PaulineCurtan', 'slam2004', 'slam-2004@slam-booking.net', 'CURTAN', 'Pauline'],
        [2005, 'legemble', 'slam2005', 'slam-2005@slam-booking.net', 'LE GEMBLE', 'X'],
        [2006, 'CoralieDavid', 'slam2006', 'slam-2006@slam-booking.net', 'DAVID', 'Coralie'],
        [2008, 'pchetivet1', 'slam2008', 'slam-2008@slam-booking.net', 'CHETIVET', 'Philippe'],
        [2009, 'saudade69@laposte.net', 'slam2009', 'saudade69@laposte.net', 'SANTOS', 'Philippe'],
        [2010, 'JeanbaptisteBeis', 'slam2010', 'slam-2010@slam-booking.net', 'BAPTISTE', 'Jean'],
        [2011, 'FlorenceFortin', 'slam2011', 'slam-2011@slam-booking.net', 'FORTIN', 'Florence'],
        [2012, 'OlivierGourbinot', 'slam2012', 'slam-2012@slam-booking.net', 'GOURBINOT', 'Olivier'],
        [2013, 'davidgeorge@free.fr', 'slam2013', 'davidgeorge@free.fr', 'GEORGE', 'David'],
        [2014, 'AlainRavayrol', 'slam2014', 'slam-2014@slam-booking.net', 'RAVAYROL', 'Alain'],
        [2015, 'fredferies3@gmail.com', 'slam2015', 'fredferies3@gmail.com', 'FERIES', 'Fred'],
        [2017, 'AlexisDurandJeansson', 'slam2017', 'slam-2017@slam-booking.net', 'DURANDJEANSSON', 'Alexis'],
        [2019, 'mouilhaud.sylvain@bbox.fr', 'slam2019', 'mouilhaud.sylvain@bbox.fr', 'MOUILHAUD', 'Sylvain'],
        [2020, 'lea.bruss@laposte.net', 'slam2020', 'lea.bruss@laposte.net', 'BRUSS', 'Lea'],
        [2021, 'AnneBenoit', 'slam2021', 'slam-2021@slam-booking.net', 'BENOIT', 'Anne'],
        [2022, 'olivierdalmais@hotmail.com', 'slam2022', 'olivierdalmais@hotmail.com', 'DALMAIS', 'Olivier'],
        [2023, 'FabiolaSimon', 'slam2023', 'slam-2023@slam-booking.net', 'SIMON', 'Fabiola'],
        [2025, 'vero_tournillon@hotmail.com', 'slam2025', 'vero_tournillon@hotmail.com', 'TOURNILLON', 'Véronique'],
        [2026, 'JeromedHurlaborde', 'slam2026', 'slam-2026@slam-booking.net', 'D\'HURLABORDE', 'Jérôme'],
        [2027, 'NicolasVilla', 'slam2027', 'slam-2027@slam-booking.net', 'VILLA', 'Nicolas'],
        [2028, 'chassad', 'slam2028', 'cherif.assad@nxp.com', 'ASSAD', 'Cherif'],
        [2030, 'cleberre@rtsys.fr', 'slam2030', 'cleberre@rtsys.fr', 'LE BERRE', 'C'],
        [2031, 'herve.ribeiro@outlook.fr', 'slam2031', 'herve.ribeiro@outlook.fr', 'RIBEIRO', 'Herve'],
        [2032, 'stephanie.ribeiro@outlook.fr', 'slam2032', 'stephanie.ribeiro@outlook.fr', 'RIBEIRO', 'Stephanie'],
        [2033, 'FranckCornaz', 'slam2033', 'slam-2033@slam-booking.net', 'CORNAZ', 'Franck'],
        [2034, 'FILLON', 'slam2034', 'tfillon@rtsys.fr', 'FILLON', 'Thomas'],
        [2035, 'MathildeVukovic', 'slam2035', 'slam-2035@slam-booking.net', 'VUKOVIC', 'Mathilde'],
        [2036, 'AntoninCherbonnier', 'slam2036', 'slam-2036@slam-booking.net', 'CHERBONNIER', 'Antonin'],
        [2037, 'nivarin', 'slam2037', 'nicolasvarin@hotmail.com', 'VARIN', 'Nicolas'],
        [2038, 'lavie', 'slam2038', '761.famillevie@gmail.com', 'LAVIE', 'X'],
        [2039, 'jathiers', 'slam2039', 'jacli@hotmail.fr', 'JATHIERS', 'X'],
    ];
    }
}