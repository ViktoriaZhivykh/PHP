<?php
function fibonacci($input)
{
    if ($input == 0) return 0;
    if ($input == 1 || $input == 2) {
        return 1;
    } else {
        return fibonacci($input - 1) + fibonacci($input - 2);
    }
}
?>
Fibonacci <?php echo fibonacci(input: 5); ?>
