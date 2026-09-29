<?php
// Security Helpers
// TODO: Buat fungsi sanitasi XSS (htmlspecialchars) dan proteksi CSRF Token

function e(?string $str): string {
    return htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8');
}
