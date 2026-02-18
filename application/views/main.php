<!DOCTYPE html>
<html lang="id">

<style>
    body {
        background-color: #f8f9fa;
    }

    .product-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        border-radius: 15px;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .product-img-container {
        
        overflow: hidden;
        border-radius: 15px 15px 0 0;
        background-color: #eee;
    }

    .product-img-container img {
        object-fit: contain;
        height: 100%;
        
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC browser</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#">RARE GOODS.</a>
            <div class="d-flex">
                <button class="btn btn-outline-light position-relative">
                    Cart 🛒
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
                </button>
            </div>
        </div>
    </nav>

    <div class="w-100">
        <?php if (isset($content)) echo $content; ?>
    </div>


    <footer class="py-4 bg-white border-top text-center text-muted">
        <p>&copy; 2026 Rare Goods Inc. No fluff, just stuff.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>