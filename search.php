<?php
$bingSearchList = <<<EOT
TIDs AFTER THIS LINE
2020calendar
7mankind
aesop
arenado
armani
babyyoda2
breitling
bruni
burberry
callaway
cartier
cobragolf
columbia
combopanda
dsquared
elieen
farmingsim20
fivio
footballstrike
futurefight
gijoe
hotelempire
kingrabbit
lanvin
lilmama
lindor
lonzoball
lougotcash
mackinnon
maga
mikeyshorts
mille
mizuno
monstertruck
mookie
pandora
partynextdoor
patek
pubgspring
ramirez
saintlaurent
schitts
seiya
sherzer
snackworld
squirrel
stormzy
tetris99
tokyomirage
tuukka
unleashlight
warface
westofdead
TIDs BEFORE THIS LINE
EOT;

$testSearch2List = <<<EOT
TIDs AFTER THIS LINE
asphalt9
TIDs BEFORE THIS LINE
EOT;

$testSearch3List = <<<EOT
TIDs AFTER THIS LINE
2020corvette
adamthielen
alphaputt
amaricooper
andrewluck
anothereden
arcana
arenaallstars
asusrog
austonmatthews
avengersendgame
azzyland
badbunny2
bakermayfield
bakugan
battlebreakers
battlebreakers2
battlefield5
battlelands
battleprime2
beckyg
benee
benr
billieellish
binnington
blackparadox
bobross
bouba
bradleybeal
brownowl
btsworld
bubblewitch3
carsonwentz
cathkidston
citygirls
cloudpunk
connormcdavid
corgis
craftsman
cutebabies
dakprescott
dalvincook
damianlillard
daveeast
diablo4
diablo42
disneyworld
dragonballsuper
dragonblaze
ehlinger
elalfa
epicseven
eveecho
eveecho2
everwild
fantasyisland
farmheroes
ferns
findthediff
fivefinger
fledgling
fordf150
fournette
frenchies2
geometrydash
glokknine
goat2
godsmack
grannychap22
greyhound
halflifealyx
haloreach
hayday
hogwash
hokusai
homepage.php
horseracing
hungryshark
icing
idlefitness
internetmoney
invisibleman
itcosmetics
jackpotparty
jacksepticeye
jakefromm
jamaladams
joelembiid
johncarlson
josiemaran
kanebrown
karltowns
kevingates
kingdomrush
kollision
korn
lanterns
leahashe
legend11
leveonbell
liltecca
lululemon
mactools
marchand
mariokart
marvelsuperwar
mattryan
merlot
mia2
milesm
milkychance
mobilelegendsbang
monomals
monsterlegends
mortalkombat11
mrbeast
nhl20
nikeair
nioh
nioh2
nipseyhussle
nocap
nwa
oladipo
outthere
TIDs BEFORE THIS LINE
EOT;

$testSearch4List = <<<EOT
TIDs AFTER THIS LINE
anuelaa
anuelaa2
azurlane
babyyoda
battleprime
beybladeburst
bitlife
blackblueshards
blackgreen
blackredshards
bloons
brawlhalla
brawlhalla2
brawlstars
brawlstars2
bregman
candycrushsoda
coinmaster
confederateflag
creativedestruction
cyberhunter
dababy
nikejordan
doncic
dragoncity
energy2
eveechoes
fifa20
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
jaydayoungan
johndeere
lilbaby
lilbaby2
liltjay
madden20
meganthee
monstax
monsterenergy
nbayoungboy
nlechoppa
redblackshards2
rodwave
search.php
subaruwrx
talkingtom
tennisclash
traeyoung
ultimaterivals
warrobots
wartortise2
ynwmelly
madden19
TIDs BEFORE THIS LINE
EOT;

$codeList = [
/* testSearch2 */
  "asphalt9" => 635,
/* testSearch4 */
  "anuelaa" => 205,
  "anuelaa2" => 205,
  "azurlane" => 212,
  "babyyoda" => 217,
  "battleprime" => 212,
  "beybladeburst" => 212,
  "bitlife" => 212,
  "blackblueshards" => 218,
  "blackgreen" => 218,
  "blackredshards" => 218,
  "bloons" => 212,
  "brawlhalla" => 212,
  "brawlhalla2" => 212,
  "bregman" => 214,
  "nikejordan" => 216, 
  "brawlstars" => 212,
  "brawlstars2" => 212,
  "candycrushsoda" => 212,
  "coinmaster" => 212,
  "confederateflag" => 218,
  "creativedestruction" => 212,
  "cyberhunter" => 212,
  "dababy" => 211,
  "doncic" => 214,
  "dragoncity" => 212,
  "energy2" => 206,
  "eveechoes" => 212,
  "fifa20" => 203,
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
  "liltjay" => 205,
  "madden20" => 207,
  "meganthee" => 205,
  "monstax" => 205,
  "monsterenergy" => 206,
  "nbayoungboy" => 205,
  "nlechoppa" => 201,
  "redblackshards2" => 218,
  "rodwave" => 205,
  "subaruwrx" => 210,
  "talkingtom" => 212,
  "tennisclash" => 212,
  "traeyoung" => 205,
  "ultimaterivals" => 212,
  "warrobots" => 212,
  "wartortise2" => 212,
  "ynwmelly" => 205,
  "madden19" => 213,
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
