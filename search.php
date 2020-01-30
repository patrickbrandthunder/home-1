<?php
$bingSearchList = <<<EOT
TIDs AFTER THIS LINE
// BING FOR LAUNCH
2020rat
7mankind
aaronjones
aesop
afkarena
armani
babyyoda2
basquiat
bendel
bruni
burberry
butterroyale
columbia
cosette
dior
dsquared
farmingsim20
fireboy
fishingclash
footballstrike
gunblood
hotslide
ji
justblack
kareemhunt
kingrabbit
kingscastle
knightsquad
koji
lanvin
lougotcash
machado
mackinnon
maga
magiclegends
meteorfall
mikeyshorts
mizuno
monstertruck
motox3m
nickbosa
pandora
piratesoutlaws
pubgspring
ramirez
rulessurvival
rustland
saintlaurent
schitts
seiya
smifwessun
stanton
tetris99
tokyomirage
toyblast
treebranches
trollface
tuukka
tyreekhill
vex4
warorder
westofdead
yelich
yurman
TIDs BEFORE THIS LINE
EOT;

$testSearch2List = <<<EOT
// MANIC BING GENERICS
TIDs AFTER THIS LINE
2020calendar
birdwatching
blackblueshards
blackgreen
brownowl
boasnake
bocceball
bluejay
cannons
chimpanzee
chipmunks
confederateflag
england
fallcolors
firefighters
frenchies2
guinea
gummies
greyhound
ireland
lanterns
meteorshower
morningdew
pasta
redblackshards2
seafood
TIDs BEFORE THIS LINE
EOT;

$testSearch3List = <<<EOT
// REDSPARK BING
TIDs AFTER THIS LINE
TIDs BEFORE THIS LINE
EOT;

$testSearch4List = <<<EOT
// BENSEN BING
TIDs AFTER THIS LINE
altuve
anuelaa
anuelaa2
asusrog
azurlane
babyyoda
badbunny2
bakugan
battlelands
battleprime
beckyg
beybladeburst
billieellish
bitlife
bloons
bobross
bobross2
brawlhalla
brawlhalla2
brawlstars
brawlstars2
breitling
bregman
btsworld
burberry
callaway
candycrushsoda
cartier
cathkidston
citygirls
cobragolf
coinmaster
combopanda
creativedestruction
cutebabies
cyberhunter
dababy
disneyworld
nikejordan
doncic
dragonballsuper
dragoncity
elieen
energy2
eveechoes
fifa20
fivio
fordf150
freefall
futurefight
garena
garena2
goat
granny
granny2
grannychap2
grannychap22
gtavice
harvester
hayday
homepage.php
hotelempire
hungryshark
jacksepticeye
jaydayoungan
johndeere
legobuilder
lilbaby
lilbaby2
lilmama
liltecca
liltjay
lindor
lonzoball
madden20
madden19
mariokart
mia2
milesm
mille
mookie
meganthee
monstax
monsterenergy
mortalkombat11
monsterlegends
nbayoungboy
nhl20
nhl202
nikeair
nipseyhussle
nlechoppa
nwa
partynextdoor
rodwave
search.php
sherzer
snackworld
squirrel
stormzy
subaruwrx
talkingtom
tennisclash
titleist
traeyoung
ultimaterivals
unleashlight
warface
warrobots
wartortise2
ynwmelly
TIDs BEFORE THIS LINE
EOT;

$testSearch5List = <<<EOT
// APTITUDE BING
TIDs AFTER THIS LINE
blackredshards
gacha
TIDs BEFORE THIS LINE
EOT;


$codeList = [
/* testSearch2 */
"2020calendar" => 611,
"birdwatching" => 611,  
"blackblueshards"  => 611,
"blackgreen"  => 611,
"boasnake" => 611,  
"brownowl" => 611,
"bluejay" => 611, 
"bocceball" => 611,
"cannons" => 611,  
"chimpanzee" => 611,
"chipmunks" => 611,
"confederateflag"  => 611,
"england" => 611,   
"fallcolors" => 611,
"firefighters" => 611,  
"frenchies2"  => 611,
"greyhound" => 611,
"guinea" => 611, 
"gummies" => 611,
"ireland" => 611, 
"lanterns" => 611,
"meteorshower" => 611,
"morningdew" => 611,  
"pasta" => 611,
"redblackshards2"  => 611,
"seafood"  => 611,
/* testSearch4 */
  "altuve" => 219, 
  "anuelaa" => 205,
  "anuelaa2" => 205,
  "arenado" => 214,
  "asusrog" => 219,
  "azurlane" => 212,
  "babyyoda" => 217,
  "badbunny2" => 219,
  "bakugan" => 219,
  "battleprime" => 212,
  "battlelands"  => 219,
  "beckyg" => 219,
  "billieellish" => 219,
  "beybladeburst" => 212,
  "bitlife" => 212,
  "blackblueshards" => 218,
  "blackgreen" => 218,
  "bloons" => 212,
  "bobross" => 219,
  "bobross2" => 219,
  "brawlhalla" => 212,
  "brawlhalla2" => 212,
  "bregman" => 214,
  "btsworld" => 219,
  "burberry" => 218,
  "nikejordan" => 216, 
  "brawlstars" => 212,
  "brawlstars2" => 212,
  "callaway" => 219,
  "candycrushsoda" => 212,
  "cartier" => 218,
  "cathkidston" => 219,
  "citygirls" => 219,
  "coinmaster" => 212,
  "confederateflag" => 218,
  "creativedestruction" => 212,
  "cutebabies" => 219,
  "cyberhunter" => 212,
  "dababy" => 211,
  "doncic" => 214,
  "disneyworld" => 219,
  "dragonballsuper" => 219,
  "dragoncity" => 212,
  "elieen" => 218,
  "energy2" => 206,
  "eveechoes" => 212,
  "fifa20" => 203,
  "fivio" => 219,
  "fordf150" => 219,
  "freefall" => 219,
  "frenchies2" => 219,
  "futurefight" => 219,
  "garena" => 202,
  "garena2" => 202,
  "goat" => 212,
  "granny" => 204,
  "granny2" => 204,
  "grannychap2" => 204,
  "grannychap22" => 204,
  "gtavice" => 212,
  "harvester" => 218,
  "hayday" => 219,
  "hungryshark" => 219,
  "jacksepticeye" => 219,
  "jaydayoungan" => 205,
  "johndeere" => 218,
  "legobuilder" => 219,
  "lilbaby" => 211,
  "lilbaby2" => 211,
  "lilmama" => 219,
  "liltecca" => 219,
  "liltjay" => 205,
  "lindor" => 214,
  "lonzoball" => 214,
  "madden20" => 207,
  "mariokart" => 219,
  "meganthee" => 205,
  "mia2" => 219,
  "milesm" => 219,
  "mille" => 219,
  "monstax" => 205,
  "monsterenergy" => 206,
  "monsterlegends" => 219,
  "mortalkombat11" => 219,
  "nbayoungboy" => 205,
  "nipseyhussle" => 219,
  "nhl202" => 219,
  "nhl20" => 219,
  "nikeair" => 219,
  "nlechoppa" => 201,
  "nwa" => 219,
  "partynextdoor" => 205,
  "patek" => 219,
  "redblackshards2" => 218,
  "rodwave" => 205,
  "sherzer" => 219,
  "snackworld" => 219,
  "squirrel" => 219,
  "stormzy" => 219,
  "subaruwrx" => 210,
  "talkingtom" => 212,
  "tennisclash" => 212,
  "titleist" => 219,
  "traeyoung" => 205,
  "ultimaterivals" => 212,
  "unleashlight" => 212,
  "warrobots" => 212,
  "warface" => 219,
  "wartortise2" => 212,
  "yelich" => 219,
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
} else if (strstr($testSearch5List, PHP_EOL.$tid.PHP_EOL)) {
  $testSearch5 = true;
}
?>
