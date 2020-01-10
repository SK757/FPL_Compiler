<?php
	if ($item['element_type'] == 1) {
        echo "GK";
    } elseif ($item['element_type'] == 2) {
        echo "DEF";
    } elseif ($item['element_type'] == 3) {
        echo "MID";
    } elseif ($item['element_type'] == 4) {
        echo "FWD";
    }
?>