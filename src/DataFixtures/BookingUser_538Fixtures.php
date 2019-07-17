<?php
// App/DataFixtures/BookingUser_538Fixtures.php
namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\File;
use App\Entity\User;
use App\Entity\UserFile;
use App\Entity\Booking;
use App\Entity\BookingUser;

class BookingUser_538Fixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
	foreach ($this->getData() as [$fileID, $bookingHeaderID, $userID, $userFileID, $oorder]) {

		$user = $this->getReference('user-'.$userID);
		$file = $this->getReference('file-'.$fileID);
		$booking = $this->getReference('bookingHeader-'.$bookingHeaderID);
		$userFile = $this->getReference('userFile-'.$userFileID);
		$bookingUser = new bookingUser($user, $booking, $userFile);
		$bookingUser->setOrder($oorder);
		$manager->persist($bookingUser);
		$manager->flush();
	}
    }
	private function getData(): array
    {
	return [
// $data = [$fileID, $bookingHeaderID, $userID, $userFileID, $oorder]
[538, 4609, 1095, 987, 1],
[538, 4616, 1097, 955, 1],
[538, 4618, 1095, 953, 1],
[538, 4654, 1128, 987, 1],
[538, 4657, 1128, 987, 1],
[538, 4658, 1128, 987, 1],
[538, 4662, 1128, 987, 1],
[538, 4682, 1097, 955, 1],
[538, 4700, 1097, 955, 1],
[538, 4704, 1119, 978, 1],
[538, 4705, 1119, 978, 1],
[538, 4713, 1097, 955, 1],
[538, 4725, 1097, 955, 1],
[538, 4734, 1097, 955, 1],
[538, 4736, 1119, 978, 1],
[538, 4737, 1119, 978, 1],
[538, 4746, 1097, 955, 1],
[538, 4779, 1096, 984, 1],
[538, 4831, 1097, 955, 1],
[538, 4888, 1120, 979, 1],
[538, 4909, 1128, 987, 1],
[538, 4923, 1119, 978, 1],
[538, 4924, 1119, 978, 1],
[538, 4925, 1119, 978, 1],
[538, 4941, 1119, 978, 1],
[538, 4959, 1109, 968, 1],
[538, 4970, 1120, 979, 1],
[538, 5012, 1128, 987, 1],
[538, 5014, 1128, 987, 1],
[538, 5016, 1128, 987, 1],
[538, 5020, 1119, 978, 1],
[538, 5037, 1128, 987, 1],
[538, 5141, 1119, 978, 1],
[538, 5158, 1128, 987, 1],
[538, 5272, 1128, 987, 1],
[538, 5278, 1096, 965, 1],
[538, 5304, 1096, 954, 1],
[538, 5305, 1096, 954, 1],
[538, 5320, 1119, 978, 1],
[538, 5329, 1128, 987, 1],
[538, 5392, 1128, 987, 1],
[538, 5396, 1119, 978, 1],
[538, 5397, 1119, 978, 1],
[538, 5398, 1119, 978, 1],
[538, 5407, 1128, 987, 1],
[538, 5454, 1128, 987, 1],
[538, 5457, 1128, 987, 1],
[538, 5458, 1128, 987, 1],
[538, 5459, 1128, 987, 1],
[538, 5460, 1128, 987, 1],
[538, 5472, 1128, 987, 1],
[538, 5473, 1128, 987, 1],
[538, 5474, 1128, 987, 1],
[538, 5478, 1096, 984, 1],
[538, 5482, 1103, 962, 1],
[538, 5492, 1096, 984, 1],
[538, 5539, 1106, 965, 1],
[538, 5540, 1106, 965, 1],
[538, 5541, 1106, 965, 1],
[538, 5542, 1106, 965, 1],
[538, 5565, 1128, 987, 1],
[538, 5566, 1128, 987, 1],
[538, 5567, 1128, 987, 1],
[538, 5584, 1128, 987, 1],
[538, 5600, 1128, 987, 1],
[538, 5642, 1128, 987, 1],
[538, 5643, 1128, 987, 1],
[538, 5644, 1128, 987, 1],
[538, 5656, 1119, 978, 1],
[538, 5691, 1119, 978, 1],
[538, 5692, 1096, 990, 1],
[538, 5693, 1104, 963, 1],
[538, 5694, 1096, 963, 1],
[538, 5695, 1096, 963, 1],
[538, 5706, 1109, 968, 1],
[538, 5708, 1120, 979, 1],
[538, 5739, 1120, 979, 1],
[538, 5774, 1120, 979, 1],
[538, 5782, 1131, 990, 1],
[538, 5783, 1128, 987, 1],
[538, 5801, 1120, 979, 1],
[538, 5803, 1128, 987, 1],
[538, 5810, 1131, 990, 1],
[538, 5822, 1131, 990, 1],
[538, 5844, 1128, 987, 1],
[538, 5845, 1128, 987, 1],
[538, 5846, 1128, 987, 1],
[538, 5869, 1120, 979, 1],
[538, 5872, 1128, 987, 1],
[538, 5927, 1128, 987, 1],
[538, 6029, 1120, 979, 1],
[538, 6099, 1120, 979, 1],
[538, 6220, 1128, 987, 1],
[538, 6221, 1128, 987, 1],
[538, 6315, 1109, 968, 1],
[538, 6339, 1128, 987, 1],
[538, 6373, 1119, 978, 1],
[538, 6389, 1119, 978, 1],
[538, 6419, 1113, 972, 1],
[538, 6431, 1119, 978, 1],
[538, 6439, 1097, 955, 1],
[538, 6440, 1097, 955, 1],
[538, 6441, 1097, 955, 1],
[538, 6479, 1113, 972, 1],
[538, 6481, 1097, 955, 1],
[538, 6542, 1128, 987, 1],
[538, 6543, 1128, 987, 1],
[538, 6544, 1128, 987, 1],
[538, 6545, 1128, 987, 1],
[538, 6546, 1128, 987, 1],
[538, 6570, 1096, 984, 1],
[538, 6571, 1119, 978, 1],
[538, 6643, 1119, 978, 1],
[538, 6648, 1128, 987, 1],
[538, 6649, 1128, 987, 1],
[538, 6650, 1128, 987, 1],
[538, 6670, 1097, 955, 1],
[538, 6757, 1097, 955, 1],
[538, 6792, 1128, 987, 1],
[538, 6793, 1128, 987, 1],
[538, 6842, 1096, 984, 1],
[538, 6856, 1097, 955, 1],
[538, 6874, 1128, 987, 1],
[538, 6884, 1096, 1264, 1],
[538, 6892, 1103, 962, 1],
[538, 6914, 1119, 978, 1],
[538, 6916, 1096, 954, 1],
[538, 6933, 1114, 1264, 1],
[538, 6934, 1128, 987, 1],
[538, 6935, 1128, 987, 1],
[538, 6940, 1096, 954, 1],
[538, 6941, 1096, 954, 1],
[538, 7099, 1095, 954, 1],
[538, 7189, 1095, 954, 1],
[538, 7190, 1095, 987, 1],
[538, 7191, 1095, 987, 1],
[538, 7192, 1095, 987, 1],
[538, 7193, 1095, 984, 1],
[538, 7194, 1095, 987, 1],
[538, 7195, 1095, 979, 1],
[538, 7196, 1095, 987, 1],
[538, 7197, 1095, 987, 1],
[538, 7198, 1095, 987, 1],
[538, 7199, 1095, 987, 1],
[538, 7200, 1095, 987, 1],
[538, 7201, 1095, 984, 1],
[538, 7202, 1095, 985, 1],
[538, 7203, 1095, 979, 1],
[538, 7204, 1095, 984, 1],
[538, 7205, 1095, 985, 1],
[538, 7206, 1095, 984, 1],
[538, 7207, 1095, 985, 1],
[538, 7208, 1095, 965, 1],
[538, 7209, 1095, 984, 1],
[538, 7210, 1095, 984, 1],
[538, 7211, 1095, 984, 1],
[538, 7212, 1095, 970, 1],
[538, 7213, 1095, 984, 1],
[538, 7214, 1095, 987, 1],
[538, 7215, 1095, 987, 1],
[538, 7216, 1095, 954, 1],
[538, 7217, 1095, 954, 1],
[538, 7218, 1095, 954, 1],
[538, 7229, 1114, 1264, 1],
[538, 7277, 1097, 955, 1],
[538, 7353, 1096, 984, 1],
[538, 7354, 1096, 987, 1],
[538, 7357, 1109, 968, 1],
[538, 7415, 1119, 978, 1],
[538, 7449, 1096, 984, 1],
[538, 7450, 1096, 984, 1],
[538, 7475, 1128, 987, 1],
[538, 7476, 1128, 987, 1],
[538, 7477, 1128, 987, 1],
[538, 7478, 1128, 987, 1],
[538, 7588, 1096, 984, 1],
[538, 7589, 1096, 984, 1],
[538, 7609, 1097, 955, 1],
[538, 7634, 1119, 978, 1],
[538, 7637, 1128, 987, 1],
[538, 7680, 1103, 962, 1],
[538, 7708, 1128, 987, 1],
[538, 7835, 1096, 984, 1],
[538, 7836, 1096, 984, 1],
[538, 7837, 1096, 984, 1],
[538, 7838, 1096, 984, 1],
[538, 7839, 1096, 984, 1],
[538, 7840, 1096, 984, 1],
[538, 7841, 1096, 984, 1],
[538, 7842, 1096, 984, 1],
[538, 7843, 1096, 984, 1],
[538, 7844, 1096, 984, 1],
[538, 7845, 1096, 984, 1],
[538, 7846, 1096, 984, 1],
[538, 8013, 1096, 954, 1],
[538, 8212, 1128, 987, 1],
[538, 8225, 1119, 978, 1],
[538, 8403, 1119, 978, 1],
[538, 8615, 1096, 984, 1],
[538, 8616, 1096, 984, 1],
[538, 8617, 1096, 984, 1],
[538, 8618, 1096, 984, 1],
[538, 8653, 1097, 955, 1],
[538, 8666, 1128, 987, 1],
[538, 8667, 1128, 987, 1],
[538, 8707, 1128, 987, 1],
[538, 8815, 1103, 962, 1],
[538, 8910, 1128, 987, 1],
[538, 9121, 1103, 962, 1],
[538, 9235, 1128, 987, 1],
[538, 9333, 1103, 962, 1],
[538, 9388, 1128, 987, 1],
[538, 9389, 1128, 987, 1],
[538, 9390, 1128, 987, 1],
[538, 9391, 1128, 987, 1],
[538, 9596, 1128, 987, 1],
[538, 9644, 1096, 984, 1],
[538, 9645, 1096, 984, 1],
[538, 9690, 1128, 987, 1],
[538, 9744, 1096, 984, 1],
[538, 9745, 1096, 984, 1],
[538, 9829, 1096, 984, 1],
[538, 9830, 1096, 984, 1],
[538, 9831, 1096, 987, 1],
[538, 9832, 1096, 987, 1],
[538, 9833, 1096, 984, 1],
[538, 9834, 1096, 984, 1],
[538, 9835, 1119, 978, 1],
[538, 9862, 1096, 987, 1],
[538, 9863, 1096, 984, 1],
[538, 9864, 1096, 984, 1],
[538, 9865, 1096, 984, 1],
[538, 9867, 1103, 962, 1],
[538, 9868, 1128, 987, 1],
[538, 9869, 1128, 987, 1],
[538, 9870, 1128, 987, 1],
[538, 9886, 1096, 984, 1],
[538, 9887, 1096, 954, 1],
[538, 9888, 1096, 984, 1],
[538, 9889, 1096, 984, 1],
[538, 9901, 1096, 985, 1],
[538, 9902, 1096, 985, 1],
[538, 9911, 1096, 984, 1],
[538, 9939, 1128, 987, 1],
[538, 9940, 1128, 987, 1],
[538, 10024, 1097, 955, 1],
[538, 10236, 1119, 978, 1],
[538, 10237, 1128, 987, 1],
[538, 10238, 1128, 987, 1],
[538, 10283, 1128, 987, 1],
[538, 10284, 1128, 987, 1],
[538, 10326, 1128, 987, 1],
[538, 10327, 1128, 987, 1],
[538, 10454, 1128, 987, 1],
[538, 10455, 1128, 987, 1],
[538, 10456, 1128, 987, 1],
[538, 10492, 1119, 978, 1],
[538, 10540, 1128, 987, 1],
[538, 10588, 1128, 987, 1],
[538, 10589, 1128, 987, 1],
[538, 10704, 1128, 987, 1],
[538, 10746, 1103, 962, 1],
[538, 10751, 1128, 987, 1],
[538, 10785, 1096, 984, 1],
[538, 10786, 1096, 984, 1],
[538, 10787, 1096, 984, 1],
[538, 10788, 1096, 984, 1],
[538, 10844, 1119, 978, 1],
[538, 10885, 1119, 978, 1],
[538, 10886, 1119, 978, 1],
[538, 10890, 1128, 987, 1],
[538, 10917, 1128, 987, 1],
[538, 10921, 1119, 978, 1],
[538, 10922, 1119, 978, 1],
[538, 11129, 1128, 987, 1],
[538, 11133, 1113, 972, 1],
[538, 11147, 1128, 987, 1],
[538, 11157, 1096, 984, 1],
[538, 11158, 1103, 962, 1],
[538, 11234, 1103, 962, 1],
[538, 11274, 1096, 984, 1],
[538, 11275, 1096, 984, 1],
[538, 11318, 1105, 964, 1],
[538, 11319, 1105, 964, 1],
[538, 11329, 1103, 962, 1],
[538, 11336, 1113, 972, 1],
[538, 11337, 1113, 972, 1],
[538, 11360, 1128, 987, 1],
[538, 11361, 1128, 987, 1],
[538, 11442, 1103, 962, 1],
[538, 11520, 1096, 984, 1],
[538, 11521, 1096, 984, 1],
[538, 11553, 1114, 1264, 1],
[538, 11571, 1128, 987, 1],
[538, 11572, 1128, 987, 1],
[538, 11587, 1114, 1264, 1],
[538, 11593, 1120, 979, 1],
[538, 11594, 1120, 979, 1],
[538, 11601, 1128, 987, 1],
[538, 11613, 1128, 987, 1],
[538, 11614, 1128, 987, 1],
[538, 11616, 1128, 987, 1],
[538, 11617, 1128, 987, 1],
[538, 11618, 1128, 987, 1],
[538, 11752, 1103, 962, 1],
[538, 11769, 1120, 979, 1],
[538, 11785, 1120, 979, 1],
[538, 11792, 1128, 987, 1],
[538, 11793, 1128, 987, 1],
[538, 11794, 1128, 987, 1],
[538, 11848, 1096, 984, 1],
[538, 11849, 1096, 984, 1],
[538, 11874, 1105, 964, 1],
[538, 11923, 1105, 964, 1],
[538, 11924, 1105, 964, 1],
[538, 11945, 1128, 987, 1],
[538, 11984, 1128, 987, 1],
[538, 12071, 1105, 964, 1],
[538, 12203, 1128, 987, 1],
[538, 12204, 1128, 987, 1],
[538, 12240, 1105, 964, 1],
[538, 12241, 1105, 964, 1],
[538, 12242, 1103, 962, 1],
[538, 12245, 1105, 964, 1],
[538, 12250, 1105, 964, 1],
[538, 12251, 1105, 964, 1],
[538, 12259, 1128, 987, 1],
[538, 12299, 1105, 964, 1],
[538, 12300, 1105, 964, 1],
[538, 12301, 1105, 964, 1],
[538, 12328, 1113, 972, 1],
[538, 12329, 1113, 972, 1],
[538, 12330, 1113, 972, 1],
[538, 12331, 1113, 972, 1],
[538, 12344, 1128, 987, 1],
[538, 12359, 1114, 1264, 1],
[538, 12360, 1114, 1264, 1],
[538, 12367, 1128, 987, 1],
[538, 12368, 1128, 987, 1],
[538, 12383, 1128, 987, 1],
[538, 12401, 1096, 984, 1],
[538, 12444, 1096, 984, 1],
[538, 12476, 1128, 987, 1],
[538, 12493, 1128, 987, 1],
[538, 12505, 1119, 978, 1],
[538, 12506, 1128, 987, 1],
[538, 12508, 1105, 964, 1],
[538, 12509, 1105, 964, 1],
[538, 12534, 1128, 987, 1],
[538, 12535, 1128, 987, 1],
[538, 12536, 1128, 987, 1],
[538, 12537, 1119, 978, 1],
[538, 12539, 1113, 972, 1],
[538, 12540, 1113, 972, 1],
[538, 12561, 1113, 972, 1],
[538, 12562, 1113, 972, 1],
[538, 12582, 1113, 972, 1],
[538, 12583, 1113, 972, 1],
[538, 12590, 1128, 987, 1],
[538, 12591, 1128, 987, 1],
[538, 12611, 1128, 987, 1],
[538, 12612, 1128, 987, 1],
[538, 12614, 1128, 987, 1],
[538, 12626, 1113, 972, 1],
[538, 12627, 1113, 972, 1],
[538, 12656, 1103, 962, 1],
[538, 12670, 1103, 962, 1],
[538, 12683, 1128, 987, 1],
[538, 12686, 1120, 979, 1],
[538, 12687, 1131, 990, 1],
[538, 12689, 1128, 987, 1],
[538, 12690, 1128, 987, 1],
[538, 12704, 1096, 985, 1],
[538, 12705, 1096, 985, 1],
[538, 12723, 1114, 1264, 1],
[538, 12727, 1128, 987, 1],
[538, 12729, 1128, 987, 1],
[538, 12730, 1128, 987, 1],
[538, 12731, 1128, 987, 1],
[538, 12732, 1128, 987, 1],
[538, 12750, 1114, 1264, 1],
[538, 12755, 1128, 987, 1],
[538, 12766, 1114, 1264, 1],
[538, 12781, 1096, 963, 1],
[538, 12848, 1097, 955, 1],
[538, 12851, 1097, 955, 1],
[538, 12862, 1096, 954, 1],
[538, 12863, 1128, 987, 1],
[538, 12864, 1128, 987, 1],
[538, 12869, 1128, 987, 1],
[538, 12870, 1128, 987, 1],
[538, 12871, 1128, 987, 1],
[538, 12874, 1120, 979, 1],
[538, 12898, 1128, 987, 1],
[538, 12913, 1128, 987, 1],
[538, 12923, 1097, 955, 1],
[538, 12934, 1113, 972, 1],
[538, 12935, 1113, 972, 1],
[538, 12951, 1103, 962, 1],
[538, 12956, 1120, 979, 1],
[538, 13013, 1128, 987, 1],
[538, 13014, 1128, 987, 1],
[538, 13015, 1128, 987, 1],
[538, 13034, 1097, 955, 1],
[538, 13035, 1103, 962, 1],
[538, 13109, 1128, 987, 1],
[538, 13214, 1128, 987, 1],
[538, 13215, 1128, 987, 1],
[538, 13216, 1128, 987, 1],
[538, 13217, 1128, 987, 1],
[538, 13286, 1128, 987, 1],
[538, 13329, 1103, 962, 1],
[538, 13354, 1128, 987, 1],
[538, 13355, 1128, 987, 1],
[538, 13397, 1103, 962, 1],
[538, 13400, 1119, 978, 1],
[538, 13401, 1119, 978, 1],
[538, 13435, 1096, 985, 1],
[538, 13448, 1097, 955, 1],
[538, 13451, 1128, 987, 1],
[538, 13452, 1128, 987, 1],
[538, 13541, 1128, 987, 1],
[538, 13545, 1097, 955, 1],
[538, 13577, 1097, 955, 1],
[538, 13652, 1119, 978, 1],
[538, 13653, 1119, 978, 1],
[538, 13685, 1128, 987, 1],
[538, 13686, 1128, 987, 1],
[538, 13723, 1128, 987, 1],
[538, 13724, 1128, 987, 1],
[538, 13814, 1097, 955, 1],
[538, 13818, 1113, 972, 1],
[538, 13819, 1113, 972, 1],
[538, 13863, 1128, 987, 1],
[538, 13879, 1650, 1621, 1],
[538, 13991, 1128, 987, 1],
[538, 13992, 1119, 978, 1],
[538, 13994, 1119, 978, 1],
[538, 13995, 1650, 1621, 1],
[538, 13996, 1650, 1621, 1],
[538, 14055, 1095, 984, 1],
[538, 14056, 1095, 984, 1],
[538, 14081, 1119, 978, 1],
[538, 14097, 1128, 987, 1],
[538, 14104, 1128, 987, 1],
[538, 14148, 1114, 1264, 1],
[538, 14159, 1096, 954, 1],
[538, 14160, 1096, 954, 1],
[538, 14194, 1128, 987, 1],
[538, 14195, 1128, 987, 1],
[538, 14354, 1128, 987, 1],
[538, 14355, 1128, 987, 1],
[538, 14357, 1128, 987, 1],
[538, 14635, 1128, 987, 1],
[538, 14700, 1103, 962, 1],
[538, 14787, 1128, 987, 1],
[538, 14808, 1096, 954, 1],
[538, 14809, 1119, 978, 1],
[538, 14845, 1128, 987, 1],
[538, 15008, 1128, 987, 1],
[538, 15009, 1128, 987, 1],
[538, 15026, 1096, 954, 1],
[538, 15027, 1119, 978, 1],
[538, 15079, 1128, 987, 1],
[538, 15080, 1128, 987, 1],
[538, 15152, 1128, 987, 1],
[538, 15153, 1128, 987, 1],
[538, 15154, 1128, 987, 1],
[538, 15165, 1096, 954, 1],
[538, 15205, 1096, 984, 1],
[538, 15206, 1128, 987, 1],
[538, 15350, 1097, 955, 1],
[538, 15724, 1128, 987, 1],
[538, 15880, 1128, 987, 1],
[538, 15881, 1128, 987, 1],
[538, 15898, 1096, 954, 1],
[538, 15900, 1097, 955, 1],
[538, 16151, 1128, 987, 1],
[538, 16152, 1128, 987, 1],
[538, 16183, 1128, 987, 1],
[538, 16280, 1096, 987, 1],
[538, 16413, 1650, 1621, 1],
[538, 16414, 1650, 1621, 1],
[538, 16462, 1119, 978, 1],
[538, 16677, 1128, 987, 1],
[538, 16683, 1097, 955, 1],
[538, 16693, 1113, 972, 1],
[538, 16696, 1113, 972, 1],
[538, 16718, 1128, 987, 1],
[538, 16734, 1128, 987, 1],
[538, 16743, 1128, 987, 1],
[538, 16746, 1114, 1264, 1],
[538, 16849, 1128, 987, 1],
[538, 16850, 1128, 987, 1],
[538, 16944, 1128, 987, 1],
[538, 16947, 1128, 987, 1],
[538, 16948, 1128, 987, 1],
[538, 16949, 1128, 987, 1],
[538, 16952, 1128, 987, 1],
[538, 16957, 1650, 1621, 1],
[538, 16960, 1114, 1264, 1],
[538, 16961, 1096, 954, 1],
[538, 17042, 1650, 1621, 1],
[538, 17043, 1650, 1621, 1],
[538, 17047, 1650, 1621, 1],
[538, 17048, 1650, 1621, 1],
[538, 17049, 1650, 1621, 1],
[538, 17050, 1650, 1621, 1],
[538, 17053, 1650, 1621, 1],
[538, 17070, 1113, 972, 1],
[538, 17071, 1113, 972, 1],
[538, 17114, 1128, 987, 1],
[538, 17115, 1128, 987, 1],
[538, 17143, 1128, 987, 1],
[538, 17199, 1128, 987, 1],
[538, 17200, 1128, 987, 1],
[538, 17201, 1128, 987, 1],
[538, 17202, 1128, 987, 1],
[538, 17214, 1117, 976, 1],
[538, 17286, 1113, 972, 1],
[538, 17287, 1113, 972, 1],
[538, 17306, 1096, 954, 1],
[538, 17325, 1128, 987, 1],
[538, 17334, 1128, 987, 1],
[538, 17344, 1097, 955, 1],
[538, 17347, 1128, 987, 1],
[538, 17424, 1128, 987, 1],
[538, 17437, 1095, 954, 1],
[538, 17438, 1097, 955, 1],
[538, 17444, 1650, 1621, 1],
[538, 17445, 1650, 1621, 1],
[538, 17500, 1114, 1264, 1],
[538, 17511, 1128, 987, 1],
[538, 17514, 1128, 987, 1],
[538, 17527, 1114, 1264, 1],
[538, 17698, 1128, 987, 1],
[538, 17701, 1117, 976, 1],
[538, 17710, 1097, 955, 1],
[538, 17746, 1114, 1264, 1],
[538, 17765, 1097, 955, 1],
[538, 17772, 1117, 976, 1],
[538, 17775, 1128, 987, 1],
[538, 17776, 1128, 987, 1],
[538, 17777, 1128, 987, 1],
[538, 17806, 1119, 978, 1],
[538, 17836, 1119, 978, 1],
[538, 17974, 1117, 976, 1],
[538, 17980, 1097, 955, 1],
[538, 17990, 1095, 985, 1],
[538, 18001, 1095, 985, 1],
[538, 18002, 1128, 987, 1],
[538, 18003, 1128, 987, 1],
[538, 18004, 1128, 987, 1],
[538, 18023, 1128, 987, 1],
[538, 18057, 1128, 987, 1],
[538, 18095, 1120, 979, 1],
[538, 18097, 1114, 1264, 1],
[538, 18111, 1650, 1621, 1],
[538, 18112, 1650, 1621, 1],
[538, 18145, 1117, 976, 1],
[538, 18146, 1120, 979, 1],
[538, 18168, 1114, 1264, 1],
[538, 18186, 1128, 987, 1],
[538, 18189, 1128, 987, 1],
[538, 18193, 1096, 954, 1],
[538, 18225, 1115, 974, 1],
[538, 18226, 1115, 974, 1],
[538, 18259, 1096, 954, 1],
[538, 18264, 1128, 987, 1],
[538, 18265, 1128, 987, 1],
[538, 18266, 1128, 987, 1],
[538, 18289, 1650, 1621, 1],
[538, 18355, 1128, 987, 1],
[538, 18472, 1820, 1810, 1],
[538, 18523, 1113, 972, 1],
[538, 18524, 1113, 972, 1],
[538, 18547, 1128, 987, 1],
[538, 18549, 1820, 1810, 1],
[538, 18590, 1128, 987, 1],
[538, 18602, 1103, 962, 1],
[538, 18636, 1119, 978, 1],
[538, 18706, 1128, 987, 1],
[538, 18725, 1128, 987, 1],
[538, 18726, 1128, 987, 1],
[538, 18735, 1128, 987, 1],
[538, 18736, 1128, 987, 1],
[538, 18755, 1128, 987, 1],
[538, 18756, 1128, 987, 1],
[538, 18765, 1095, 954, 1],
[538, 18827, 1114, 1264, 1],
[538, 18837, 1096, 954, 1],
[538, 18853, 1113, 972, 1],
[538, 18854, 1113, 972, 1],
[538, 18871, 1120, 979, 1],
[538, 18873, 1113, 972, 1],
[538, 18874, 1113, 972, 1],
[538, 18890, 1128, 987, 1],
[538, 18906, 1820, 1810, 1],
[538, 18930, 1114, 1264, 1],
[538, 18931, 1114, 1264, 1],
[538, 18932, 1114, 1264, 1],
[538, 18933, 1114, 1264, 1],
[538, 18934, 1114, 1264, 1],
[538, 18935, 1114, 1264, 1],
[538, 18936, 1114, 1264, 1],
[538, 18937, 1114, 1264, 1],
[538, 18989, 1114, 1264, 1],
[538, 19002, 1820, 1810, 1],
[538, 19003, 1114, 1264, 1],
[538, 19004, 1114, 1264, 1],
[538, 19014, 1128, 987, 1],
[538, 19035, 1120, 979, 1],
[538, 19058, 1128, 987, 1],
[538, 19072, 1114, 1264, 1],
[538, 19078, 1113, 972, 1],
[538, 19079, 1113, 972, 1],
[538, 19104, 1820, 1810, 1],
[538, 19126, 1120, 979, 1],
[538, 19241, 1119, 978, 1],
[538, 19290, 1117, 976, 1],
[538, 19292, 1115, 974, 1],
[538, 19293, 1115, 974, 1],
[538, 19295, 1115, 974, 1],
[538, 19324, 1128, 987, 1],
[538, 19403, 1820, 1810, 1],
[538, 19466, 1115, 974, 1],
[538, 19467, 1115, 974, 1],
[538, 19518, 1114, 1264, 1],
[538, 19534, 1128, 987, 1],
[538, 19548, 1103, 962, 1],
[538, 19565, 1128, 987, 1],
[538, 19585, 1110, 969, 1],
[538, 19595, 1820, 1810, 1],
[538, 19619, 1113, 972, 1],
[538, 19641, 1128, 987, 1],
[538, 19643, 1128, 987, 1],
[538, 19644, 1128, 987, 1],
[538, 19645, 1128, 987, 1],
[538, 19649, 1128, 987, 1],
[538, 19668, 1128, 987, 1],
[538, 19746, 1117, 976, 1],
[538, 19750, 1128, 987, 1],
[538, 19799, 1820, 1810, 1],
[538, 19820, 1113, 972, 1],
[538, 19839, 1128, 987, 1],
[538, 19854, 1119, 978, 1],
[538, 19902, 1820, 1810, 1],
[538, 19903, 1820, 1810, 1],
[538, 20005, 1128, 987, 1],
[538, 20007, 1128, 987, 1],
[538, 20013, 1097, 955, 1],
[538, 20039, 1128, 987, 1],
[538, 20117, 1119, 978, 1],
[538, 20174, 1128, 987, 1],
[538, 20191, 1097, 955, 1],
[538, 20199, 1820, 1810, 1],
[538, 20200, 1820, 1810, 1],
[538, 20250, 1117, 976, 1],
[538, 20263, 1128, 987, 1],
[538, 20267, 1097, 955, 1],
[538, 20268, 1128, 987, 1],
[538, 20286, 1119, 978, 1],
[538, 20295, 1097, 955, 1],
[538, 20396, 1820, 1810, 1],
[538, 20412, 1128, 987, 1],
[538, 20489, 1095, 954, 1],
[538, 20515, 1117, 976, 1],
[538, 20520, 1820, 1810, 1],
[538, 20572, 1128, 987, 1],
[538, 20608, 1128, 987, 1],
[538, 20838, 1820, 1810, 1],
[538, 20839, 1820, 1810, 1],
[538, 20878, 1128, 987, 1],
[538, 20879, 1128, 987, 1],
[538, 20904, 1114, 1264, 1],
[538, 20974, 1820, 1810, 1],
[538, 20977, 1114, 1264, 1],
[538, 20982, 1128, 987, 1],
[538, 20999, 1128, 987, 1],
[538, 21314, 1128, 987, 1],
[538, 21350, 1820, 1810, 1],
[538, 21399, 1820, 1810, 1],
[538, 21498, 1820, 1810, 1],
[538, 21542, 1114, 1264, 1],
[538, 21545, 1097, 955, 1],
[538, 21626, 1128, 987, 1],
[538, 21627, 1128, 987, 1],
[538, 21780, 1117, 976, 1],
[538, 21868, 1128, 987, 1],
[538, 21923, 1128, 987, 1],
[538, 21925, 1128, 987, 1],
[538, 21964, 1097, 955, 1],
[538, 21968, 1820, 1810, 1],
[538, 21976, 1117, 976, 1],
[538, 22094, 1128, 987, 1],
[538, 22095, 1128, 987, 1],
[538, 22430, 1113, 972, 1],
[538, 22431, 1113, 972, 1],
[538, 22436, 1128, 984, 1],
[538, 22437, 1128, 987, 1],
[538, 22461, 1128, 987, 1],
[538, 22462, 1128, 987, 1],
[538, 22463, 1128, 987, 1],
[538, 22464, 1128, 987, 1],
[538, 22503, 1114, 1264, 1],
[538, 22527, 1114, 1264, 1],
[538, 22565, 1097, 955, 1],
[538, 22569, 1119, 978, 1],
[538, 22578, 1128, 987, 1],
[538, 22585, 1114, 1264, 1],
[538, 22630, 1114, 1264, 1],
[538, 22646, 1128, 987, 1],
[538, 22666, 1128, 987, 1],
[538, 22673, 1114, 1264, 1],
[538, 22723, 1097, 955, 1],
[538, 22724, 1097, 955, 1],
[538, 22726, 1117, 976, 1],
[538, 22773, 1128, 987, 1],
[538, 22812, 1820, 1810, 1],
[538, 22841, 1128, 987, 1],
[538, 22842, 1128, 987, 1],
[538, 22843, 1128, 987, 1],
[538, 23124, 1097, 955, 1],
[538, 23182, 1128, 987, 1],
[538, 23210, 1119, 978, 1],
[538, 23224, 1097, 955, 1],
[538, 23226, 1128, 987, 1],
[538, 23346, 1128, 987, 1],
[538, 23347, 1128, 987, 1],
[538, 23351, 1117, 976, 1],
[538, 23359, 1820, 1810, 1],
[538, 23420, 1119, 978, 1],
[538, 23441, 1114, 1264, 1],
[538, 23447, 1128, 987, 1],
[538, 23453, 1117, 976, 1],
[538, 23476, 1128, 987, 1],
[538, 23477, 1128, 987, 1],
[538, 23516, 1128, 987, 1],
[538, 23555, 1097, 955, 1],
[538, 23586, 1097, 955, 1],
[538, 23609, 1117, 976, 1],
[538, 23611, 1128, 987, 1],
[538, 23651, 1119, 978, 1],
[538, 23666, 1128, 987, 1],
[538, 23667, 1128, 987, 1],
[538, 23669, 1119, 978, 1],
[538, 23707, 1128, 987, 1],
[538, 23737, 1095, 954, 1],
[538, 23748, 1113, 972, 1],
[538, 23749, 1113, 972, 1],
[538, 23827, 1114, 1264, 1],
[538, 23828, 1114, 1264, 1],
[538, 23860, 1128, 987, 1],
[538, 23861, 1128, 987, 1],
[538, 23873, 1128, 987, 1],
[538, 23911, 1095, 954, 1],
[538, 23938, 1128, 987, 1],
[538, 23941, 1820, 1810, 1],
[538, 23979, 1114, 1264, 1],
[538, 23983, 1128, 987, 1],
[538, 24011, 1128, 987, 1],
[538, 24016, 1128, 987, 1],
[538, 24042, 1820, 1810, 1],
[538, 24047, 1128, 987, 1],
[538, 24048, 1128, 987, 1],
[538, 24061, 1128, 987, 1],
[538, 24099, 1128, 987, 1],
[538, 24100, 1114, 1264, 1],
[538, 24233, 1097, 955, 1],
[538, 24238, 1097, 955, 1],
[538, 24286, 1820, 1810, 1],
[538, 24296, 1128, 987, 1],
[538, 24297, 1128, 987, 1],
[538, 24360, 1128, 987, 1],
[538, 24361, 1128, 987, 1],
[538, 24362, 1128, 987, 1],
[538, 24369, 1820, 1810, 1],
[538, 24396, 1114, 1264, 1],
[538, 24530, 1128, 987, 1],
[538, 24534, 1128, 987, 1],
[538, 24535, 1128, 987, 1],
[538, 24552, 1128, 987, 1],
[538, 24749, 1114, 1264, 1],
[538, 24755, 1128, 987, 1],
[538, 24796, 1113, 972, 1],
[538, 24797, 1113, 972, 1],
[538, 24826, 1095, 985, 1],
[538, 24891, 1128, 987, 1],
[538, 24892, 1119, 978, 1],
[538, 24897, 1117, 976, 1],
[538, 24913, 1119, 978, 1],
[538, 25021, 1114, 1264, 1],
[538, 25036, 1120, 979, 1],
[538, 25037, 1120, 979, 1],
[538, 25049, 1117, 976, 1],
[538, 25057, 1820, 1810, 1],
[538, 25074, 1128, 987, 1],
[538, 25075, 1128, 987, 1],
[538, 25171, 1128, 987, 1],
[538, 25172, 1128, 987, 1],
[538, 25174, 1128, 987, 1],
[538, 25200, 1128, 987, 1],
[538, 25279, 1128, 987, 1],
[538, 25280, 1128, 987, 1],
[538, 25405, 1820, 1810, 1],
[538, 25420, 1128, 987, 1],
[538, 25421, 1128, 987, 1],
[538, 25475, 1097, 955, 1],
[538, 25510, 1820, 1810, 1],
[538, 25534, 1097, 955, 1],
[538, 25537, 1117, 976, 1],
[538, 25546, 1128, 987, 1],
[538, 25579, 1820, 1810, 1],
[538, 25605, 1820, 1810, 1],
[538, 25633, 1117, 976, 1],
[538, 25656, 1128, 987, 1],
[538, 25667, 1117, 976, 1],
[538, 25696, 1128, 987, 1],
[538, 25744, 1820, 1810, 1],
[538, 25829, 1097, 955, 1],
[538, 25853, 1103, 962, 1],
[538, 25871, 1128, 987, 1],
[538, 25872, 1128, 987, 1],
[538, 25873, 1113, 972, 1],
[538, 25874, 1113, 972, 1],
[538, 25880, 1117, 976, 1],
[538, 25886, 1128, 987, 1],
[538, 25899, 1114, 1264, 1],
[538, 25922, 1128, 987, 1],
[538, 25963, 1095, 954, 1],
[538, 26002, 1128, 987, 1],
[538, 26003, 1128, 987, 1],
[538, 26026, 1128, 987, 1],
[538, 26183, 1128, 987, 1],
[538, 26184, 1128, 987, 1],
[538, 26195, 1820, 1810, 1],
[538, 26196, 1820, 1810, 1],
[538, 26263, 1128, 987, 1],
[538, 26382, 1114, 1264, 1],
[538, 26387, 1128, 987, 1],
[538, 26736, 1128, 987, 1],
[538, 26738, 1128, 987, 1],
[538, 26739, 1128, 987, 1],
[538, 26960, 1097, 955, 1],
[538, 26996, 1128, 987, 1],
[538, 26997, 1128, 987, 1],
[538, 26998, 1128, 987, 1],
[538, 27007, 1812, 1803, 1],
[538, 27124, 1128, 987, 1],
[538, 27210, 1128, 987, 1],
[538, 27287, 1114, 1264, 1],
[538, 27289, 1117, 976, 1],
[538, 27306, 1097, 955, 1],
[538, 27338, 1128, 987, 1],
[538, 27339, 1128, 987, 1],
[538, 27341, 1117, 976, 1],
[538, 27348, 1097, 955, 1],
[538, 27352, 1128, 987, 1],
[538, 27353, 1128, 987, 1],
[538, 27357, 1097, 955, 1],
[538, 27371, 1128, 987, 1],
[538, 27376, 1119, 981, 1],
[538, 27393, 1128, 987, 1],
[538, 27402, 1117, 976, 1],
[538, 27453, 1128, 987, 1],
[538, 27464, 1128, 987, 1],
[538, 27474, 1117, 976, 1],
[538, 27485, 1128, 987, 1],
[538, 27561, 1113, 972, 1],
[538, 27562, 1113, 972, 1],
[538, 27574, 1128, 987, 1],
[538, 27657, 1097, 955, 1],
[538, 27683, 1128, 987, 1],
[538, 27757, 1113, 972, 1],
[538, 27759, 1113, 972, 1],
[538, 27761, 1097, 955, 1],
[538, 27762, 1117, 976, 1],
[538, 27782, 1128, 987, 1],
[538, 27783, 1128, 987, 1],
[538, 27793, 1119, 978, 1],
[538, 27797, 1097, 955, 1],
[538, 27828, 1113, 972, 1],
[538, 27833, 1097, 955, 1],
[538, 27835, 1113, 972, 1],
[538, 27839, 1128, 987, 1],
[538, 27854, 1117, 976, 1],
[538, 27856, 1128, 987, 1],
[538, 27862, 1128, 987, 1],
[538, 27869, 1128, 987, 1],
[538, 27924, 1128, 987, 1],
[538, 27925, 1128, 987, 1],
[538, 27961, 1128, 987, 1],
[538, 28037, 1113, 972, 1],
[538, 28049, 1128, 987, 1],
[538, 28076, 1128, 987, 1],
[538, 28077, 1128, 987, 1],
[538, 28082, 1117, 976, 1],
[538, 28089, 1113, 972, 1],
[538, 28095, 1128, 987, 1],
[538, 28100, 1128, 987, 1],
[538, 28145, 1128, 987, 1],
[538, 28220, 1128, 987, 1],
[538, 28226, 1812, 1803, 1],
[538, 28235, 1128, 987, 1],
[538, 28348, 1117, 976, 1],
[538, 28351, 1934, 1960, 1],
[538, 28370, 1128, 987, 1],
[538, 28375, 1934, 963, 1],
[538, 28389, 1934, 1960, 1],
[538, 28391, 1113, 972, 1],
[538, 28393, 1934, 1960, 1],
[538, 28395, 1104, 963, 1],
[538, 28406, 1104, 963, 1],
[538, 28415, 1104, 963, 1],
[538, 28423, 1128, 987, 1],
[538, 28424, 1128, 987, 1],
[538, 28426, 1113, 972, 1],
[538, 28435, 1117, 976, 1],
[538, 28438, 1114, 1264, 1],
[538, 28445, 1113, 972, 1],
[538, 28446, 1113, 972, 1],
[538, 28463, 1104, 963, 1],
[538, 28464, 1104, 963, 1],
[538, 28474, 1128, 987, 1],
[538, 28482, 1117, 976, 1],
[538, 28494, 1104, 963, 1],
[538, 28501, 1934, 1960, 1],
[538, 28507, 1114, 1264, 1],
[538, 28508, 1114, 1264, 1],
[538, 28509, 1114, 1264, 1],
[538, 28510, 1114, 1264, 1],
[538, 28530, 1113, 972, 1],
[538, 28531, 1113, 972, 1],
[538, 28566, 1104, 963, 1],
[538, 28573, 1104, 963, 1],
[538, 28628, 1104, 963, 1],
[538, 28629, 1934, 1960, 1],
[538, 28642, 1104, 963, 1],
[538, 28643, 1104, 963, 1],
[538, 28648, 1097, 955, 1],
[538, 28649, 1128, 987, 1],
[538, 28652, 1128, 987, 1],
[538, 28661, 1114, 1264, 1],
[538, 28709, 1095, 987, 1],
[538, 28710, 1095, 987, 1],
[538, 28711, 1095, 987, 1],
[538, 28736, 1934, 1960, 1],
[538, 28738, 1104, 963, 1],
[538, 28739, 1104, 963, 1],
[538, 28768, 1119, 978, 1],
[538, 28812, 1128, 987, 1],
[538, 28813, 1128, 987, 1],
[538, 28833, 1114, 1264, 1],
[538, 28834, 1114, 1264, 1],
[538, 28835, 1114, 1264, 1],
[538, 28836, 1114, 1264, 1],
[538, 28837, 1114, 1264, 1],
[538, 28838, 1114, 1264, 1],
[538, 28839, 1114, 1264, 1],
[538, 28845, 1104, 963, 1],
[538, 28854, 1104, 963, 1],
[538, 28855, 1104, 963, 1],
[538, 28856, 1104, 963, 1],
[538, 28863, 1104, 963, 1],
[538, 28864, 1104, 963, 1],
[538, 28865, 1128, 987, 1],
[538, 28881, 1114, 1264, 1],
[538, 28886, 1114, 1264, 1],
[538, 28906, 1114, 1264, 1],
[538, 28907, 1114, 1264, 1],
[538, 28911, 1117, 976, 1],
[538, 28912, 1812, 1803, 1],
[538, 28914, 1095, 954, 1],
[538, 28915, 1114, 1264, 1],
[538, 28918, 1119, 978, 1],
	];
    }

	public function getDependencies()
	{
		return array(FileFixtures::class, UserFixtures::class, UserFileFixtures::class, Booking_538Fixtures::class);
    }
}
