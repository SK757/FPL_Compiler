<?PHP
echo '<div class="column"><div class="image" style="background-image: url(https://resources.premierleague.com/premierleague/photos/players/110x140/p' . $item2['code'] . '.png);">';
if($item['multiplier'] === 2) {
	echo '<span class="capt">C</span>';
} elseif($item['multiplier'] === 3) {
	echo '<span class="tripcapt">TC</span>';
} elseif($item['is_vice_captain'] === true) {
	echo '<span class="capt">V</span>';
}
echo '</div><div class="player"><b><p>' . $item2['web_name']. '</p></b></div><div class="points"><b><p class="p">';
echo $item1['stats']['total_points'] * $item['multiplier'];
?>