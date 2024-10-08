<?php
function intersectArr($userNumber, $userFloat)
{
    $innerMap = array();
    $resultMap = array();
    $result = array();
    foreach ($userNumber as $key => $value) {
        if(!array_key_exists(key: $value, array: $innerMap)) {
            $innerMap[$value] = 1;
        }
    }
    foreach ($userFloat as $key => $value) {
        if(array_key_exists(key: $value, array: $innerMap)) {
            if(!array_key_exists(key: $value, array: $resultMap)) {
                $resultMap[$value] = 1;
                $result[] = $value;
            }
        }
    }
    return $result;
}
?>
Intersect arrays: <?php print_r(value: intersectArr(userNumber: array('1', '6', '2', '3', '4', '5'), userFloat: array('3', '10', '4', '5', '6', '7')));?>
