<?php
function validate(string $value, string $type): bool
{
    if ($type === 'username') {
        if (empty(trim($value)))
            return FALSE;
        if (strlen($value) < 6)
            return FALSE;
        return TRUE;
    }
    if ($type === 'email') {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    if ($type === 'password') {
        if (empty(trim($value)))
            return FALSE;
        if (strlen($value) < 8)
            return FALSE;
        return TRUE;
    }
    throw new Error("couldn't validate no matching type");
}