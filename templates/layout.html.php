<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? '' ?></title>
    <meta name="description" content="<?= $description ?? '' ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>
    <main class="main">
        <?php require '../templates/' . $page . '.html.php'; ?>
    </main>
    <footer class="footer">
        <div class="row">
            <div class="col-lg-6">
                <p>PyDO</p>
            </div>
            <div class="col-lg-6">
                <p>Tous Droits Réservés</p>
                <p>Alexis Bessac 2024</p>
            </div>
        </div>
    </footer>
</body>

</html>