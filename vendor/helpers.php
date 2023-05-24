<?php

/**
 *
 * @param mixed ...$values
 * @return void
 */
function dump(mixed ...$values)
{
    foreach ($values as $value) {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }

}
