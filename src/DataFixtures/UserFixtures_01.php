<?php
// App/DataFixtures/UserFixtures.php
namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
class UserFixtures_01 extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        foreach ($this->getAdministratorData() as [$id, $username, $password, $email, $lastName, $firstName]) {
            $user = new User();
            $user->setAccountType('INDIVIDUAL');
            $user->setUserName($username);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
            $user->setEmail($email);
            $user->setLastName($lastName);
            $user->setFirstName($firstName);
            $user->setRoles(['ROLE_USER','ROLE_ADMIN']);
            $manager->persist($user);
            $manager->flush();
            $reference = 'user-'.$id;
            $this->addReference($reference, $user);
        }
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
        [531, 'rbourdon@rtsys.fr', 'awt423', 'rbourdon@rtsys.fr', 'BOURDON', 'Raphaël'],
        [532, 'cbricaud@rtsys.fr', 'slam532', 'cbricaud@rtsys.fr', 'BRICAUD', 'C'],
        [534, 'ldufrechou@rtsys.fr', 'Fd_CY%Cs', 'ldufrechou@rtsys.fr', 'DUFRECHOU', 'l'],
        [538, 'jkoegler@rtsys.fr', 'slam538', 'jkoegler@rtsys.fr', 'KOEGLER', 'J'],
        [541, 'nmenard@rtsys.fr', 'slam541', 'nmenard@rtsys.fr', 'MENARD', 'N'],
        [544, 'cnicolas@rtsys.fr', 'slam544', 'cnicolas@rtsys.fr', 'COEFFIER', 'M'],
        [547, 'jean-yves.cueff@neotek-web.com', 'slam547', 'jean-yves.cueff@neotek-web.com', 'CUEFF', 'Jean-yves'],
        [548, 'pierre.chevalerias@neotek-web.com', 'slam548', 'pierre.chevalerias@neotek-web.com', 'CHEVALERIAS', 'Pierre'],
        [549, 'didier.clech@neotek-web.com', 'slam549', 'didier.clech@neotek-web.com', 'CLECH', 'Didier'],
        [551, 'manuel.lucas@neotek-web.com', 'slam551', 'manuel.lucas@neotek-web.com', 'LUCAS', 'Manuel'],
        [552, 'didier.boucheton@neotek-web.com', 'slam552', 'didier.boucheton@neotek-web.com', 'BOUCHETON', 'Didier'],
        [585, 'TEIXEIRA', 'slam585', 'contact@neotek-web.com', 'TEIXEIRA', 'X'],
        [738, 'staps-univ-savoie', 'staps8135', 'bernard.desmaret@univ-savoie.fr', 'DESMARET', 'Bernard'],
        [741, 'aurme', 'dano03', 'aurelie.merendet@univ-savoie.fr', 'MERENDET', 'Aurelie'],
        [743, 'jerome.auge@univ-savoie.fr', 'slam743', 'jerome.auge@univ-savoie.fr', 'AUGE', 'Jerome'],
        [744, 'pierre.bavazzano@univ-savoie.fr', 'slam744', 'pierre.bavazzano@univ-savoie.fr', 'BAVAZZANO', 'Pierre'],
        [746, 'phanelie.berthon@univ-savoie.fr', 'slam746', 'phanelie.berthon@univ-savoie.fr', 'BERTHON', 'Phanelie'],
        [748, 'nicolas.forestier@univ-savoie.fr', 'slam748', 'nicolas.forestier@univ-savoie.fr', 'FORESTIER', 'Nicolas'],
        [749, 'fabienne.gillonnier@univ-savoie.fr', 'slam749', 'fabienne.gillonnier@univ-savoie.fr', 'GILLONNIER', 'Fabienne'],
        [750, 'frederique.hintzy@univ-smb.fr', 'slam750', 'frederique.hintzy@univ-smb.fr', 'HINTZY', 'Frederique'],
        [751, 'laurent.messonnier@univ-savoie.fr', 'slam751', 'laurent.messonnier@univ-savoie.fr', 'MESSONNIER', 'Laurent'],
        [752, 'aurore.mionnet@univ-savoie.fr', 'slam752', 'aurore.mionnet@univ-savoie.fr', 'MIONNET', 'Aurore'],
        [754, 'annie.rouard@univ-smb.fr', 'slam754', 'annie.rouard@univ-smb.fr', 'ROUARD', 'Annie'],
        [755, 'patrice.rougier@univ-savoie.fr', 'Staps1997', 'patrice.rougier@univ-savoie.fr', 'ROUGIER', 'Patrice'],
        [756, 'pierre.samozino@univ-savoie.fr', 'slam756', 'pierre.samozino@univ-savoie.fr', 'SAMOZINO', 'Pierre'],
        [757, 'nicolas.varcin@univ-savoie.fr', '1r1EfC', 'nicolas.varcin@univ-savoie.fr', 'VARCIN', 'Nicolas'],
        [758, 'thomas.rupp@univ-savoie.fr', 'slam758', 'thomas.rupp@univ-savoie.fr', 'RUPP', 'Thomas'],
        [759, 'christophe.hourde@univ-savoie.fr', 'slam759', 'christophe.hourde@univ-savoie.fr', 'HOURDE', 'Christophe'],
        [760, 'benjamin.chatel@univ-smb.fr', 'slam760', 'benjamin.chatel@univ-smb.fr', 'CHATEL', 'Benjamin'],
        [762, 'gregoire.mitonneau@univ-savoie.fr', 'slam762', 'gregoire.mitonneau@univ-savoie.fr', 'MITONNEAU', 'Gregoire'],
        [763, 'romain.terrier@univ-savoie.fr', 'slam763', 'romain.terrier@univ-savoie.fr', 'TERRIER', 'Romain'],
        [764, 'oceane.truchet@gmail.com', 'slam764', 'oceane.truchet@gmail.com', 'TRUCHET', 'Oceane'],
        [765, 'sebastien.pavailler@univ-savoie.fr', 'slam765', 'sebastien.pavailler@univ-savoie.fr', 'PAVAILLER', 'Sebastien'],
        [767, 'clemence.perrin-malterre@univ-savoie.fr', 'slam767', 'clemence.perrin-malterre@univ-savoie.fr', 'PERRIN-MALTERRE', 'Clemence'],
        [860, 'davidpinard', 'slam860', 'david.pinard@yahoo.fr', 'PINARD', 'David'],
        [868, 'am.anthonioz@laposte.net', 'slam868', 'am.anthonioz@laposte.net', 'ANTHONIOZ', 'Tom'],
        [871, 'gabriel.batel@free.fr', 'slam871', 'gabriel.batel@free.fr', 'BATEL', 'Gabriel'],
        [873, 'chrisetvero.berliet@free.fr', 'slam873', 'chrisetvero.berliet@free.fr', 'BERLIET', 'Corentin'],
        [876, 'jeremylaflamme@hotmail.fr', 'slam876', 'jeremylaflamme@hotmail.fr', 'BOURDON', 'Jérémy'],
        [877, 'bouvier.jeanbaptiste@free.fr', 'slam877', 'bouvier.jeanbaptiste@free.fr', 'BOUVIER', 'Morgane'],
        [881, 'adchazz@gmail.com', 'slam881', 'adchazz@gmail.com', 'CHAZAL', 'Adrien'],
        [882, 'djludi4@gmail.com', 'slam882', 'djludi4@gmail.com', 'CHEDECAL', 'Ludovic'],
        [886, 'colasjl01@gmail.com', 'COdo+01', 'colasjl01@gmail.com', 'COLAS', 'Dorian'],
        [887, 'syl.daguet@free.fr', 'slam887', 'syl.daguet@free.fr', 'DAGUET', 'Sylvain'],
        [891, 'stefdugue@yahoo.fr', 'slam891', 'stefdugue@yahoo.fr', 'DUGUE', 'Stéphane'],
        [895, 'sl.liu1@free.fr', 'slam895', 'sl.liu1@free.fr', 'FRICHITTHAVONG', 'Sin-Ly'],
        [896, 'sisamone.mone@electricfil.com', 'slam896', 'sisamone.mone@electricfil.com', 'FRICHITTHAVONG', 'Sisamone'],
        [897, 'tomtom01700@gmail.com', 'slam897', 'tomtom01700@gmail.com', 'FRICHITTHAVONG', 'Thomas'],
        [900, 'kgudefin@hotmail.fr', 'slam900', 'kgudefin@hotmail.fr', 'GUDEFIN', 'Kevin'],
        [902, 'fabiguyo@gmail.com', 'slam902', 'fabiguyo@gmail.com', 'GUYOT', 'Fabien'],
    ];
    }
}
