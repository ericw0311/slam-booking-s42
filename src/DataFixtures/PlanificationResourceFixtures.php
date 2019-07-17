<?php
// App/DataFixtures/PlanificationResourceFixtures.php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\User;
use App\Entity\Resource;
use App\Entity\PlanificationPeriod;
use App\Entity\PlanificationResource;

class PlanificationResourceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getData() as [$id, $userID, $planificationHeaderID, $resourceID, $oorder]) {
            $user = $this->getReference('user-1');
            $planificationPeriod = $this->getReference('planificationHeader-'.$planificationHeaderID);
            $resource = $this->getReference('resource-'.$resourceID);

            $planificationResource = new PlanificationResource($user, $planificationPeriod, $resource);
            $planificationResource->setOrder($oorder);
            $manager->persist($planificationResource);
            $manager->flush();
            $this->addReference('planificationResource-'.$id, $planificationResource);
        }
    }

    private function getData(): array
    {
        return [
        // $data = [$id, $userID, $planificationHeaderID, $resourceID, $oorder]
        [250, 1, 110, 250, 1],
        [251, 1, 111, 251, 1],
        [252, 1, 112, 252, 1],
        [253, 1, 113, 253, 1],
        [254, 1, 114, 254, 1],
        [269, 1, 122, 269, 1],
        [270, 1, 123, 270, 1],
        [379, 1, 194, 442, 1],
        [451, 1, 225, 654, 1],
        [522, 1, 264, 974, 1],
        [526, 1, 265, 975, 1],
        [528, 1, 267, 973, 1],
        [529, 1, 268, 957, 1],
        [530, 1, 269, 958, 1],
        [531, 1, 270, 987, 1],
        [532, 1, 271, 998, 1],
        [533, 1, 272, 983, 1],
        [534, 1, 273, 959, 1],
        [537, 1, 276, 997, 1],
        [538, 1, 277, 972, 1],
        [539, 1, 278, 994, 1],
        [541, 1, 280, 956, 1],
        [542, 1, 281, 993, 1],
        [543, 1, 282, 984, 1],
        [544, 1, 283, 990, 1],
        [545, 1, 284, 960, 1],
        [546, 1, 285, 961, 1],
        [547, 1, 286, 988, 1],
        [549, 1, 288, 962, 1],
        [550, 1, 289, 963, 1],
        [557, 1, 296, 967, 1],
        [565, 1, 304, 966, 1],
        [569, 1, 308, 968, 1],
        [572, 1, 311, 985, 1],
        [573, 1, 312, 986, 1],
        [574, 1, 313, 999, 1],
        [575, 1, 314, 991, 1],
        [576, 1, 315, 989, 1],
        [577, 1, 316, 982, 1],
        [578, 1, 317, 969, 1],
        [587, 1, 326, 970, 1],
        [589, 1, 328, 1029, 1],
        [590, 1, 329, 1006, 1],
        [591, 1, 329, 1000, 2],
        [592, 1, 329, 1001, 3],
        [593, 1, 329, 1002, 4],
        [594, 1, 329, 1003, 5],
        [595, 1, 329, 1004, 6],
        [596, 1, 329, 1005, 7],
        [597, 1, 330, 954, 1],
        [598, 1, 330, 955, 2],
        [599, 1, 331, 1016, 1],
        [600, 1, 331, 1015, 2],
        [601, 1, 331, 1014, 3],
        [602, 1, 332, 977, 1],
        [603, 1, 332, 978, 2],
        [604, 1, 332, 979, 3],
        [605, 1, 333, 964, 1],
        [606, 1, 333, 965, 2],
        [607, 1, 334, 1009, 1],
        [608, 1, 334, 1008, 2],
        [609, 1, 334, 1010, 3],
        [610, 1, 334, 1011, 4],
        [611, 1, 334, 1007, 5],
        [612, 1, 334, 1013, 6],
        [613, 1, 334, 1012, 7],
        [614, 1, 335, 981, 1],
        [615, 1, 335, 980, 2],
        [616, 1, 336, 995, 1],
        [617, 1, 336, 1057, 2],
        [618, 1, 336, 1058, 3],
        [619, 1, 336, 1059, 4],
        [620, 1, 336, 1060, 5],
        [621, 1, 336, 1061, 6],
        [622, 1, 337, 996, 1],
        [623, 1, 337, 1062, 2],
        [624, 1, 337, 1063, 3],
        [625, 1, 337, 1064, 4],
        [626, 1, 337, 1065, 5],
        [627, 1, 337, 1066, 6],
        [629, 1, 339, 992, 1],
        [672, 1, 360, 976, 1],
        [673, 1, 361, 1156, 1],
        [674, 1, 362, 1157, 1],
        [703, 1, 384, 1219, 1],
        [704, 1, 385, 954, 1],
        [705, 1, 385, 955, 2],
        [706, 1, 385, 1221, 3],
        [707, 1, 289, 1222, 2],
        [739, 1, 399, 995, 1],
        [740, 1, 399, 1057, 2],
        [741, 1, 399, 1058, 3],
        [742, 1, 399, 1059, 4],
        [743, 1, 399, 1060, 5],
        [744, 1, 399, 1061, 6],
        [749, 1, 399, 1261, 7],
        [750, 1, 399, 1262, 8],
        [753, 1, 403, 1272, 1],
        [758, 1, 403, 1273, 2],
        [796, 1, 429, 1412, 1],
        [806, 1, 437, 1453, 1],
        [807, 1, 437, 1454, 2],
        [832, 1, 451, 1505, 1],
        [833, 1, 451, 1506, 2],
        [840, 1, 457, 1524, 2],
        [841, 1, 457, 1525, 1],
        [872, 1, 473, 1613, 1],
        [873, 1, 473, 1615, 2],
        [875, 1, 475, 1453, 1],
        [876, 1, 475, 1454, 2],
        [877, 1, 476, 1272, 1],
        [878, 1, 476, 1273, 2],
        [885, 1, 478, 1683, 1],
        [914, 1, 492, 1505, 1],
        [915, 1, 492, 1506, 2],
        [995, 1, 523, 1587, 1],
        [996, 1, 523, 1588, 2],
        [997, 1, 523, 1589, 3],
        [999, 1, 523, 1586, 4],
        [1000, 1, 524, 1947, 1],
        [1004, 1, 526, 1567, 1],
        [1006, 1, 528, 1968, 1],
        [1007, 1, 529, 1968, 1],
        [1014, 1, 536, 1984, 1],
        [1019, 1, 541, 1983, 1],
        [1020, 1, 542, 1994, 1],
        [1033, 1, 552, 1272, 1],
        [1034, 1, 552, 1273, 2],
        [1041, 1, 558, 2113, 1],
        [1042, 1, 558, 2117, 2],
        [1043, 1, 558, 2118, 3],
        [1044, 1, 558, 2119, 4],
        [1083, 1, 578, 2223, 1],
        [1084, 1, 578, 2224, 2],
        [1085, 1, 578, 2225, 3],
        [1086, 1, 578, 2226, 4],
        [1087, 1, 578, 2227, 5],
        [1090, 1, 581, 983, 1],
        [1124, 1, 591, 2263, 1],
        [1125, 1, 591, 2264, 2],
        [1127, 1, 591, 2265, 3],
        [1128, 1, 592, 1968, 1],
        [1135, 1, 597, 1968, 1],
        [1148, 1, 605, 1968, 1],
        [1166, 1, 620, 1272, 1],
        [1167, 1, 620, 1273, 2],
        [1168, 1, 621, 1453, 1],
        [1169, 1, 621, 1454, 2],
        [1171, 1, 623, 995, 1],
        [1172, 1, 623, 1057, 2],
        [1173, 1, 623, 1058, 3],
        [1174, 1, 623, 1059, 4],
        [1175, 1, 623, 1060, 5],
        [1176, 1, 623, 1061, 6],
        [1177, 1, 623, 1261, 7],
        [1178, 1, 623, 1262, 8],
        [1179, 1, 624, 990, 1],
        [1186, 1, 631, 1412, 1],
        [1198, 1, 643, 967, 1],
        [1199, 1, 644, 988, 1],
        [1208, 1, 646, 1009, 6],
        [1209, 1, 646, 1008, 5],
        [1210, 1, 646, 1010, 4],
        [1211, 1, 646, 1011, 3],
        [1212, 1, 646, 1007, 2],
        [1213, 1, 646, 1013, 1],
        [1214, 1, 646, 1012, 7],
        [1215, 1, 647, 2649, 1],
        [1216, 1, 647, 2650, 2],
        [1217, 1, 648, 974, 1],
        [1231, 1, 655, 1587, 1],
        [1232, 1, 655, 1588, 9],
        [1233, 1, 655, 1589, 2],
        [1234, 1, 655, 1586, 3],
        [1240, 1, 655, 2706, 4],
        [1241, 1, 655, 2705, 5],
        [1242, 1, 655, 2686, 6],
        [1243, 1, 655, 2708, 7],
        [1244, 1, 655, 2707, 8],
        [1245, 1, 657, 2722, 1],
        [1289, 1, 669, 1947, 1],
        [1290, 1, 670, 1453, 1],
        [1291, 1, 670, 1454, 2],
        [1296, 1, 672, 2825, 1],
        [1297, 1, 673, 2826, 1],
        [1298, 1, 674, 2827, 1],
        [1302, 1, 676, 1505, 1],
        [1303, 1, 676, 1506, 2],
        [1305, 1, 678, 2844, 1],
        [1306, 1, 679, 997, 1],
        [1307, 1, 680, 2846, 1],
        [1308, 1, 680, 2847, 2],
        [1309, 1, 680, 2848, 3],
        [1310, 1, 681, 2849, 1],
        [1311, 1, 681, 2850, 2],
        [1312, 1, 681, 2851, 3],
        [1317, 1, 686, 1453, 1],
        [1318, 1, 686, 1454, 2],
        [1325, 1, 689, 2882, 1],
        [1378, 1, 704, 2964, 2],
        [1379, 1, 704, 2963, 1],
        [1390, 1, 708, 2966, 2],
        [1391, 1, 708, 2967, 1],
        [1403, 1, 718, 959, 1],
        [1417, 1, 725, 1016, 1],
        [1418, 1, 725, 1015, 2],
        [1419, 1, 725, 1014, 3],
        [1420, 1, 726, 2986, 1],
        [1421, 1, 727, 2998, 1],
        [1438, 1, 731, 1587, 1],
        [1439, 1, 731, 1588, 9],
        [1440, 1, 731, 1589, 2],
        [1441, 1, 731, 1586, 3],
        [1442, 1, 731, 2706, 4],
        [1443, 1, 731, 2705, 5],
        [1444, 1, 731, 2686, 6],
        [1445, 1, 731, 2708, 7],
        [1446, 1, 731, 2707, 8],
        [1447, 1, 731, 3010, 10],
        [1448, 1, 731, 2999, 11],
        [1452, 1, 734, 968, 1],
        [1453, 1, 735, 999, 1],
        [1455, 1, 737, 1613, 1],
        [1456, 1, 737, 1615, 2],
        [1457, 1, 738, 3064, 1],
        [1458, 1, 739, 3066, 1],
        [1459, 1, 740, 3073, 1],
        [1460, 1, 740, 3074, 2],
        [1461, 1, 740, 3075, 3],
        [1462, 1, 740, 3076, 4],
        [1463, 1, 741, 1947, 1],
        [1464, 1, 741, 3088, 2],
        [1465, 1, 742, 1587, 1],
        [1466, 1, 742, 1588, 6],
        [1467, 1, 742, 1589, 2],
        [1470, 1, 742, 2705, 3],
        [1471, 1, 742, 2686, 4],
        [1472, 1, 742, 2708, 5],
        [1475, 1, 742, 2999, 7],
        [1476, 1, 743, 1543, 1],
    ];
    }

    public function getDependencies()
    {
        return array(UserFixtures::class, PlanificationPeriodFixtures::class, ResourceFixtures::class);
    }
}
