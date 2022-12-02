<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
        <div class="container">
            <a class="navbar-brand" href="#">Best store ever</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form role="search">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
    </nav>

    <section class="py-3 text-center container-fluid bg-light">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">The best products</h1>
                <p class="lead text-muted">Here you will find fresh articles, specially curated for you by our experts. <span>&#128076;</span></p>
            </div>
        </div>
    </section>

    <section>
        <div class="album py-5">
            <div class="container">
                <h2>Miscellaneous</h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    require_once("fakeproducts.php");
                    foreach ($products as $product) {
                    ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xxl-2 p-2">
                            <div class="card product-card h-100">

                                <div class="card-body">
                                    <img src="<?= $product->image ?>" alt="<?= $product->title ?>" title="<?= $product->title ?>" class="product-card img">
                                    <p class="card-text"><?= $product->title ?></p>
                                    <small class="text-muted"><?= $product->category ?></small>
                                </div>

                                <div class="card-footer">
                                    <span class="fw-bold fs-4 price float-start"><?= number_format($product->price, 2, '.') ?></span>
                                    <button type="button" class="round btn btn-secondary float-end"> + </button>
                                </div>

                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
    </section>

    <footer class="bg-light text-white">
        <div class="container p-4 pb-0 text-center">
            <section class="mb-4">
                <div class="text-dark">Follow us on:</div>
                <!-- Twitter -->
                <a class="btn btn-outline-dark btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                <!-- Facebook -->
                <a class="btn btn-outline-dark btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
                <!-- Instagram -->
                <a class="btn btn-outline-dark btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>
            </section>
        </div>
        <div class="text-left p-3 bg-dark">
            <div class="container">
                © 2017 - 2021 Best store ever &middot;
                <a class="text-white" href="/">Privacy</a> &middot; <a class="text-white" href="/">Terms</a> <a class="text-white float-end" href="index.php">Back to top</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>