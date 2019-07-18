<?php
// App/DataFixtures/UserFixtures.php
namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
class UserFixtures_06 extends Fixture
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
        [1500, 'guillaumed', 'slam1500', 'desbourbes.guillaume@orange.fr', 'DESBOURBES', 'Guillaume'],
        [1502, 'mickaelb', 'slam1502', 'rockfmr@hotmail.fr', 'BLEIN', 'Mickael'],
        [1503, 'Emericp', 'slam1503', 'emeric.poiseau@gmail.com', 'POISEAU', 'Emeric'],
        [1506, 'jeromev', 'slam1506', 'jeromevieira@free.fr', 'VIEIRA', 'Jerome'],
        [1509, 'barbara', 'slam1509', 'dargaud.barbara@gmail.com', 'DARGAUD', 'Barbara'],
        [1511, 'gujaillon', 'slam1511', 'guillaume.jaillon@gmail.com', 'JAILLON', 'Guillaume'],
        [1512, 'guvrancken', 'slam1512', 'gus.vrancken@gmail.com', 'VRANCKEN', 'Gus'],
        [1513, 'nicolasa', 'slam1513', 'nicolas.amodis.na@gmail.com', 'AMODIS', 'Nicolas'],
        [1515, 'alexisv', 'slam1515', 'a.voizard@lecedre.fr', 'VOIZARD', 'Alexis'],
        [1516, 'jarry.christophe@wanadoo.fr', 'slam1516', 'jarry.christophe@wanadoo.fr', 'JARRY', 'Christophe'],
        [1517, 'Geoffroy Canard', 'AwZxEcRvTbYn', 'geoffroy.canard@gmail.com', 'CANARD', 'Geoffroy'],
        [1523, 'nicolas amadis', 'slam1523', 'nicolas.amadis.na@gmail.com', 'AMADIS', 'Nicolas'],
        [1524, 'benjaminl', 'slam1524', 'lecurub@yahoo.fr', 'LECURU', 'Benjamin'],
        [1525, 'quentinb', 'slam1525', 'qbifgamdiglia@gmail.com', 'BIFGAMDIGLIA', 'Quentin'],
        [1529, 'flog', 'slam1529', 'flo.g71@hotmail.fr', 'GUIGNARD', 'Florian'],
        [1530, 'davidt', 'slam1530', 'tex.om@wanadoo.fr', 'TEXEIRA', 'David'],
        [1531, 'romain', 'slam1531', 'romaincorneloup@hotmail.fr', 'CORNELOUP', 'Romain'],
        [1532, 'etiennef', 'slam1532', 'petre71600@hotmail.fr', 'FEDRIGO', 'Etienne'],
        [1534, 'LucieCarceller', 'slam1534', 'slam-1534@slam-booking.net', 'CARCELLER', 'Lucie'],
        [1535, 'vincentc', 'slam1535', 'vincentcostacoach@gmail.com', 'COSTA', 'Vincent'],
        [1536, 'remic', 'slam1536', 'remi.chapelier@yahoo.fr', 'CHAPELIER', 'Remi'],
        [1537, 'williaml', 'slam1537', 'william.labaune@wanadoo.fr', 'LABAUNE', 'William'],
        [1545, 'mathieuforge', 'slam1545', 'mathieu.forge@hotmail.fr', 'FORGE', 'Mathieu'],
        [1558, 'benoitj', 'slam1558', 'benoit-jouanneau@orange.fr', 'JOUANNEAU', 'Benoit'],
        [1559, 'oliviav', 'slam1559', 'panification@orange.fr', 'VALLEE', 'Olivia'],
        [1560, 'nicolasb', 'jenk', 'nicolasbignon@orange.fr', 'BIGNON', 'Nicolas'],
        [1563, 'Réjane', 'slam1563', 'rejane.m@hotmail.fr', 'M', 'Rejane'],
        [1572, 'julienb', 'slam1572', 'bouillonj@ymail.com', 'BOUILLON', 'Julien'],
        [1573, 'jeff', 'slam1573', 'jeffmaillot@sfr.fr', 'MAILLOT', 'J.francois'],
        [1574, 'benjaminv', 'slam1574', 'benj777@free.fr', 'VIGNOLAT', 'Benjamin'],
        [1578, 'valentinb', 'slam1578', 'slam-1578@slam-booking.net', 'BALIGAND', 'Valentin'],
        [1579, 'ricard51', 'slam1579', 'bertrand.bornet@hotmail.fr', 'BORNET', 'Bertrand'],
        [1580, 'Touillonyannick', 'slam1580', 'yannick.touillon@laposte.net', 'TOUILLON', 'Yannick'],
        [1581, 'diane84', 'slam1581', 'pautonnier.jeremy@orange.fr', 'PAUTONNIER', 'Jeremy'],
        [1583, 'jifiji', 'slam1583', 'jphv71@hotmail.com', 'VILLEDEY', 'Jean philippe'],
        [1584, 'SKY', 'slam1584', 'skinziger@antipode-consulting.com', 'KINZIGER', 'Stephane'],
        [1586, 'maite.daguet@free.fr', 'slam1586', 'maite.daguet@free.fr', 'DAGUET', 'Maïté'],
        [1588, 'alexrsv4@gmail.com', 'alexrsv4', 'alexrsv4@gmail.com', 'COURTOIS', 'Alexandre'],
        [1593, 'PhilippeBossut', 'slam1593', 'slam-1593@slam-booking.net', 'BOSSUT', 'Philippe'],
        [1597, 'stephelec', 'slam1597', 'stephane.elec08@gmail.com', 'ELEC', 'Stéphane'],
        [1600, 'valentin debarnot', 'slam1600', 'valentin.debarnot@gmail.com', 'DEBARNOT', 'Valentin'],
        [1601, 'jbducloux', 'slam1601', 'jbducloux@yahoo.com', 'DUCLOUX', 'J-B'],
        [1611, 'alexis31', 'slam1611', 'alexlecussan@hotmail.fr', 'LECUSSAN', 'Alex'],
        [1612, 'alexcussan', 'slam1612', 'alexcussan@hotmail.fr', 'LECUSSANT', 'Alexis'],
        [1613, 'alexia', 'slam1613', 'alexiagioana@yahoo.fr', 'GIOANA', 'Alexia'],
        [1618, 'guillaumem', 'slam1618', 'mouraux.guillaume@gmail.com', 'MOURAUX', 'Guillaume'],
        [1620, 'jmpenfornis@rtsys.fr', 'slam1620', 'jmpenfornis@rtsys.fr', 'PENFORNIS', 'J-M'],
        [1624, 'Hippolyte', 'slam1624', 'efoltete@gmail.com', 'FOLTETE', 'Hippolyte'],
        [1625, 'Aurélien', 'slam1625', 'aurelienjacot@orange.fr', 'JACOT', 'Aurelien'],
        [1626, 'Delly', 'slam1626', 'delphine.guinand@neuf.fr', 'GUINAND', 'Delphine'],
   ];
    }
}
