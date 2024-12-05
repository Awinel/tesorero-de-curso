<?php
// Include the User model
require_once '../models/user.php';

// Function to sanitize RUT input (removes periods and hyphens)
function sanitizeRUT($rut)
{
    // Remove periods and hyphen to get a clean numeric RUT
    return str_replace(['.', '-'], '', trim($rut));
}

// Function to validate RUT format
function validateRUT($rut)
{
    // Check if the RUT has the correct format (7-8 digits followed by an optional verification digit)
    return preg_match("/^\d{7,8}[0-9Kk]$/", $rut);  // Matches 7-8 digits and the verification digit
}

// Function to validate password (minimum 6 characters)
function validatePassword($password)
{
    return strlen($password) >= 4;  // Ensure password is at least 6 characters long
}

// Function to validate full_name
function validateFull_name($full_name)
{

    // Check for valid characters (letters, spaces, hyphens, accents, and apostrophes)
    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ' -]+$/u", $full_name)) {
        return false;
    }
}
