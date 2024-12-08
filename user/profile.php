<!DOCTYPE html>
<html>
<head>
    <title>Profile Setup</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="profile-container">
        <h2>Profile Setup</h2>
        <form action="dashboard.php" method="post">
            <input type="text" name="organization_name" placeholder="Organization Name" required><br>
            <input type="text" name="contact_details" placeholder="Contact Details" required><br>
            <textarea name="mission" placeholder="Mission" required></textarea><br>
            <textarea name="vision" placeholder="Vision" required></textarea><br>
            <button type="submit">Save</button>
        </form>
    </div>
</body>
</html>
