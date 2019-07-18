<?php
// App/DataFixtures/UserFixtures.php
namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
class UserFixtures_04 extends Fixture
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
        [1185, 'jadarolles', 'slam1185', 'jacques@darolles.com', 'DAROLLES', 'Jacques'],
        [1186, 'videlaborderie', 'vd!1687', 'vdelab@melix.org', 'DE LA BORDERIE', 'V'],
        [1187, 'jefraumont', 'solene00', 'jeanmarc.fraumont@free.fr', 'FRAUMONT', 'Jean-Marc'],
        [1188, 'logendebien', '32220', 'l.gendebien@gmail.com', 'GENDEBIEN', 'l'],
        [1189, 'hegielen', 'slam1189', 'herbert.gielen@gmail.com', 'GIELEN', 'Herbert'],
        [1190, 'hegounot', '29zvwbp', 'herve.gounot@neuf.fr', 'GOUNOT', 'Herve'],
        [1193, 'milamarque', 'slam1193', 'mmlamarque@gmail.com', 'LAMARQUE', 'M'],
        [1194, 'chlhuillier', 'slam1194', 'charles.lhuillier@airbus.com', 'LHUILLIER', 'Charles'],
        [1196, 'humarty', 'slam1196', 'huguesmarty82@gmail.com', 'MARTY', 'Hugues'],
        [1197, 'jenabonne', 'slam1197', 'jnabonne@aol.com', 'NABONNE', 'J'],
        [1198, 'maollivier', 'slam1198', 'ollivier.matthieu@gmail.com', 'MATTHIEU', 'Ollivier'],
        [1201, 'mapuntous', 'mppikachu', 'mariepuntous@hotmail.com', 'PUNTOUS', 'Marie'],
        [1202, 'repuntous', 'slam1202', 'imipuntous.r@wanadoo.fr', 'IMIPUNTOUS', 'R'],
        [1213, 'frhoussard', 'slam1213', 'f.houssard@wanadoo.fr', 'HOUSSARD', 'F'],
        [1214, 'menfin', 'slam1214', 'mauvilly.aurore@wanadoo.fr', 'MAUVILLY', 'Aurore'],
        [1216, 'phdorval', 'avionulm', 'philippe.dorval.aviation@gmail.com', 'DORVAL', 'Philippe'],
        [1217, 'stcaumartin', 'slam1217', 'st.caumartin@orange.fr', 'CAUMARTIN', 'St'],
        [1237, 'Ivan', 'madrid2003', 'ivanborbolla41@gmail.com', 'BORBOLLA SANCHEZ', 'Ivan-benedicto'],
        [1241, 'ctroussard@rtsys.fr', 'slam1241', 'ctroussard@rtsys.fr', 'TROUSSARD', 'Corentin'],
        [1246, 'mibertin', 'slam1246', 'mh.bertin@wanadoo.fr', 'BERTIN', 'Mh'],
        [1253, 'chcoldefy', 'slam1253', 'chantal.coldefy@free.fr', 'COLDEFY', 'Chantal'],
        [1254, 'gautrot', 'lloris', 'jbgautrot@yahoo.fr', 'GAUTROT', 'Yves'],
        [1276, 'jean-pierre.beguin@univ-smb.fr', 'slam1276', 'jean-pierre.beguin@univ-smb.fr', 'BEGUIN', 'Jean-pierre'],
        [1282, 'daniel.j', 'slam1282', 'daniel.j@moka-sacrecoeur.fr', 'J', 'Daniel'],
        [1305, 'artheo', 'slam1305', 'cyrilcyralex@wanadoo.fr', 'BOUDAUX', 'Theo'],
        [1312, 'kiki21dudu', 'slam1312', 'duvernay.jerome@orange.fr', 'DUVERNAY', 'Killian'],
        [1313, 'totoffy24', 'slam1313', 'christophe-tpsloriot@orange.fr', 'RIBEIRO', 'Christophe'],
        [1314, 'virginie.lagarde@insa-lyon.fr', 'slam1314', 'virginie.lagarde@insa-lyon.fr', 'LAGARDE', 'Virginie'],
        [1315, 'Clayteam69@gmail.com', 'slam1315', 'Clayteam69@gmail.com', 'MAGNIER', 'C'],
        [1316, 'cluzel.jules@gmail.com', 'kolajtm', 'cluzel.jules@gmail.com', 'CLUZEL', 'Jules'],
        [1317, 'jean.riviere@univ-smb.fr', 'slam1317', 'Jean.Riviere@univ-smb.fr', 'RIVIERE', 'Jean'],
        [1368, 'hoang.julien@free.fr', 'slam1368', 'hoang.julien@free.fr', 'HOANG', 'Julien'],
        [1369, 'vlhoang@hotmail.fr', 'slam1369', 'vlhoang@hotmail.fr', 'HOANG', 'Van-Lath'],
        [1374, 'DJOKO', 'slam1374', 'vincent.ballot@bvb-france.com', 'BALLOT', 'Vincent'],
        [1375, 'Phduc', 'slam1375', 'philippeduc9@gmail.com', 'DUC', 'Philippe'],
        [1376, 'Dohourtal', 'johnantho21', 'dominique-hourtal@orange.fr', 'HOURTAL', 'Dominique'],
        [1377, 'xacombes', 'monabaika', 'xcombes@free.fr', 'COMBES', 'X'],
        [1378, 'jelis', 'surfer31', 'jp.lis@hotmail.fr', 'LIS', 'J-P'],
        [1383, 'cmarceau@plasticomnium.com', 'slam1383', 'cmarceau@plasticomnium.com', 'MARCEAU', 'Christophe'],
        [1386, 'AgnesNazon', 'slam1386', 'slam-1386@slam-booking.net', 'NAZON', 'Agnès'],
        [1387, 'ChristopheBerthuet', 'slam1387', 'slam-1387@slam-booking.net', 'BERTHUET', 'Christophe'],
        [1388, 'ClaraGiannechini', 'slam1388', 'slam-1388@slam-booking.net', 'GIANNECHINI', 'Clara'],
        [1389, 'LiseGauGr1', 'slam1389', 'slam-1389@slam-booking.net', 'GAUGR1', 'Lise'],
        [1391, 'DidierDesvard', 'slam1391', 'slam-1391@slam-booking.net', 'DESVARD', 'Didier'],
        [1393, 'LiseGauGr2', 'slam1393', 'slam-1393@slam-booking.net', 'GAUGR2', 'Lise'],
        [1394, 'JulieLognon', 'slam1394', 'slam-1394@slam-booking.net', 'LOGNON', 'Julie'],
        [1395, 'Valentin', 'slam1395', 'annaletondal@gmail.com', 'LETONDAL', 'Valentin'],
        [1396, 'Regane', 'slam1396', 'barth.aurore@orange.fr', 'BARTH', 'Louis'],
        [1400, 'ThomaSornaY', 'slam1400', 'gaillard.francis@neuf.fr', 'GAILLARD', 'Thomas'],
        [1401, 'Jenn', 'slam1401', 'jennifer.hego@orange.fr', 'HEGO', 'Jennifer'],
   ];
    }
}