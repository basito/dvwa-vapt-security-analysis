<?php
/*
=========================================
     Stored Cross-Site Scripting Fix
=========================================

❌ Vulnerable Code
-----------------------------------------
User-supplied input is printed back to the 
page without sanitization, allowing JavaScript 
execution in the browser.

echo $_POST['comment'];


✅ Secure Code (Output Encoding)
-----------------------------------------
htmlspecialchars() escapes special characters 
so the browser cannot interpret them as script.

*/

echo htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');

/*
Why this works:
-----------------------------------------
- Converts < > " ' into harmless encoded versions.
- Prevents attacker payloads like:
    <script>alert('XSS')</script>
from executing.
*/
?>
