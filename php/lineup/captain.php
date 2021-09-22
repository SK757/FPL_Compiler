<?PHP
echo '<div class="column"><div class="image" style="background-image: url(https://resources.premierleague.com/premierleague/photos/players/110x140/p' . $item2['code'] . '.png);"></div><div class="player"><b><p>' . $item2['web_name'];
if($item['multiplier'] === 2) {
	echo ' (c)';
} elseif($item['multiplier'] === 3) {
	echo ' (tc)';
} elseif($item['is_vice_captain'] === true) {
	echo ' (vc)';
}
echo '</p></b></div><div class="points"><b><p>';
if($item['multiplier'] === 2) {
	echo $item1['stats']['total_points'] * 2;
} elseif($item['multiplier'] === 3) {
	echo $item1['stats']['total_points'] * 3;
} else {
	echo $item1['stats']['total_points'];
}
?>