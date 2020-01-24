<?php
$bingSearchList = <<<EOT
TIDs AFTER THIS LINE
7mankind
aesop
afkarena
armani
babyyoda2
bruni
burberry
butterroyale
callaway
columbia
cosette
dior
dsquared
farmingsim20
fireboy
fivio
footballstrike
freefall
futurefight
kareemhunt
kingrabbit
kingscastle
lanvin
lilmama
lougotcash
machado
mackinnon
maga
mikeyshorts
mille
mizuno
monstertruck
nickbosa
pandora
patek
piratesoutlaws
pubgspring
ramirez
rulessurvival
saintlaurent
schitts
seiya
sherzer
smifwessun
snackworld
squirrel
stormzy
tetris99
tokyomirage
treebranches
tuukka
tyreekhill
vex4
warface
warorder
westofdead
yurman
TIDs BEFORE THIS LINE
EOT;

$testSearch2List = <<<EOT
TIDs AFTER THIS LINE
asphalt9
TIDs BEFORE THIS LINE
EOT;

$testSearch3List = <<<EOT
TIDs AFTER THIS LINE
TIDs BEFORE THIS LINE
EOT;

$testSearch4List = <<<EOT
TIDs AFTER THIS LINE
2020calendar
anuelaa
anuelaa2
asusrog
azurlane
babyyoda
bakugan
battleprime
beckyg
beybladeburst
billieellish
bitlife
blackblueshards
blackgreen
blackredshards
bloons
bobross
bobross2
brawlhalla
brawlhalla2
brawlstars
brawlstars2
breitling
bregman
burberry
candycrushsoda
cartier
cobragolf
coinmaster
combopanda
confederateflag
creativedestruction
cyberhunter
dababy
nikejordan
doncic
dragoncity
elieen
energy2
eveechoes
fifa20
fordf150
gacha
garena
garena2
goat
granny
granny2
grannychap2
gtavice
harvester
homepage.php
hotelempire
jaydayoungan
johndeere
lilbaby
lilbaby2
liltecca
liltjay
lindor
lonzoball
madden20
madden19
mia2
mookie
meganthee
monstax
monsterenergy
nbayoungboy
nipseyhussle
nlechoppa
partynextdoor
redblackshards2
rodwave
search.php
subaruwrx
talkingtom
tennisclash
traeyoung
ultimaterivals
unleashlight
warrobots
wartortise2
ynwmelly
TIDs BEFORE THIS LINE
EOT;

$codeList = [
/* testSearch2 */
  "asphalt9" => 635,
/* testSearch4 */
  "anuelaa" => 205,
  "anuelaa2" => 205,
  "arenado" => 214,
  "asusrog" => 219,
  "azurlane" => 212,
  "babyyoda" => 217,
  "bakugan" => 219,
  "battleprime" => 212,
  "beckyg" => 219,
  "billieellish" => 219,
  "beybladeburst" => 212,
  "bitlife" => 212,
  "blackblueshards" => 218,
  "blackgreen" => 218,
  "blackredshards" => 218,
  "bloons" => 212,
  "bobross" => 219,
  "bobross2" => 219,
  "brawlhalla" => 212,
  "brawlhalla2" => 212,
  "bregman" => 214,
  "burberry" => 218,
  "nikejordan" => 216, 
  "brawlstars" => 212,
  "brawlstars2" => 212,
  "candycrushsoda" => 212,
  "cartier" => 218,
  "coinmaster" => 212,
  "confederateflag" => 218,
  "creativedestruction" => 212,
  "cyberhunter" => 212,
  "dababy" => 211,
  "doncic" => 214,
  "dragoncity" => 212,
  "elieen" => 218,
  "energy2" => 206,
  "eveechoes" => 212,
  "fifa20" => 203,
  "fordf150" => 219,
  "gacha" => 212,
  "garena" => 202,
  "garena2" => 202,
  "goat" => 212,
  "granny" => 204,
  "granny2" => 204,
  "grannychap2" => 204,
  "gtavice" => 212,
  "harvester" => 218,
  "jaydayoungan" => 205,
  "johndeere" => 218,
  "lilbaby" => 211,
  "lilbaby2" => 211,
  "liltecca" => 219,
  "liltjay" => 205,
  "lindor" => 214,
  "lonzoball" => 214,
  "madden20" => 207,
  "meganthee" => 205,
  "mia2" => 219,
  "monstax" => 205,
  "monsterenergy" => 206,
  "nbayoungboy" => 205,
  "nipseyhussle" => 219,
  "nlechoppa" => 201,
  "partynextdoor" => 205,
  "redblackshards2" => 218,
  "rodwave" => 205,
  "subaruwrx" => 210,
  "talkingtom" => 212,
  "tennisclash" => 212,
  "traeyoung" => 205,
  "ultimaterivals" => 212,
  "unleashlight" => 212,
  "warrobots" => 212,
  "wartortise2" => 212,
  "ynwmelly" => 205,
  "breitling" => 218,
  "cobragolf" => 218,
  "mookie" => 214,
  "2020calendar" => 218,
  "combopanda" => 212,
  "hotelempire" => 212,
  "gijoe" => 212,
  "madden19" => 212,
];

if (strstr($bingSearchList, PHP_EOL.$tid.PHP_EOL)) {
  $bingSearch = true;
} else if (strstr($testSearch2List, PHP_EOL.$tid.PHP_EOL)) {
  if (array_key_exists($tid, $codeList)) {
    $testSearch2 = $codeList[$tid];
  }
} else if (strstr($testSearch3List, PHP_EOL.$tid.PHP_EOL)) {
  $testSearch3 = true;
} else if (strstr($testSearch4List, PHP_EOL.$tid.PHP_EOL)) {
  if (array_key_exists($tid, $codeList)) {
    $testSearch4 = $codeList[$tid];
  }
}
?>
