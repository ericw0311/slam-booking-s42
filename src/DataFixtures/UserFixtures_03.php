<?php
// App/DataFixtures/UserFixtures.php
namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
class UserFixtures_03 extends Fixture
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
        [1097, 'a.messelot@laposte.net', 'nu7eaczi', 'a.messelot@laposte.net', 'MESSELOT', 'Alain'],
        [1103, 'nbillery@orange.fr', 'slam1103', 'nbillery@orange.fr', 'BILLERY', 'Nathan'],
        [1104, 'daniel.bolot@wanadoo.fr', 'slam1104', 'daniel.bolot@wanadoo.fr', 'BOLOT', 'Daniel'],
        [1105, 'pbnv@orange.fr', 'slam1105', 'pbnv@orange.fr', 'BONNAVENTURE', 'Pierre'],
        [1106, 'roland.chapuis0991@orange.fr', 'slam1106', 'roland.chapuis0991@orange.fr', 'CHAPUIS', 'Roland'],
        [1107, 'm.couillaud@orange.fr', 'slam1107', 'm.couillaud@orange.fr', 'COUILLAUD', 'Monique'],
        [1108, 'jacques.de-sy@orange.fr', 'slam1108', 'jacques.de-sy@orange.fr', 'DE-SY', 'Jacques'],
        [1109, 'demaret_sebastien@yahoo.fr', 'slam1109', 'demaret_sebastien@yahoo.fr', 'DEMARET', 'Sébastien'],
        [1110, 'fdemont@dutruy.com', 'slam1110', 'fdemont@dutruy.com', 'DEMONT', 'François'],
        [1111, 'Jc.Druet@laposte.Net', 'slam1111', 'jc.druet@laposte.net', 'DRUET', 'Jean-christophe'],
        [1112, 'jp.druet@free.fr', 'slam1112', 'jp.druet@free.fr', 'DRUET', 'Jean-pierre'],
        [1113, 'plfeenstra@gmail.com', 'leunis57', 'plfeenstra@gmail.com', 'FEENSTRA', 'Peter'],
        [1114, 'y.folley@orange.fr', 'slam1114', 'y.folley@orange.fr', 'FOLLEY', 'Yves'],
        [1115, 'Stéphane.gray@sfr.fr', 'slam1115', 'stephane.gray@sfr.fr', 'GENIN', 'Stéphane'],
        [1116, 'clubcoxi@yahoo.fr', 'slam1116', 'clubcoxi@yahoo.fr', 'GRANDJEAN', 'Christophe'],
        [1117, 'p.kaiser@free.fr', 'slam1117', 'p.kaiser@free.fr', 'KAISER', 'Pierre'],
        [1118, 'thierry.kubiak@wanadoo.fr', 'slam1118', 'thierry.kubiak@wanadoo.fr', 'KUBIAK', 'Thierry'],
        [1119, 'glimonier@wanadoo.fr', 'slam1119', 'glimonier@wanadoo.fr', 'LIMONIER', 'Gilles'],
        [1120, 'gmaignan2@wanadoo.fr', 'slam1120', 'gmaignan2@wanadoo.fr', 'MAIGNAN', 'Georges'],
        [1121, 'bernard.meurisse@hotmail.fr', 'slam1121', 'bernard.meurisse@hotmail.fr', 'MEURISSE', 'Bernard'],
        [1122, 'ougierroux@yahoo.fr', 'slam1122', 'ougierroux@yahoo.fr', 'OUGIER', 'Jeanne-antide'],
        [1123, 'boubout70@orange.fr', 'slam1123', 'boubout70@orange.fr', 'OUGIER', 'Robert'],
        [1124, 'philippe.outrey@hotmail.fr', 'slam1124', 'philippe.outrey@hotmail.fr', 'OUTREY', 'Clarisse'],
        [1125, 'j.sommer@hotmail.fr', 'slam1125', 'j.sommer@hotmail.fr', 'SOMMER', 'Jules'],
        [1126, 'm.sommer@hotmail.fr', 'slam1126', 'm.sommer@hotmail.fr', 'SOMMER', 'Maxime'],
        [1127, 'dtartrat@laposte.net', 'slam1127', 'dtartrat@laposte.net', 'TARTRAT', 'Danièle'],
        [1128, 'stephanevera@orange.fr ', 'slam1128', 'stephanevera@orange.fr', 'VERA', 'Stéphane'],
        [1129, 'anthonin.verdy@aliceadsl.fr', 'slam1129', 'anthonin.verdy@aliceadsl.fr', 'VERDY', 'Anthonin'],
        [1130, 'olivier.virely@jgaviation.eu', 'slam1130', 'olivier.virely@jgaviation.eu', 'VIRELY', 'Olivier'],
        [1131, 'yousfi_ahmed@hotmail.com', 'kate7277', 'yousfi_ahmed@hotmail.com', 'YOUSFI', 'Ahmed'],
        [1132, 'MENIPAO', 'azerty25', 'menisan@voila.fr', 'MENICUCCI', 'Aimeric'],
        [1140, 'LaureDesvard', 'slam1140', 'slam-1140@slam-booking.net', 'DESVARD', 'Laure'],
        [1141, 'ThomasBeauchamp', 'slam1141', 'slam-1141@slam-booking.net', 'BEAUCHAMP', 'Thomas'],
        [1142, 'Bmdfamily', 'slam1142', 'laurencebossy@yahoo.fr', 'DIDRI', 'Romane'],
        [1143, 'Ibandars', 'slam1143', 'philippe.dars@ac-besancon.fr', 'DARS', 'Philippe'],
        [1144, 'antoinedu70', 'slam1144', 'yamakasi70.braillard@hotmail.fr', 'BRAILLARD', 'Antoine'],
        [1147, 'piermax25170', 'slam1147', 'gillesbarthod@orange.fr', 'BARTHOD', 'Pierre'],
        [1151, 'Paulmartin', 'slam1151', 'xavier.hubner@gmail.com', 'HUBNER', 'Paul'],
        [1153, 'AgnesBoeuf', 'slam1153', 'slam-1153@slam-booking.net', 'BŒUF', 'Agnès'],
        [1154, 'LauraWinn', 'slam1154', 'slam-1154@slam-booking.net', 'WINN', 'Laura'],
        [1155, 'AmelieDhurlaborde', 'slam1155', 'slam-1155@slam-booking.net', 'DHURLABORDE', 'Amélie'],
        [1159, 'GuillaumeA', 'slam1159', 'a.guillaume17@wanadoo.fr', 'GUILLAUME', 'Alain'],
        [1171, 'Pierre Barthod', 'slam1171', 'pierrebarthod25@gmail.com', 'BARTHOD', 'Pierre'],
        [1172, 'phchenevier', 'slam1172', 'slam-1172@slam-booking.net', 'CHENEVIER', 'Ph'],
        [1173, 'adam2006', 'slam1173', 'david.boillot@wanadoo.fr', 'BOILLOT', 'Adam'],
        [1178, 'vialliguie', 'slam1178', 'vincent.alliguie@sfr.fr', 'ALLIGUIE', 'Vincent'],
        [1179, 'chbalme', 'balmax', 'balmax@numericable.fr', 'MORIN', 'Christophe'],
        [1180, 'ambargain', 'mercure14', 'amaury.bargain@orange.fr', 'BARGAIN', 'Amaury'],
        [1182, 'frbusnel', 'slam1182', 'franck.busnel@orange.fr', 'BUSNEL', 'Franck'],
        [1184, 'bedarolles', 'soules32', 'bernard.darolles@wanadoo.fr', 'DAROLLES', 'Bernard'],
    ];
    }
}