<?php
// App/DataFixtures/UserFixtures.php
namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
class UserFixtures_07 extends Fixture
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
        [1630, 'KAZAK', 'slam1630', 'kazak.annick@club-internet.fr', 'KAZAK', 'Annick'],
        [1632, 'fmartin2570', 'slam1632', 'f.martin@artemis-paysages.fr', 'MARTIN', 'Franck'],
        [1633, 'seb daveiga', 'slam1633', 'seb_daveiga@hotmail.com', 'DAVEIGA', 'Seb'],
        [1638, 'tennismarnay', 'slam1638', 'abcl.bailly@wanadoo.fr', 'BAILLY', 'Laurent'],
        [1639, 'dumonty', 'slam1639', 'dumontyannick@orange.fr', 'DUMONT', 'Yannick'],
        [1640, 'champy', 'slam1640', 'qnque@icloud.com', 'BALME', 'Ch'],
        [1641, 'AnthonyMorice', 'slam1641', 'slam-1641@slam-booking.net', 'MORICE', 'Anthony'],
        [1642, 'GenevièveOwenjones', 'slam1642', 'slam-1642@slam-booking.net', 'OWEN JONES', 'Geneviève'],
        [1645, 'mamessierl', 'slam1645', 'luc.mamessier@gmail.com', 'MAMESSIER', 'Luc'],
        [1646, 'karen', 'slam1646', 'karen.reignier@laposte.net', 'REIGNIER', 'Karen'],
        [1650, 'j-ph25@sfr.fr', 'Ble2rIot5', 'j-ph25@sfr.fr', 'ROSNET', 'Jean-Philippe'],
        [1651, 'bebes20', 'slam1651', 'berger.seb@gmail.com', 'BERGER', 'Sebastien'],
        [1652, 'Matheo2000', 'slam1652', 'fcreuillot@orange.fr', 'GARNACHE', 'Matheo'],
        [1653, 'familleklotz', 'slam1653', 'arianeeklotz@gmail.com', 'KLOTZ', 'Ariane'],
        [1655, 'lauraM', 'slam1655', 'menetrierl@laposte.net', 'MENETRIER', 'Laura'],
        [1663, 'Baptista.v', 'slam1663', 'slam-1663@slam-booking.net', 'BAPTISTA', 'V'],
        [1664, 'Benard.ma', 'slam1664', 'slam-1664@slam-booking.net', 'BENARD', 'MA'],
        [1674, 'christophes ', 'slam1674', 'christophe.senaillet@gmail.com', 'SENAILLET', 'Christophe'],
        [1675, 'damien.bernardin', 'slam1675', 'damien.bernardin71600@gmail.com', 'BERNARDIN', 'Damien'],
        [1678, 'bodytitane', 'slam1678', 'bodytitane@gmail.com', 'DUBUISSON', 'Emilie'],
        [1682, 'i.ducray64@gmail.com', 'slam1682', 'i.ducray64@gmail.com', 'BROUTIN', 'Xavier'],
        [1683, 'Luis', 'slam1683', 'jessi_25@live.fr', 'EIRA', 'Luis'],
        [1684, 'annar', 'slam1684', 'racineanna@hotmail.fr', 'RACINE', 'Anna'],
        [1685, 'JulienAlley', 'slam1685', 'slam-1685@slam-booking.net', 'ALLEY', 'Julien'],
        [1688, 'geginet', 'slam1688', 'gerard.ginet@gmail.com', 'GINET', 'Gerard'],
        [1689, 'phsergent', 'slam1689', 'filser@hotmail.com', 'SERGENT', 'Philippe'],
        [1693, 'heoule', 'slam1693', 'herve.oule@alsatis.net', 'OULE', 'Herve'],
        [1694, 'epericolososporgesi', 'slam1694', 'christophe.henriot@yahoo.fr', 'HENRIOT', 'Theo'],
        [1696, 'richardo', 'zinzin59', 'o.richardg@gmail.com', 'RICHARD', 'O'],
        [1697, 'dagainp', 'slam1697', 'philippedagain@orange.fr', 'DEGAIN', 'Philippe'],
        [1698, 'Evadasilva', 'slam1698', 'charlinemulin@hotmail.fr', 'DA SILVA', 'Eva'],
        [1699, 'Paul2422', 'slam1699', 'Marilyn.friant@gmail.com', 'FRIANT', 'Paul'],
        [1700, 'stevens', 'slam1700', 'stevensidibe@hotmail.fr', 'SIDIBIE', 'Steven'],
        [1703, 'cortof25', 'wilson', 'cortof25@yahoo.fr', 'CORNET', 'Clovis'],
        [1704, 'guillaume.forgeat@yahoo.com', 'slam1704', 'guillaume.forgeat@yahoo.com', 'FORGEAT', 'Guillaume'],
        [1705, 'jechenoz', 'ollivier', 'jchenoz@yahoo.fr', 'CHENOZ', 'J'],
        [1707, 'elodieb', 'slam1707', 'baque.elo@gmail.com', 'BAQUE', 'Elodie'],
        [1708, 'jepezi', 'slam1708', 'pezijeanphilippe@live.fr', 'PEZI', 'Jean-Philippe'],
        [1709, 'julien Poncet', 'slam1709', 'julien.poncet@hotmail.fr', 'PONCET', 'Julien'],
        [1741, 'sandrine.bassen@orange.fr', 'slam1741', 'sandrine.bassen@orange.fr', 'BASSEN', 'Sandrine'],
        [1742, 'catly84@hotmail.fr', 'slam1742', 'catly84@hotmail.fr', 'FETTIG', 'Catherine'],
        [1743, 'myrdossantos@free.fr', 'slam1743', 'myrdossantos@free.fr', 'DOS SANTOS', 'Philippine'],
        [1744, 'pelissiermatthieu@hotmail.fr', 'slam1744', 'pelissiermatthieu@hotmail.fr', 'PELISSIER', 'Matthieu'],
        [1745, 'pcullmann@hotmail.fr', 'slam1745', 'pcullmann@hotmail.fr', 'CULLMANN', 'Pauline'],
        [1747, 'axelle.moiron@free.fr', 'slam1747', 'axelle.moiron@free.fr', 'MOIRON', 'Axelle'],
        [1749, 'julienr', 'slam1749', 'julienetnadia@icloud.com', 'RAVIER', 'Julien'],
        [1752, 'romain.comte', 'slam1752', 'romain.comte@icloud.com', 'COMTE', 'Romain'],
        [1754, 'Maximilien.Bowen@univ-savoie.fr', 'slam1754', 'Maximilien.Bowen@univ-savoie.fr', 'BOWEN', 'Maximilien'],
        [1757, 'Alex', 'slam1757', 'alexandregonzales07@gmail.com', 'GONZALES', 'Alexandre'],
        [1758, 'nathclay@free.fr', 'slam1758', 'nathclay@free.fr', 'CLAY', 'Nathalie'],
   ];
    }
}
