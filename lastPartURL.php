<?php
function lastPartOfUrl($param): string {
    $parts = explode(separator: "/", string: $param);
    return end(array: $parts);
}
echo lastPartOfUrl("http://www.wm-school.ru/7478639");
?>