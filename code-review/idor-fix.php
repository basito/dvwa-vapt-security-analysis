<?php
/*
=========================================
   Insecure Direct Object Reference Fix
=========================================

❌ Vulnerable Code
-----------------------------------------
Application trusts user-controlled `id` parameter 
without verifying whether the logged-in user has 
permission to access that resource.

$user_id = $_GET['id'];


✅ Secure Code (Authorization Check)
-----------------------------------------
Verify the requested ID matches the authenticated 
user's session identifier before showing data.

*/

session_start();

$user_id = $_GET['id'];

if ($user_id != $_SESSION['user_id']) {
    die("Unauthorized Access");
}

/*
Why this works:
-----------------------------------------
- Never trusts user-provided identifiers.
- Enforces server-side access control.
- Prevents attackers from accessing:
    ?id=2
    ?id=3
or any ID belonging to other users.
*/
?>
