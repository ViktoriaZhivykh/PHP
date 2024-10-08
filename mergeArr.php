<?php
function mergeArr($userNumber, $userFloat)
{
    $innerMap = array();
    $result = array();
    foreach ($userNumber as $key => $value) {
        if(!array_key_exists(key: $value, array: $innerMap)) {
            $innerMap[$value] = 1;
            $result[] = $value;
        }
    }
    foreach ($userFloat as $key => $value) {
        if(!array_key_exists(key: $value, array: $innerMap)) {
            $innerMap[$value] = 1;
            $result[] = $value;
        }
    }
    return $result;
}
?>
Merge arrays: <?php print_r(value: mergeArr(userNumber: array('1', '6', '2', '3', '4', '5'), userFloat: array('3', '10', '4', '5', '6', '7')));?> <br>
