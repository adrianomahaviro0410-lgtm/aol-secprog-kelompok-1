<?php
session_start();

if (!isset($_SESSION['user']) || empty($_SESSION['user']['id'])) {
    header('Location: login.php');
    exit;
}
$user = $_SESSION['user'];
// TODO: Tampilkan data profil user, form edit profil, dan form upload foto
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile - ShopSecure</title>
</head>
<body>
    <h2>User Profile</h2>
        <p><strong>Nama:</strong> <?= htmlspecialchars($user['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>Role:</strong> <?= htmlspecialchars($user['role'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>Status:</strong> <?= htmlspecialchars($user['status'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
    <h3>Edit Profil</h3>
    <form action="actions/do_update_profile.php" method="POST">
        <div>
            <label>Nama:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($user['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div>
            <label>No HP:</label>
            <input type="text" name="phone" value="<?= htmlspecialchars($user['phone'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div>
            <label>Bio:</label>
            <textarea name="bio"><?= htmlspecialchars($user['bio'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <button type="submit">Simpan Profil</button>
    </form>

    <hr>

    <h3>Ganti Foto Profil</h3>
    <form action="actions/do_update_photo.php" method="POST" enctype="multipart/form-data">
        <div>
            <label>Pilih File Foto:</label>
            <input type="file" name="avatar" accept="image/*">
        </div>
        <button type="submit">Upload Foto</button>
    </form>
</body>
</html>
