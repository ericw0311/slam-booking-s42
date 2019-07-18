<?php
// App/DataFixtures/UserFixtures.php
namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
class UserFixtures_02 extends Fixture
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
        [905, 'vio01@hotmail.fr', 'slam905', 'vio01@hotmail.fr', 'JOLY', 'Nathan'],
        [910, 'frederic.longeaud@bbox.fr', 'slam910', 'frederic.longeaud@bbox.fr', 'LONGEAUD', 'Océane'],
        [911, 'cecilegregoire@hotmail.fr', 'slam911', 'cecilegregoire@hotmail.fr', 'LONGIN', 'Noémis'],
        [912, 'mylenebliard@msn.com', 'slam912', 'mylenebliard@msn.com', 'LUCIANI', 'Thomas'],
        [915, 'lopez.mathilde@neuf.fr', 'slam915', 'lopez.mathilde@neuf.fr', 'MARTIN-LOPEZ', 'Emma'],
        [917, 'Elodie.moro@hotmail.fr', 'slam917', 'Elodie.moro@hotmail.fr', 'MORO', 'Elodie'],
        [918, 'catherine.moulart@orange.fr', 'slam918', 'catherine.moulart@orange.fr', 'MOULART', 'Catherine'],
        [919, 'j.muslewski@hotmail.fr', 'slam919', 'j.muslewski@hotmail.fr', 'MUSLEWSKI', 'Clara'],
        [920, 'cathy.pain@wibox.fr', 'slam920', 'cathy.pain@wibox.fr', 'PAIN', 'Alban'],
        [921, 'perraudgael@yahoo.fr', 'slam921', 'perraudgael@yahoo.fr', 'PERRAUD', 'Gaël'],
        [922, 'petitsteph@neuf.fr', 'slam922', 'petitsteph@neuf.fr', 'PETIT', 'Lilou'],
        [923, 'marinechristophe@yahoo.fr', 'slam923', 'marinechristophe@yahoo.fr', 'PONS', 'Ilona'],
        [924, 'virginieprat@ouimail.fr', 'slam924', 'virginieprat@ouimail.fr', 'PRAT', 'Charly'],
        [931, 'hugoseiller@hotmail.com', 'slam931', 'hugoseiller@hotmail.com', 'SEILLER', 'Hugo'],
        [934, 'hamdi-unal@hotmail.fr', 'slam934', 'hamdi-unal@hotmail.fr', 'UNAL', 'Elif'],
        [936, 'verdier.gregory@freesbee.fr', 'slam936', 'verdier.gregory@freesbee.fr', 'VERDIER', 'Alexandre'],
        [1024, 'veron.c', 'slam1024', 'slam-1024@slam-booking.net', 'VERON', 'C'],
        [1025, 'piel.l', 'slam1025', 'slam-1025@slam-booking.net', 'PIEL', 'I'],
        [1026, 'leurent.a', 'slam1026', 'slam-1026@slam-booking.net', 'LEURENT', 'A'],
        [1027, 'chatel.c', 'slam1027', 'slam-1027@slam-booking.net', 'CHATEL', 'C'],
        [1029, 'labelliere.c', 'slam1029', 'slam-1029@slam-booking.net', 'DE LA BELLIERE', 'C'],
        [1030, 'brossier.n', 'slam1030', 'slam-1030@slam-booking.net', 'BROSSIER', 'N'],
        [1037, 'Chatal.g', 'slam1037', 'slam-1037@slam-booking.net', 'CHATAL', 'G'],
        [1039, 'deGaalon.ma', 'slam1039', 'slam-1039@slam-booking.net', 'DE GAALON', 'MA'],
        [1040, 'Ferron.j', 'slam1040', 'slam-1040@slam-booking.net', 'FERRON', 'JM'],
        [1041, 'Goulaouic.s', 'slam1041', 'slam-1041@slam-booking.net', 'GOULAOUIC', 'S'],
        [1042, 'Filâtre.n', 'slam1042', 'slam-1042@slam-booking.net', 'FILATRE', 'N'],
        [1044, 'Lefloch.j', 'slam1044', 'slam-1044@slam-booking.net', 'LEFLOCH', 'J'],
        [1045, 'Monnier.f', 'slam1045', 'slam-1045@slam-booking.net', 'MONNIER', 'F'],
        [1046, 'Motta.m', 'slam1046', 'slam-1046@slam-booking.net', 'MOTTA', 'M'],
        [1047, 'Potiez.e', 'slam1047', 'slam-1047@slam-booking.net', 'POTIEZ', 'E'],
        [1048, 'Simonneaux.b', 'slam1048', 'slam-1048@slam-booking.net', 'SIMONNEAUX', 'B'],
        [1049, 'Tourillon.n', 'slam1049', 'slam-1049@slam-booking.net', 'TOURILLON', 'N'],
        [1050, 'Tannoux.p', 'slam1050', 'slam-1050@slam-booking.net', 'TANNOUX', 'P'],
        [1051, 'Amilcaro.c', 'slam1051', 'slam-1051@slam-booking.net', 'AMILCARO', 'C'],
        [1052, 'Munoz.o', 'slam1052', 'slam-1052@slam-booking.net', 'MUNOZ', 'O'],
        [1056, 'dan.bouillet@hotmail.fr', 'slam1056', 'dan.bouillet@hotmail.fr', 'BOUILLET', 'Daniel'],
        [1070, 'Neotek', 'slam1070', 'remy.goudedranche@neotek-web.com', 'GOUDEDRANCHE', 'Remy'],
        [1081, 'arthur.peyrard@univ-smb.fr', 'Azerty01', 'Arthur.Peyrard@univ-smb.fr', 'PEYRARD', 'Arthur'],
        [1082, 'MONROLIN SYLVIE', 'slam1082', 'sylvie.monrolin@gmail.com', 'MONROLIN', 'Sylvie'],
        [1083, 'Eilvys70', 'slam1083', 'slam-1083@slam-booking.net', 'MONROLIN', 'Sylvie'],
        [1084, 'FREDZOUILLE', 'slam1084', 'fred-girardin@orange.fr', 'GIRARDIN', 'Frederic'],
        [1085, '2cv1957', 'slam', 'calou.amandine@orange.fr', 'BONNOT', 'Pascal'],
        [1086, '101274', 'slam1086', 'mariedetroye@wanadoo.fr', 'DETROYE', 'Marie'],
        [1088, 'Mc fly', 'slam1088', 'cccd@sfr.fr', 'CHARLET', 'Christophe'],
        [1089, 'JustineB', 'cuoo75', 'bugnetjustine@yahoo.fr', 'BUGNET', 'Justine'],
        [1091, 'DROPERT', 'slam1091', 'slam-1091@slam-booking.net', 'ROPERT', 'Dominique'],
        [1092, '2512CL', 'slam1092', 'christellelemerle@gmail.com', 'LEMERLE', 'Christelle'],
        [1094, 'AUGUSTIN', 'slam1094', 'dorian.grave70@gmail.com', 'GRAVE', 'Dorian'],
        [1096, 'jean-luc.sommer@univ-fcomte.fr', 'a3nsuti8', 'jean-luc.sommer@univ-fcomte.fr', 'SOMMER', 'Jean-luc'],
    ];
    }
}
