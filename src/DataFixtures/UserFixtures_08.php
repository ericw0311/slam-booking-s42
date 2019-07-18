<?php
// App/DataFixtures/UserFixtures.php
namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
class UserFixtures_08 extends Fixture
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
        [1759, 'melaniefeytie@yahoo.fr', 'slam1759', 'melaniefeytie@yahoo.fr', 'FEYTIE', 'Mélanie'],
        [1764, 'py.campion@gmail.com', 'slam1764', 'py.campion@gmail.com', 'CAMPION', 'Pierre-yves'],
        [1767, 'fgseve@icloud.com', 'slam1767', 'fgseve@icloud.com', 'FETTIG', 'Séverine'],
        [1768, 'NOVAK', 'slam1768', 'eilvys70@franc-comtois.fr', 'DJOKOVIC', 'Novak'],
        [1773, 'geoffreys', 'slam1773', 'geoffrey.setan@gmail.com', 'SETAN', 'Geoffrey'],
        [1774, 'charmypi', 'slam1774', 'arthurlavocat@hotmail.fr', 'LAVOCAT', 'Arthur'],
        [1775, 'racso1997', 'slam1775', 'oscar.lefort@hotmail.fr', 'LEFORT', 'Oscar'],
        [1777, 'Montmessin', 'slam1777', 'eva-montmessin@orange.fr', 'MONTMESSIN', 'Eva'],
        [1778, 'Nellyfchloe', 'slam1778', 'nelly_loiret@hotmail.fr', 'FRITZSCH', 'Chloe'],
        [1779, 'Baloo', 'slam1779', 'nadineboh1@orange.fr', 'BOHIN', 'Jeanne'],
        [1780, 'Fanny GAIFFE', '2812', 'fanny.gaiffe@hotmail.fr', 'GAIFFE', 'Fanny'],
        [1781, 'DE BRITO romain', 'slam1781', 'romain.debrito@gmail.com', 'DE BRITO', 'Romain'],
        [1782, 'florence', 'slam1782', 'florence71d@hotmail.fr', 'D', 'Florence'],
        [1783, 'arduc', 'slam1783', 'arletteduc.ricard@gmail.com', 'DUC RICARD', 'Arlette'],
        [1787, 'xizard@rtsys.fr', 'slam1787', 'xizard@rtsys.fr', 'IZARD', 'X'],
        [1791, 'Piedaterre', 'slam1791', 'slam-1791@slam-booking.net', 'PIEDATERRE', 'X'],
        [1795, 'seroze', 'dragon07', 'sebroze@aliceadsl.fr', 'ROZE', 'Seb'],
        [1801, 'mblanc', 'slam1801', 'slam-1801@slam-booking.net', 'BLANC', 'Marika'],
        [1804, 'NICOLAS Catherine', 'slam1804', 'slam-1804@slam-booking.net', 'NICOLAS', 'Catherine'],
        [1806, 'tatch01@hotmail.fr', 'slam1806', 'tatch01@hotmail.fr', 'VAN QUANG', 'Nguyen'],
        [1807, 'thomasphan69120@gmail.com', 'slam1807', 'thomasphan69120@gmail.com', 'PHAN', 'Thomas'],
        [1808, 'heameziane', 'slam1808', 'herve.ameziane@ac-toulouse.fr', 'AMEZIANE', 'Herve'],
        [1809, 'savrancken', 'slam1809', 'sarah.vrancken@googlemail.com', 'VRANCKEN', 'Sarah'],
        [1812, 'sambaumann@yahoo.fr', 'slam1812', 'sambaumann@yahoo.fr', 'BAUMANN', 'Samuel'],
        [1816, 'MarkKoenig', 'slam1816', 'slam-1816@slam-booking.net', 'KOENIG', 'Mark'],
        [1817, 'Zabou', 'slam1817', 'isamymy@hotmail.fr', 'LANDRIEU', 'Isabelle'],
        [1818, 'jc.aulas@free.fr', 'slam1818', 'jc.aulas@free.fr', 'AULAS', 'J-christophe'],
        [1819, 'Damien Bailly', 'slam1819', 'damien.bailly@orange.fr', 'BAILLY', 'Damien'],
        [1820, 'robin.stefanetti@orange.fr', 'slam1820', 'robin.stefanetti@orange.fr', 'STEFANETTI', 'Robin'],
        [1824, 'mathilderey101187', 'slam1824', 'matmoon@hotmail.fr', 'REY', 'Mathilde'],
        [1827, 'JulieFay', 'slam1827', 'slam-1827@slam-booking.net', 'FAY', 'Julie'],
        [1828, 'EricZapata', 'slam1828', 'slam-1828@slam-booking.net', 'ZAPATA', 'Eric'],
        [1829, 'gamet romain', 'slam1829', 'romain.gamet@sfr.fr', 'GAMET', 'Romain'],
        [1832, 'pchene@rtsys.fr', 'slam1832', 'pchene@rtsys.fr', 'CHENE', 'P'],
        [1833, 'adrienc', 'slam1833', 'adriencuffaro@live.fr', 'CUFFARO', 'Adrien'],
        [1836, 'HeleneHeuillet', 'slam1836', 'slam-1836@slam-booking.net', 'HEUILLET', 'Hélène'],
        [1841, 'AnneJourdain', 'slam1841', 'slam-1841@slam-booking.net', 'JOURDAIN', 'Anne'],
        [1842, 'HeleneMerlin', 'slam1842', 'slam-1842@slam-booking.net', 'MERLIN', 'Hélène'],
        [1844, 'guroux', 'toulouse01', 'rouxguillaume@wanadoo.fr', 'ROUX', 'Guillaume'],
        [1847, 'guchevalier', '.LeMonde67!', 'guilhem.chevalier@free.fr', 'CHEVALIER', 'Guilhem'],
        [1848, 'MichelAssenbaum', 'slam1848', 'slam-1848@slam-booking.net', 'ASSENBAUM', 'Michel'],
        [1852, 'frbonnaure', 'slam1852', 'cevenfb@gmail.com', 'BONNAURE', 'Fr'],
        [1853, 'thseigneurie', 'AudiA3audia3', 'th.seigneurie@orange.fr', 'SEIGNEURIE', 'Th'],
        [1854, 'Tutu52', 'slam1854', 'tutu52526@hotmail.fr', 'TENDAVARAYEN', 'Yoan'],
        [1857, 'TANGUY', 'FLN16tgy&', 'ftanguy@rtsys.fr', 'TANGUY', 'F'],
        [1858, 'delangle.a', 'slam1858', 'slam-1858@slam-booking.net', 'DELANGLE', 'A'],
        [1859, 'jourdan.m', 'slam1859', 'slam-1859@slam-booking.net', 'JOURDAN', 'M'],
        [1860, 'mafreimann', 'slam1860', 'marc.freimann@sfr.fr', 'FREIMANN', 'Marc'],
        [1861, 'AudreyCalvignac', 'slam1861', 'slam-1861@slam-booking.net', 'CALVIGNAC', 'Audrey'],
        [1864, 'richard.journet@but.fr', 'slam1864', 'richard.journet@but.fr', 'JOURNET', 'Richard'],
   ];
    }
}