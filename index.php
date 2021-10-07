<!doctype html>
<html lang="en">

<head>
    <title>Homepage - Recipes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    require_once 'header.php';
    require_once 'db.php';
    ?>
    <div class="main-content">
        <?php
        require_once 'quickaccess.php';
        ?>
        <div class="right-main-content">
            <form method="GET" action="search.php" class="recipes-container d-flex align-items-center justify-content-center flex-column">
                <p>Recently Added</p>
                <div class="recipes">
                    <?php
                    $recipes = allRecipes();
                    foreach ($recipes as $recipe) {
                        echo "<a href='recipe-info.php?id=$recipe->id'
                                ><img src='{$recipe->images[0]}'/> $recipe->name</a>";
                    }
                    ?>
                </div>
                <input type="text" name="search" placeholder="Search a recipe..." class="search-input" required>
                <input type="submit" value="Search">
            </form>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>