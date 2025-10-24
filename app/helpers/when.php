<?php

function when($condition, $value, $default = null)
{
    return $condition ? $value : $default;
}
