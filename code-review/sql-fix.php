<?php
/*
=========================================
    SQL Injection Vulnerability & Fix
=========================================

❌ Vulnerable Code (DVWA style)
-----------------------------------------
The application directly inserts user input 
into the SQL query string, allowing attackers
to modify the query structure.

$query = "SELECT * FROM users WHERE username='$user' AND password='$pass'";


✅ Secure Code (Prepared Statements)
-----------------------------------------
Prepared statements separate SQL logic from 
user input, preventing attackers from injecting 
malicious payloads.

*/

$stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();

/*
Why this works:
-----------------------------------------
- `?` placeholders ensure input is treated as data.
- DB engine cannot interpret input as SQL logic.
- Prevents classic payloads like:
    ' OR '1'='1' --
*/
?>
