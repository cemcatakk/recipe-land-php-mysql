<!doctype html>
<html lang="en">
<?php
require_once 'db.php';
$recipe = getRecipe($_GET['id']);
if ($recipe == false) {
    header("Location:index.php");
}
?>

<head>
    <title><?php echo $recipe->name; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    require_once 'header.php';
    ?>
    <div class="main-content">
        <?php
        require_once 'quickaccess.php';
        ?>
        <div class="right-main-content ">
            <div class="recipe-info-container">
                <div class="info-container-left">
                    <h5 class="left-recipe-name">Name: <?php echo $recipe->name; ?> </h5>
                    <div class="left-recipe-info d-flex align-items-start flex-column justify-content-between">
                        <div class="recipe-info-top">
                            <p class="info-top-type">Cooking Type: <?php echo $recipe->type; ?></p>
                            <p class="info-top-calories">Calories: <?php echo $recipe->calories; ?> Kcal</p>
                            <p class="info-top-description">Description</p>
                            <p class="info-top-description"><?php echo $recipe->description; ?></p>
                        </div>
                        <div class="recipe-info-bottom">
                            <p class="info-bottom-difficulty">Difficulty: <?php echo $recipe->difficulty; ?></p>
                            <p class="info-bottom-time">Cooking Time: <?php echo $recipe->cookingtime; ?> mins.</p>
                        </div>
                    </div>
                    <div class="left-steps">
                        <?php
                        $count = 1;
                        foreach ($recipe->steps as $step) {
                        ?>
                            <div class="step-item">
                                <h5>Step <?php echo $count;
                                            $count++; ?></h5>
                                <div class="item d-flex align-items-center">
                                    <img src="<?php echo '' . $step['image']; ?>">
                                    <p class="item-description"><?php echo $step['description']; ?></p>

                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="info-container-right">
                    <?php
                    echo "<img src='{$recipe->images[0]}'>";
                    ?>
                    <div class="ingredients-container">
                        <div class="ingredient-item">
                            <?php
                            $ingredients = explode(',', $recipe->ingredients);
                            foreach ($ingredients as $ing) {
                                echo "<p>$ing</p>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="ingredients-container"> <?php echo "<p>Keywords: $recipe->keywords</p>"; ?></div>
                    <br>
                    <?php
                    for ($i = 1; $i < count($recipe->images); $i++) {
                        echo "<img src='{$recipe->images[$i]}'>";
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>