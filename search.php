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
  require_once 'db.php';
  ?>
  <div class="main-content">
    <?php
    require_once 'quickaccess.php';
    ?>
    <div class="right-main-content">
      <div class="search-recipes-container d-flex align-items-center justify-content-center flex-column">
        <form class="search-recipe-header d-flex align-items-center justify-content-center">
          <p>Filter</p>
          <input name="min" type="number" placeholder="Min Calories">
          <input name="max" type="number" placeholder="Max Calories">
          &nbsp Type:
          <input type="text" name="type">
          &nbsp Cooking Time:
          <input type="number" name="time" style="width:80px">
          &nbsp Difficulty:<select name="difficulty">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <input type="submit" value="Apply">
        </form>
        <div class="search-recipes">
          <?php
          if (isset($_GET['search'])) {
            $recipes = searchRecipe($_GET['search']);
          } else {
            $recipes = filterRecipes($_GET['min'], $_GET['max'], $_GET['type'], $_GET['time'], $_GET['difficulty']);
          }
          ?>
          <?php
          if(count($recipes)==0){
            echo "<p>No recipe found.</p>";
          }
          foreach ($recipes as $recipe) {
          ?>
            <a href="recipe-info.php?id=<?php echo $recipe->id;?>" class="search-recipe-item d-flex align-items-start">
              <img src="<?php echo $recipe->images[0]; ?>" alt="">
              <div class="search-recipe-item-info">
                <p class="item-info-name"><?php echo $recipe->name; ?></p>
                <p class="item-info-desc"><?php echo $recipe->description; ?></p>
              </div>
            </a>
          <?php
          }
          ?>
         
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