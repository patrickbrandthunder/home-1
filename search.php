<?php
$bingSearchList = <<<EOT
TIDs AFTER THIS LINE
2020calendar
7mankind
aesop
arenado
armani
babyyoda2
bregman
breitling
bruni
burberry
callaway
cartier
cobragolf
columbia
combopanda
cyberhunter
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
ramirez
saintlaurent
schitts
seiya
sherzer
snackworld
squirrel
stormzy
tennisclash
tetris99
tokyomirage
tuukka
ultimaterivals
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
azurlane
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
ovechkin
overwatch22
paintsplatter
pastmak
pathofexile
pathofexile2
patrickkane
paulo
paydaycrimewar
pes20
pewdiepie
philiprivers
pinball
pinggolf
pixelgun
playboi2
pocketgod
pocketgod2
polog
popeyes
popsmoke
potionpunch
prestonplays
quando
queenn
rallyroad
rebelcops
rebelracing
returner77
rickross
rideoutheroes
rideoutheroes2
rockiefresh
roddy
rodwave2
rollingsky
runefactory4
russellwilson
scrosby
search.php
sephora
sevenfold
shadowfight3
sheff
sigmatheory
silksong
simcity
simpleplan
slipknot
smonkeyball
snackworld2
snot
sociablesoccer
soulknight
spongebob
spongebobmovie
sssniperwolf
starfetched
statechamps
stefondiggs
stevenstamkos
stevenuniverse
stretchers
subwaysurfers
supermegamini
supersmashult
switch
tabletopracing
canecorso
xmaslights
talesmemo
tarte
tavares
taylorhall
taylormade
terraria
totalwar
towaga2
toystorydrop
tuatagovailoa
tylersequin
urbandecay
verabradley
volta
warrobots2
watermelon
wethekings
winterfest
worldtanks
wwe2k20
wwemayhem
yaga
yoshicrafted
yungblud
TIDs BEFORE THIS LINE
EOT;

$testSearch4List = <<<EOT
TIDs AFTER THIS LINE
anuelaa
anuelaa2
babyyoda
battleprime
bitlife
brawlhalla
brawlhalla2
brawlstars
brawlstars2
candycrushsoda
coinmaster
creativedestruction
dababy
nikejordan
doncic
dragoncity
energy2
eveechoes
fifa20
garena
garena2
goat
granny
granny2
grannychap2
gtavice
homepage.php
jaydayoungan
lilbaby
lilbaby2
liltjay
madden20
meganthee
monstax
monsterenergy
nbayoungboy
nlechoppa
rodwave
search.php
subaruwrx
talkingtom
traeyoung
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
  "babyyoda" => 217,
  "battleprime" => 212,
  "bitlife" => 212,
  "brawlhalla" => 212,
  "brawlhalla2" => 212,
  "nikejordan" => 216, 
  "brawlstars" => 212,
  "brawlstars2" => 212,
  "candycrushsoda" => 212,
  "coinmaster" => 212,
  "creativedestruction" => 212,
  "dababy" => 211,
  "doncic" => 214,
  "dragoncity" => 212,
  "energy2" => 206,
  "eveechoes" => 212,
  "fifa20" => 203,
  "garena" => 202,
  "garena2" => 202,
  "goat" => 212,
  "granny" => 204,
  "granny2" => 204,
  "grannychap2" => 204,
  "gtavice" => 212,
  "jaydayoungan" => 205,
  "lilbaby" => 211,
  "lilbaby2" => 211,
  "liltjay" => 205,
  "madden20" => 207,
  "meganthee" => 205,
  "monstax" => 205,
  "monsterenergy" => 206,
  "nbayoungboy" => 205,
  "nlechoppa" => 201,
  "rodwave" => 205,
  "subaruwrx" => 210,
  "talkingtom" => 212,
  "traeyoung" => 205,
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
