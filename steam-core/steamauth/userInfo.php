<?php
if (!empty($_SESSION["steamid"]) && empty($_SESSION['steam_uptodate']) && empty($_SESSION['steam_personaname'])) {

	require 'SteamConfig.php';

	$userRaw = file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=".$steamauth['apikey']."&steamids=".$_SESSION['steamid']);

	$statsRaw = file_get_contents("http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=730&key=".$steamauth['apikey']."&steamid=".$_SESSION['steamid']);

	$recentRaw = file_get_contents("http://api.steampowered.com/IPlayerService/GetRecentlyPlayedGames/v0001/?key=".$steamauth['apikey']."&steamid=".$_SESSION['steamid']);


	$statsData = json_decode($statsRaw, true);
	$recentData = json_decode($recentRaw, true);
	$userData = json_decode($userRaw, true);


	// Steam info
	$_SESSION['steam_steamid'] = $userData['response']['players'][0]['steamid'];
	$_SESSION['steam_communityvisibilitystate'] = $userData['response']['players'][0]['communityvisibilitystate'];
	$_SESSION['steam_profilestate'] = $userData['response']['players'][0]['profilestate'];
	$_SESSION['steam_personaname'] = $userData['response']['players'][0]['personaname'];
	$_SESSION['steam_lastlogoff'] = $userData['response']['players'][0]['lastlogoff'];
	$_SESSION['steam_profileurl'] = $userData['response']['players'][0]['profileurl'];
	$_SESSION['steam_avatar'] = $userData['response']['players'][0]['avatar'];
	$_SESSION['steam_avatarmedium'] = $userData['response']['players'][0]['avatarmedium'];
	$_SESSION['steam_avatarfull'] = $userData['response']['players'][0]['avatarfull'];
	$_SESSION['steam_personastate'] = $userData['response']['players'][0]['personastate'];
	if (isset($userData['response']['players'][0]['realname'])) { 
		   $_SESSION['steam_realname'] = $userData['response']['players'][0]['realname'];
	   } else {
		   $_SESSION['steam_realname'] = "Real name not given";
	}
	$_SESSION['steam_primaryclanid'] = $userData['response']['players'][0]['primaryclanid'];
	$_SESSION['steam_timecreated'] = $userData['response']['players'][0]['timecreated'];
	$_SESSION['steam_uptodate'] = time();
	$_SESSION['csgo_stats'] = [];

	// CSGO stats
	foreach ($statsData["playerstats"]["stats"] as $stat) {
		$_SESSION['csgo_stats'][$stat["name"]] = $stat["value"];
	}

	// Recent game info
	foreach ($recentData["response"]["games"] as $gamerecent) {
  	if ($gamerecent["appid"] == 730) {
  		$_SESSION["playtime_forever"] = $gamerecent["playtime_forever"];
  		$_SESSION["playtime_2weeks"] = $gamerecent["playtime_2weeks"];
  	} else {
  		#need to put an else condition
  	}
	}

}


// Steam user info
$steamprofile['steamid'] = $_SESSION['steam_steamid'];
$steamprofile['communityvisibilitystate'] = $_SESSION['steam_communityvisibilitystate'];
$steamprofile['profilestate'] = $_SESSION['steam_profilestate'];
$steamprofile['personaname'] = $_SESSION['steam_personaname'];
$steamprofile['lastlogoff'] = $_SESSION['steam_lastlogoff'];
$steamprofile['profileurl'] = $_SESSION['steam_profileurl'];
$steamprofile['avatar'] = $_SESSION['steam_avatar'];
$steamprofile['avatarmedium'] = $_SESSION['steam_avatarmedium'];
$steamprofile['avatarfull'] = $_SESSION['steam_avatarfull'];
$steamprofile['personastate'] = $_SESSION['steam_personastate'];
$steamprofile['realname'] = $_SESSION['steam_realname'];
$steamprofile['primaryclanid'] = $_SESSION['steam_primaryclanid'];
$steamprofile['timecreated'] = $_SESSION['steam_timecreated'];
$steamprofile['uptodate'] = $_SESSION['steam_uptodate'];


// CSGO user stats

$CSGOrecentplaytime = $_SESSION["playtime_2weeks"];
$CSGOrecentplaytime = floor($CSGOrecentplaytime / 60).':'.($CSGOrecentplaytime - floor($CSGOrecentplaytime / 60) * 60);

$CSGOtotalplaytime = $_SESSION["playtime_forever"];
$CSGOtotalplaytime = floor($CSGOtotalplaytime / 60).':'.($CSGOtotalplaytime - floor($CSGOtotalplaytime / 60) * 60);

$CSGOelastkills = $_SESSION['csgo_stats']['last_match_kills'];
$CSGOlastdeath = $_SESSION['csgo_stats']['last_match_deaths'];
$CSGOlastmvp = $_SESSION['csgo_stats']['last_match_mvps'];
$CSGOkills = $_SESSION['csgo_stats']['total_kills'];
$CSGOdeaths = $_SESSION['csgo_stats']['total_deaths'];
$CSGOkd =  $CSGOkills / $CSGOdeaths;
$CSGOplay = $_SESSION['csgo_stats']['total_matches_played'];
$CSGOwins = $_SESSION['csgo_stats']['total_matches_won'];
$CSGOwl =  (($CSGOwins / $CSGOplay) * 100);
$CSGOrounds = $_SESSION['csgo_stats']['total_rounds_played'];
$CSGOmvp = $_SESSION['csgo_stats']['total_mvps'];
$CSGOmvpR =  (($CSGOmvp / $CSGOrounds) * 100);
$CSGOshotsfired = $_SESSION['csgo_stats']['total_shots_fired'];
$CSGOshotshit = $_SESSION['csgo_stats']['total_shots_hit'];
$CSGOhitP =  (($CSGOshotshit / $CSGOshotsfired) * 100);
$CSGObombsplant = $_SESSION['csgo_stats']['total_planted_bombs'];
$CSGObombsdefused = $_SESSION['csgo_stats']['total_defused_bombs'];
$CSGOhostagerescued = $_SESSION['csgo_stats']['total_rescued_hostages'];
$CSGOmoneyearned = $_SESSION['csgo_stats']['total_money_earned'];
$CSGOdamagedone = $_SESSION['csgo_stats']['total_damage_done'];
$CSGOknifekills = $_SESSION['csgo_stats']['total_kills_knife'];
$CSGOgrenadekills = $_SESSION['csgo_stats']['total_kills_hegrenade'];
$CSGOripwindows = $_SESSION['csgo_stats']['total_broken_windows'];
$CSGOpistolroundwin = $_SESSION['csgo_stats']['total_wins_pistolround'];
$CSGOenemyblindedkill = $_SESSION['csgo_stats']['total_kills_enemy_blinded'];
$CSGOweaponsdonated = $_SESSION['csgo_stats']['total_weapons_donated'];
$CSGOkillsagainstzoomed = $_SESSION['csgo_stats']['total_kills_against_zoomed_sniper'];

?>
