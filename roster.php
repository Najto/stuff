<div class="box_two">
<div class="box_two_title">Raid Roster</div>

<?php

 $GLOBALS['wowarmory']['db']['driver'] = 'mysql'; // Dont change. Only mysql supported so far.
 $_db_host = $GLOBALS['wowarmory']['db']['hostname'] = 'localhost'; // Hostname of server. 
 $_db_datenbank = $GLOBALS['wowarmory']['db']['dbname'] = 'homepage'; //Name of your database
 $_db_username = $GLOBALS['wowarmory']['db']['username'] = 'username'; //Insert your database username
 $_db_passwort = $GLOBALS['wowarmory']['db']['password'] = 'password'; //Insert your database password
 include('BattlenetArmory.class.php'); //include the main class 

# Datenbankverbindung herstellen
 $db = @ mysql_connect($_db_host, $_db_username, $_db_passwort, $_db_datenbank);

 # Hat die Verbindung geklappt ?
 if (!$db)
 {
 die('Konnte keine Verbindung zur Datenbank herstellen');
 }

 
 $gilde = 'Double Tap';
 $continent = 'EU';
 $realm = 'Eredar';
 $locale = 'de_DE';
 
 $armory = new BattlenetArmory($continent,$realm); 
 $armory->UTF8(TRUE);
 $armory->setLocale($locale);
 $armory->useCache(TRUE);
 $guild = $armory->getGuild($gilde);
 $members = $guild->getMembers('rank','asc');
 
 $rasse = array(
 1 => "Mensch",
 2 => "Orc",
 3 => "Zwerg",
 4 => "Nachtelf",
 5 => "Untoter",
 6 => "Taure",
 7 => "Gnom",
 8 => "Troll",
 9 => "Goblin",
 10 => "Blutelf",
 11 => "Draenei",
 22 => "Worg",
 24 => "Pandaren"
 );
 $klasse = array(
 1 => "Krieger",
 2 => "Paladin",
 3 => "Jäger",
 4 => "Schurke",
 5 => "Priester",
 6 => "Todesritter",
 7 => "Schamane",
 8 => "Magier",
 9 => "Hexer",
 10 => "Mönch",
 11 => "Druide"
 );
 $activetalents = array(
 1 => "1",
 2 => "2",
 3 => "3",
 4 => "4",
 5 => "5",
 6 => "6",
 7 => "7",
 8 => "8",
 9 => "9",
 11 => "10"
 );
 $granks = array(
 0 => "Gildenmeister",
 1 => "Offizier",
 2 => "Rank 2",
 3 => "Raidmember",
 4 => "Raidmember Neuling",
 5 => "Rank 5",
 6 => "Rank 6"
 );
 

 $lastrank = "10000";
?>
<?php
 foreach ( $members as $member ) {

 //$character = new Character($continent, $realm, $member['character']['name']);
 //$armory->getCharacter($continent, $realm, $member['character']['name']);
 /*
 $character = $armory->getCharacter($member['character']['name']);
 $activetalents = @$character->getActiveTalents();
 $inactivetalents = @$character->getInactiveTalents();
 */
 //var_dump($character);
 if ( $member['rank'] != 5 ){
 if ( $member['rank'] != 6 ){
 if ( $member['rank'] != 7 ){
 if ( $member['rank'] != 8 ){
 if ( $member['rank'] != 9 ){
 if ( $lastrank != $member['rank'] ) {
 // WENN NICHT DER SELBE RANG - DANN RANG AUSGEBEN UND DESCRIPTION FIELDS
?>
<!-- Tank -->
<div class="Bezeichnung"><?php echo $granks[$member['rank']]; ?></div>
<?php
 $lastrank = $member['rank'];
 }
 // IN JEDEM FALL -> MITGLIED AUSGEBEN

?>
<p class="Roster">
<img src="images/icons/<?php echo $klasse[$member['character']['class']];?>.png" style="float:right;margin-top:15px;">
	<img src="<?php echo $member['character']['thumbnailURL']; ?>" />
		<a href="<?php echo "http://eu.battle.net/wow/de/character/Eredar/".$member['character']['name']."/advanced"; ?>" class="rlink"><?php echo $member['character']['name'];?></a>
		<span class="<?php echo $klasse[$member['character']['class']];?> class"><?php echo $klasse[$member['character']['class']];?></span>
		[1] Protection <br>
		[2] Arms
</p>
	<hr>
<?php
 }
 }
 }
 }
 }
 }
?>
</div>
