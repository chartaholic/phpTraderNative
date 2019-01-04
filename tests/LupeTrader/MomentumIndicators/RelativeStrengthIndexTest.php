<?php

namespace LupeCode\phpTraderNativeTest\LupeTrader\MomentumIndicators;

use LupeCode\phpTraderNative\LupeTrader\MomentumIndicators\RelativeStrengthIndex;
use LupeCode\phpTraderNativeTest\TestingTrait;
use PHPUnit\Framework\TestCase;

class RelativeStrengthIndexTest extends TestCase
{
    use TestingTrait;

    /**
     * @throws \Exception
     */
    public function testRsi()
    {
        $optInTimePeriod = 10;
        $this->assertEquals(\trader_rsi($this->High, $optInTimePeriod), $this->adjustForPECL(RelativeStrengthIndex::rsi($this->High, $optInTimePeriod)));
        // A test with real numbers.
        $expected = [
            '42.210139', '45.101929', '43.790895', '44.024530', '44.766276', '42.444434', '48.000712', '43.387497', '50.151878', '54.875765', '46.476423', '40.575072', '45.539758', '47.613588', '44.386741', '41.223737', '49.616844', '50.889708', '53.821251', '50.052066', '48.971100', '53.314404', '52.217529', '51.085649', '49.005748', '44.873849', '50.348316', '39.891732', '44.278588', '47.994485', '46.817654', '49.933871', '55.694793', '53.736302', '55.014014', '55.280020', '58.940617', '50.285986', '44.761536', '43.012268', '51.303298', '54.053435', '49.372593', '46.975564', '44.794978', '49.214314', '41.650776', '46.482220', '49.008324', '47.793580', '47.708699', '47.436434', '48.491563', '36.262877', '39.824684', '34.143726', '43.235154', '38.818494', '41.561516', '38.864092', '35.321889', '31.357898', '34.076185', '37.996955', '35.560439', '38.337523', '35.584957', '40.802948', '40.983594', '36.380568', '35.272427', '36.316932', '32.030886', '28.586394', '32.545789', '28.259153', '26.918714', '34.881916', '32.247423', '30.193482', '27.600608', '27.240716', '22.102399', '19.782925', '18.204042', '24.587512', '23.178912', '31.855723', '42.339904', '37.422332', '40.893819', '46.083348', '45.834278', '44.944830', '53.468048', '49.635845', '48.870488', '50.055282', '50.117523', '43.066245', '44.647382', '50.214816', '46.906383', '49.528304', '56.326269', '54.291897', '54.689855', '53.683162', '56.515458', '60.476269', '59.476124', '62.636911', '67.848693', '70.395688', '68.359165', '69.524440', '70.769607', '70.989704', '59.024694', '59.783842', '59.600880', '63.832334', '57.774446', '52.713437', '55.490157', '61.795305', '64.242416', '69.907488', '58.102394', '60.497014', '57.631898', '63.215569', '59.246658', '52.454033', '48.044407', '46.833006', '46.727265', '48.722093', '48.175699', '47.287333', '49.780555', '47.565390', '48.491029', '43.157875', '47.539249', '50.666455', '57.263833', '51.664946', '55.488415', '60.241130', '60.657133', '59.566447', '61.074004', '62.852393', '59.814512', '57.298068', '52.296049', '57.043103', '44.072413', '41.426100', '34.892326', '40.690291', '49.369603', '48.149120', '50.333699', '43.933833', '43.254177', '45.084004', '46.086954', '44.009508', '40.919572', '38.428973', '35.881079', '35.968983', '27.209610', '29.989026', '28.908348', '28.648929', '32.822456', '38.266650', '37.285247', '45.863047', '47.426056', '50.371855', '45.828722', '51.311700', '50.150082', '41.665223', '48.062853', '50.556842', '52.126783', '46.337265', '56.251859', '55.035151', '54.152187', '54.985480', '51.491515', '59.129101', '61.036646', '61.226782', '54.752799', '57.545952', '38.204380', '56.383780', '59.714488', '62.073404', '62.363481', '63.616679', '61.599866', '58.104685', '54.546423', '62.264369', '62.626982', '60.929376', '63.430451', '63.323977', '59.505277', '59.726294', '62.956195', '62.591746', '64.155933', '62.286086', '64.920742', '69.298878', '67.304416', '62.272428', '66.154737', '67.438507', '62.028564', '58.873861', '57.649489', '58.337041', '55.561625', '56.123615', '55.221124', '48.075094', '54.480397', '57.315600', '59.901817', '60.921764',
        ];
        $result   = RelativeStrengthIndex::rsi($this->Open, 14);
        $count    = count($expected);
        for ($i = 0; $i < $count; $i++) {
            $expected[$i] = round((float)$expected[$i], 6);
            $actual[$i]   = round($result[$i + 14], 6);
        }
        $this->assertEquals($expected, $actual);
    }
}
