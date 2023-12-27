<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Platform</title>
</head>
<body>
<div>
    <h1>Greetings, <?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : 'Valued Visitor'; ?></h1>
</div>
</body>
</html>
