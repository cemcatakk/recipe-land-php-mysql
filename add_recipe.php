<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
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
        <div class="right-main-content">
            <p class="text-center">Add Recipe</p>
            <form class="main-forum d-flex justify-content-center align-items-start" action="db.php" method="POST" enctype="multipart/form-data">
                <div class="right-main-content-first d-flex flex-column ">
                    <input type="hidden" value="1" name="stepcount" id="stepcount">
                    <input type="text" name="name" placeholder="Recipe Name" required>
                    <input type="text" name="type" placeholder="Type of cooking" required>
                    <input type="text" name="calories" placeholder="Calories (Kcal)" required>
                    <p>Difficulty</p>
                    <select name="difficulty" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <br>
                    <input type="number" name="cookingtime" placeholder="Cooking Time (Minues)" required>
                    <input type="file" multiple name="images[]" required>
                    <p>Description</p>
                    <textarea cols="30" rows="5" name="description" class="desc" required></textarea>
                    <p>Keywords(Seperate with comma)</p>
                    <textarea cols="30" rows="5" class="desc" name="keywords" required></textarea>
                    <p>Recipe Ingredients</p>
                    <textarea cols="30" rows="5" class="desc" name="ingredients" required></textarea>
                </div>
                <div class="right-main-content-second d-flex flex-column">
                    <input type="button" value="Add Step" onclick="addStep()">
                    <div class="right-main-content-second d-flex flex-column" id="steps">
                        <input type="file" name="stepimg1">
                        <p>Description</p>
                        <textarea name="steptext1" cols="30" rows="4"></textarea>
                    </div>
                    <input type="submit" value="Submit" name="addrecipe">
                </div>

            </form>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>