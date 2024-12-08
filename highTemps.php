<?php
$highTemps = array(
    68, 70, 72, 58, 60, 79, 82, 73, 75, 77, 73, 58, 63, 79, 78,
    68, 72, 73, 80, 79, 68, 72, 75, 77, 73, 78, 82, 85, 89, 83
);
function topFive($param): array {
    arsort(array: $param);
    return array_slice(array: $param, offset: 0, length: 5);
}
function downFive($param): array {
    asort(array: $param);
    return array_slice(array: $param, offset: 0, length: 5);
}
function averageTmp($param): float {
    $count = 0;
    $sum = 0;
    foreach ($param as $key => $value) {
        $count++;
        $sum += $value;
    }
    return (1.0 * $sum) / $count;
}
echo print_r(value: downFive($highTemps));
echo '<br>';
echo print_r(value: topFive($highTemps));
echo '<br>';
echo averageTmp($highTemps);
?>