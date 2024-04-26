<!-- header.php -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
<nav class="navbar navbar-expand-lg navbar-blue bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Site de sondage</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="sondage_ajouter.php">Ajouter un sondage</a>
                </li>
                <?php if (isset($_SESSION["ok"])): ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="graphique.php">Graphique des resultats</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="vote_result.php">Resultats Votes</a>
                    </li>
                <?php endif; ?>

                <?php if (isset($_SESSION["connected"])): ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="logout.php">Deconnexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>