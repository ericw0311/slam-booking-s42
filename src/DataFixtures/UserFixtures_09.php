<?php
// App/DataFixtures/UserFixtures.php
namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
class UserFixtures_09 extends Fixture
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
        [1866, 'maxim0676@live.fr ', 'slam1866', 'maxim0676@live.fr', 'ENMORINE', 'Maxime'],
        [1867, 'AnneMutuel', 'slam1867', 'slam-1867@slam-booking.net', 'MUTUEL', 'Anne'],
        [1878, 'echampomier', 'slam1878', 'slam-1878@slam-booking.net', 'CHAMPOMIER', 'Elina'],
        [1879, 'jusse.f@laposte.net', 'slam1879', 'jusse.f@laposte.net', 'JUSSELME', 'Frederic'],
        [1880, 'chliaudet', 'Liaudet1954', 'christianliaudet@orange.fr', 'LIAUDET', 'Christian'],
        [1882, 'amandas@bbox.fr', 'slam1882', 'amandas@bbox.fr', 'MANDAS', 'A'],
        [1889, 'lsamson', 'slam1889', 'slam-1889@slam-booking.net', 'SAMSON', 'Loriane'],
        [1890, 'jenniferchevalier@laposte.net', 'slam1890', 'jenniferchevalier@laposte.net', 'CHEVALIER', 'Jennifer'],
        [1891, 'cyril_metral@hotmail.com', 'slam1891', 'cyril_metral@hotmail.com', 'METRAL', 'Cyril'],
        [1892, 'jewarthmann', 'slam1892', 'jeanmarc.warthmann@free.fr', 'WARTHMANN', 'Jean-Marc'],
        [1894, 'chcanals', 'slam1894', 'christellecanals@orange.fr', 'CANALS', 'Christelle'],
        [1895, 'chbenac', 'baikal', 'christophe.benac@tisseo.fr', 'BENAC', 'Christophe'],
        [1899, 'sabarchechath', 's00a72m', 'samuel.barchechath@gmail.com', 'BARCHECHATH', 'Samuel'],
        [1901, 'CDZ25', 'slam1901', 'pcdz25@yahoo.fr', 'CORDIEZ', 'Samuel'],
        [1902, 'poussin1', 'slam1902', 'frankkamas@yahoo.fr', 'FRANCESCHINI', 'Simon'],
        [1903, 'chinshiva', 'slam1903', 'chinshiva@gmail.com', 'RENAUD', 'Bastien'],
        [1904, 'farfaday', 'slam1904', 'tcolson@hotmail.fr', 'COLSON', 'Thomas'],
        [1905, 'Clément Barouin', 'slam1905', 'gilliard.sabrina@orange.fr', 'BAROUIN', 'Clement'],
        [1907, 'freddyprost@hotmail.fr', 'slam1907', 'freddyprost@hotmail.fr', 'PROST', 'Freddy'],
        [1908, 'agnes.binot@wanadoo.fr', 'slam1908', 'agnes.binot@wanadoo.fr', 'BINOT', 'Agnes'],
        [1909, 'agnes.vinot@wanadoo.fr', 'slam1909', 'agnes.vinot@wanadoo.fr', 'VINOT', 'Agnes'],
        [1910, 'L@miss25', 'slam1910', 'emiliedumont59@yahoo.fr', 'KISUNGU', 'Lenny'],
        [1912, 'A.j24@orange.fr', 'slam1912', 'a.j24@orange.fr', 'JULIEN', 'Audrey'],
        [1913, 'chriskass@wanadoo.fr', 'slam1913', 'chriskass@wanadoo.fr', 'JUILLET', 'Christine'],
        [1916, 'tanguyp', 'slam1916', 'tanguyp9921@gmail.com', 'PERRIN', 'Tanguy'],
        [1917, 'kevindacunha', 'slam1917', 'dacunha.kevin.dck@gmail.com', 'DACUNHA', 'Kevin'],
        [1918, 'ZEO', 'slam1918', 'nicolas.zeo@neotek-web.com', 'ZEO', 'Nicolas'],
        [1919, 'RenéCardot', 'slam1919', 'slam-1919@slam-booking.net', 'CARDOT', 'Rene'],
        [1924, 'benjaminp', 'slam1924', 'benjamin.picard@hotmail.fr', 'PICARD', 'Benjamin'],
        [1925, 'Simon P', 'slam1925', 'marlene-bidoire@sfr.fr', 'PETITCUENOT', 'Simon'],
        [1927, 'chsaintlary', 'slam1927', 'christophe.saint-lary@laposte.net', 'SAINT-LARY', 'Christophe'],
        [1928, 'yocayeux', 'slam1928', 'y.cayeux@gmail.com', 'CAYEUX', 'Y'],
        [1929, 'evelyneb', 'slam1929', 'bramard_evelyne@hotmail.fr', 'BRAMARD', 'Evelyne'],
        [1930, 'mamessier', 'slam1930', 'jmamessier@cbm71.fr', 'MAMESSIER', 'J'],
        [1934, 'beuvrard', 'slam1934', 'euvrard.baptiste@gmail.com', 'EUVRARD', 'Baptiste'],
        [1935, 'ValérieDidaniel', 'slam1935', 'slam-1935@slam-booking.net', 'DIDANIEL', 'Valérie'],
        [1936, 'eandre@rtsys.fr', 'slam1936', 'eandre@rtsys.fr', 'ERWIN', 'Andre'],
        [1937, 'Chavalard.arnaud@live.fr ', 'slam1937', 'chavalard.arnaud@live.fr', 'CHAVALARD', 'Arnaud'],
        [1939, 'mahumbert', 'lucotte', 'marc.humbert916@orange.fr', 'HUMBERT', 'Marc'],
        [1940, 'ygregoire@rtsys.fr', 'slam1940', 'ygregoire@rtsys.fr', 'GREGOIRE', 'Y'],
        [1962, 'lucasdidelle@hotmail.fr', 'slam1962', 'lucasdidelle@hotmail.fr', 'DIDELLE', 'Lucas'],
        [1963, 'RBRAC@HOTMAIL.FR', 'slam1963', 'RBRAC@HOTMAIL.FR', 'RBRAC', 'X'],
        [1967, 'lacombre', 'slam1967', 'lacombre.d@gmail.com', 'LACOMBRE', 'D'],
        [1968, 'sylvainb', 'slam1968', 'sylvain.brize@gmail.com', 'BRIZE', 'Sylvain'],
        [1969, 'maxime.bachmann@orange.fr', 'slam1969', 'maxime.bachmann@orange.fr', 'BACHMANN', 'Maxime'],
        [1970, 'PatriciaGirard', 'slam1970', 'slam-1970@slam-booking.net', 'GIRARD', 'Patricia'],
        [1971, 'dstephane', 'slam1971', 'desbrosses.stephane@orange.fr', 'DEBROSSES', 'Stephane'],
        [1974, 'Loulou2601', 'slam1974', 'loetitia62@hotmail.com', 'QUATREHOMME', 'Lou-ann'],
        [1975, 'Mathis', 'slam1975', 'najuso@hotmail.fr', 'MAIREY', 'Mathis'],
        [1976, 'moraisa', 'slam1976', 'alexandre-morais@hotmail.fr', 'MORAIS', 'Alexandre'],
   ];
    }
}
