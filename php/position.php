<?php
    foreach($data['element_types'] as $key=>$positions) {
        if ($item2['element_type'] === $positions['id']) {
            echo $positions['singular_name_short'];
        }
    }
?>