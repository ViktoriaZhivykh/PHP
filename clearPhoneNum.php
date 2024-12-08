<?php
function clearPhoneNumber($param): array|string|null {
    $pattern = "/[^0-9]/";
    return preg_replace(pattern: $pattern, replacement: "", subject: $param);
}
echo clearPhoneNumber("+7 (900) 000-00-00");
?>