# 🔐 DVWA Web Application Security Assessment
Vulnerability Assessment and Penetration Testing using Damn vulnerable web application + Automated recon using Bash script + Bug Fixes for Sqli, XSS etc

This project demonstrates a full Web Application Vulnerability Assessment and secure coding review using Damn Vulnerable Web Application (DVWA).  
The objective is to practice exploiting real-world vulnerabilities, understand their root causes, and apply secure coding principles to fix them.

This assessment includes:
- SQL Injection
- Stored XSS
- IDOR (Broken Access Control)
- Automated Recon (Bash)
- CVSS-based vulnerability triage
- Secure code review & patches
- Threat modeling (STRIDE)

---

## 📌 Setup Overview

| Component | Details |
| Application | DVWA (Damn Vulnerable Web App) |
| Attacker | Kali Linux |
| Web Stack | Apache2, MySQL, PHP |
| Skill Focus | OWASP Top 10, AppSec, Secure Code Review, Recon Automation |

DVWA was hosted at:
http://localhost/dvwa


Security level was set to **LOW** to allow exploitation.

---

# 🚨 Vulnerability Findings (Screenshots in `/screenshots`)  

## 1️⃣ SQL Injection (Authentication Bypass)

The application does not properly sanitize user input in SQL queries.  
Payload used:  ' OR '1'='1' --

This bypasses authentication and dumps user information.  
**Severity:** Critical (CVSS 9.8)  
**Impact:** Full login bypass, database access.

---


## 2️⃣ Stored XSS (Persistent JavaScript Execution)

Input submitted to the comment field is rendered back to the user without escaping.  
Payload:

```html
<script>alert('XSS');</script>
```
This executes JavaScript inside the browser.
Severity: High (CVSS 8.2)


##3️⃣ IDOR (Broken Access Control)

DVWA reveals user information based solely on an id parameter:
?id=1 → Shows User 1
?id=2 → Shows User 2

Changing the ID allows access to other users’ data.
Severity: High (CVSS 8.0)


🛠 Automated Recon Script (Bash)

A Bash-based recon tool was created to automate:
Service enumeration (Nmap)
Directory discovery
HTTP response code analysis
Technology fingerprinting
Script: recon.sh


📚 Secure Code Review (Root Cause Analysis + Fixes)
Detailed code fixes located in /code-review.

✔ SQL Injection Fixed via Prepared Statements
✔ XSS Fixed using output encoding
✔ IDOR Fixed with server-side authorization



🔐 Threat Modeling (STRIDE)

Spoofing → SQLi lets attacker impersonate user
Tampering → Injection modifies DB queries
Repudiation → Logs manipulated
Information Disclosure → IDOR leaks private data
Denial of Service → malformed input breaks functionality
Elevation of Privilege → SQLi → Admin access


🛡 Mitigation Summary

Enforce HTTPS + HSTS
Use prepared statements (SQLi prevention)
Use htmlspecialchars() for output encoding (XSS prevention)
Implement server-side access control (IDOR fix)
Disable debug modes, enforce least privilege
Apply input validation + output encoding consistently


⚠ Legal/Ethical Note
This project was executed only on my own local environment for educational, ethical, and defensive cybersecurity learning.


💬 Contact
Feel free to reach out if you'd like to collaborate on AppSec, VAPT, or automation projects.
