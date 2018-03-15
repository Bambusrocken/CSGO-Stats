<?php


// $id = $_GET["steamid"];
// $map = $_GET["mapname"];
$link = file_get_contents('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=6EF68A8E7F33D247E8E667AD784CBFF2&steamids=76561197987192580');
$myPROFILEarray = json_decode($link, true);

$recentgamelink = file_get_contents('http://api.steampowered.com/IPlayerService/GetRecentlyPlayedGames/v0001/?key=6EF68A8E7F33D247E8E667AD784CBFF2&steamid=76561197987192580&format=json');
$myRECENTGAMEarray = json_decode($recentgamelink, true);


//echo json_encode($myRECENTGAMEarray);

require_once 'php/csgo.php';








// find CSGO RECENT time (minutes)
foreach ($myRECENTGAMEarray["response"]["games"] as $gamerecent) {
  if ($gamerecent["appid"] == 730) {
  	$CSGOrecentplaytime = $gamerecent["playtime_2weeks"];
  }
}
// convert minuts into hours
$CSGOrecentplaytime = floor($CSGOrecentplaytime / 60).':'.($CSGOrecentplaytime - floor($CSGOrecentplaytime / 60) * 60);
// find CSGO TOTAL time (minutes)
foreach ($myCSGOarray["playerstats"]["stats"] as $gametotal) {
  if ($gametotal["name"] == "total_time_played") {
  	$CSGOtotalplaytime = $gametotal["value"];
  }
}
// convert minuts into hours
$CSGOtotalplaytime = floor($CSGOtotalplaytime / 60).':'.($CSGOtotalplaytime - floor($CSGOtotalplaytime / 60) * 60);

// ****************** LAST MATCH ******************

// last match kills
foreach ($myCSGOarray["playerstats"]["stats"] as $lastkills) {
  if ($lastkills["name"] == "last_match_kills") {
  	$CSGOelastkills = $lastkills["value"];
  }
}
// last match deaths
foreach ($myCSGOarray["playerstats"]["stats"] as $lastdeath) {
  if ($lastdeath["name"] == "last_match_deaths") {
  	$CSGOlastdeath = $lastdeath["value"];
  }
}
// last match mvp
foreach ($myCSGOarray["playerstats"]["stats"] as $lastmvp) {
  if ($lastmvp["name"] == "last_match_mvps") {
  	$CSGOlastmvp = $lastmvp["value"];
  }
}


// ****************** KILS DEATH ******************

// total kills
foreach ($myCSGOarray["playerstats"]["stats"] as $kills) {
  if ($kills["name"] == "total_kills") {
  	$CSGOkills = $kills["value"];
  }
}
// total deaths
foreach ($myCSGOarray["playerstats"]["stats"] as $deaths) {
  if ($deaths["name"] == "total_deaths") {
  	$CSGOdeaths = $deaths["value"];
  }
}
// total kill death ratio
$CSGOkd =  $CSGOkills / $CSGOdeaths;


// ****************** WINS LOSS ******************

// total matches played
foreach ($myCSGOarray["playerstats"]["stats"] as $played) {
  if ($played["name"] == "total_matches_played") {
  	$CSGOplay = $played["value"];
  }
}
// total matches won
foreach ($myCSGOarray["playerstats"]["stats"] as $wins) {
  if ($wins["name"] == "total_matches_won") {
  	$CSGOwins = $wins["value"];
  }
}
// win loss %
$CSGOwl =  (($CSGOwins / $CSGOplay) * 100);


// ****************** GLOBAL STATS ******************

// total rounds played
foreach ($myCSGOarray["playerstats"]["stats"] as $rounds) {
  if ($rounds["name"] == "total_rounds_played") {
  	$CSGOrounds = $rounds["value"];
  }
}
// total mvps
foreach ($myCSGOarray["playerstats"]["stats"] as $mvp) {
  if ($mvp["name"] == "total_mvps") {
  	$CSGOmvp = $mvp["value"];
  }
}
// MVP %
$CSGOmvpR =  (($CSGOmvp / $CSGOrounds) * 100);

// total shots fired
foreach ($myCSGOarray["playerstats"]["stats"] as $shotsfired) {
  if ($shotsfired["name"] == "total_shots_fired") {
  	$CSGOshotsfired = $shotsfired["value"];
  }
}
// total shots hit
foreach ($myCSGOarray["playerstats"]["stats"] as $shotshit) {
  if ($shotshit["name"] == "total_shots_hit") {
  	$CSGOshotshit = $shotshit["value"];
  }
}
// Rounds MVP ratio
$CSGOhitP =  (($CSGOshotshit / $CSGOshotsfired) * 100);
// bombs Planted
foreach ($myCSGOarray["playerstats"]["stats"] as $bombsplant) {
  if ($bombsplant["name"] == "total_planted_bombs") {
  	$CSGObombsplant = $bombsplant["value"];
  }
}
// bombs defused
foreach ($myCSGOarray["playerstats"]["stats"] as $bombsdefused) {
  if ($bombsdefused["name"] == "total_defused_bombs") {
  	$CSGObombsdefused = $bombsdefused["value"];
  }
}
// hostage rescue
foreach ($myCSGOarray["playerstats"]["stats"] as $hostagerescued) {
  if ($hostagerescued["name"] == "total_rescued_hostages") {
  	$CSGOhostagerescued = $hostagerescued["value"];
  }
}
// money earned
foreach ($myCSGOarray["playerstats"]["stats"] as $moneyearned) {
  if ($moneyearned["name"] == "total_money_earned") {
  	$CSGOmoneyearned = $moneyearned["value"];
  }
}
// total damage done
foreach ($myCSGOarray["playerstats"]["stats"] as $damagedone) {
  if ($damagedone["name"] == "total_damage_done") {
  	$CSGOdamagedone = $damagedone["value"];
  }
}
// knife kills
foreach ($myCSGOarray["playerstats"]["stats"] as $knifekills) {
  if ($knifekills["name"] == "total_kills_knife") {
  	$CSGOknifekills = $knifekills["value"];
  }
}
// grenade kills
foreach ($myCSGOarray["playerstats"]["stats"] as $grenadekills) {
  if ($grenadekills["name"] == "total_kills_hegrenade") {
  	$CSGOgrenadekills = $grenadekills["value"];
  }
}
// knife kills
foreach ($myCSGOarray["playerstats"]["stats"] as $ripwindows) {
  if ($ripwindows["name"] == "total_broken_windows") {
  	$CSGOripwindows = $ripwindows["value"];
  }
}
// pistol round wins
foreach ($myCSGOarray["playerstats"]["stats"] as $pistolroundwin) {
  if ($pistolroundwin["name"] == "total_wins_pistolround") {
  	$CSGOpistolroundwin = $pistolroundwin["value"];
  }
}
// kills enemy blinded
foreach ($myCSGOarray["playerstats"]["stats"] as $enemyblindedkill) {
  if ($enemyblindedkill["name"] == "total_kills_enemy_blinded") {
  	$CSGOenemyblindedkill = $enemyblindedkill["value"];
  }
}
// weapons donated
foreach ($myCSGOarray["playerstats"]["stats"] as $weaponsdonated) {
  if ($weaponsdonated["name"] == "total_weapons_donated") {
  	$CSGOweaponsdonated = $weaponsdonated["value"];
  }
}
// kills against zoomed sniper
foreach ($myCSGOarray["playerstats"]["stats"] as $killsagainstzoomed) {
  if ($killsagainstzoomed["name"] == "total_kills_against_zoomed_sniper") {
  	$CSGOkillsagainstzoomed = $killsagainstzoomed["value"];
  }
}

// last_match_t_wins
// last_match_cd_wins
// last_match_money_spent

?>
