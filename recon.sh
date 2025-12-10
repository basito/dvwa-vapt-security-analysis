#!/bin/bash

TARGET="http://localhost/dvwa"

echo "=============================="
echo " DVWA Recon Script (Bash)"
echo "=============================="
echo

# 1️⃣ NMAP SCAN
echo "[+] Running Nmap service scan on localhost..."
nmap -sV -oN nmap-output.txt localhost
echo "[+] Nmap scan saved as nmap-output.txt"
echo

# 2️⃣ DIRECTORY ENUMERATION
echo "[+] Checking common directories on DVWA..."

dirs=("admin" "login" "config" "setup" "security" "vulnerabilities" "includes")

for d in "${dirs[@]}"; do
    STATUS=$(curl -o /dev/null -s -w "%{http_code}" $TARGET/$d)
    echo "   /$d  --> HTTP $STATUS"
done

echo

# 3️⃣ TECHNOLOGY FINGERPRINTING
echo "[+] Fingerprinting DVWA stack..."
curl -I $TARGET 2>/dev/null | grep -E "Server|X-Powered-By"
echo

echo "[+] Recon completed successfully."


##Remember to give your file privilages to run
