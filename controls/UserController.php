<?php
// Include the User model
require_once '../models/user.php';

// Function to sanitize RUT input (removes periods and hyphens)
function sanitizeRUT($rut)
{
    // Remove hyphen to get a clean numeric RUT
    return str_replace(['-'], '', trim($rut));
}
