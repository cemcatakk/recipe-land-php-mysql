<?php
$vt = mysqli_connect("localhost", "root", "", "recipesdb");
mysqli_set_charset($vt,'utf8');
if (isset($_POST['addrecipe'])) {
    $stepCount = $_POST['stepcount'];
    $name = clear($_POST['name']);
    $type = clear($_POST['type']);
    $calories = $_POST['calories'];
    $difficulty = $_POST['difficulty'];
    $cookingtime = $_POST['cookingtime'];
    $description = clear($_POST['description']);
    $keywords = clear($_POST['keywords']);
    $ingredients = clear($_POST['ingredients']);
    $imageCount = count($_FILES['images']['name']);
    $query = "INSERT INTO recipes(name,type,calories,difficulty,
    cookingtime,description,keywords,ingredients)
     VALUES('$name','$type',$calories,$difficulty,$cookingtime,
     '$description','$keywords','$ingredients')";
    $vt->query($query);
    $stmt = $vt->query('SELECT LAST_INSERT_ID() as id');
    if ($row = $stmt->fetch_assoc()) {
        $id=$row['id'];
    }
    for ($i = 0; $i < $imageCount; $i++) {
        $filename = "img/".$_FILES['images']['name'][$i]."id_".$id.".jpeg";
        move_uploaded_file($_FILES['images']['tmp_name'][$i], $filename);
        $vt->query("INSERT INTO recipeimages(recipeid,image)
         VALUES($id,'$filename')");
    }
    for ($i=1; $i < $stepCount; $i++) { 
        $filename = "img/".$_FILES['stepimg'.$i]['name']."id_".$id.".jpeg";
        move_uploaded_file($_FILES['stepimg'.$i]['tmp_name'],  $filename);
        $desc = $_POST['steptext'.$i];
        $vt->query("INSERT INTO recipesteps(recipeid,description,image)
         VALUES($id,'$desc','$filename')");
    }
    header("Location:index.php?recipeAdded");
}
function clear($text)
{
    $text = str_replace("'","",$text);   
    return $text;
}
class Recipe{
    function __construct($info,$vt)
    {
        $this->images = [];
        $this->steps = [];
        $this->id = $info['id'];
        $this->name = $info['name'];
        $this->type  = $info['type'];
        $this->calories = $info['calories'];
        $this->difficulty = $info['difficulty'];
        $this->cookingtime = $info['cookingtime'];
        $this->description = $info['description'];
        $this->keywords = $info['keywords'];
        $this->ingredients = $info['ingredients'];
        $stmt = $vt->query("SELECT * FROM recipesteps WHERE recipeid=$this->id");
        while($row = $stmt->fetch_assoc()){
            array_push($this->steps,$row);
        }
        $stmt = $vt->query("SELECT * FROM recipeimages WHERE recipeid=$this->id");
        while($row = $stmt->fetch_assoc()){
            array_push($this->images,$row['image']);
        }
    }
}
function allRecipes()
{
    global $vt;
    $stmt = $vt->query("SELECT * FROM recipes ORDER BY id desc");
    $recipes=[];
    while($row = $stmt->fetch_assoc()){
        array_push($recipes,new Recipe($row,$vt));
    }
    return $recipes;
}
function getRecipe($id)
{
    global $vt;
    $stmt = $vt->query("SELECT * FROM recipes WHERE id=$id");
    if($row = $stmt->fetch_assoc()){
        return new Recipe($row,$vt);
    }
    else return false;
}
function searchRecipe($key)
{
    global $vt;
    $stmt = $vt->query("SELECT * FROM recipes WHERE keywords LIKE '%$key%' 
    OR name LIKE '%$key%' OR description LIKE '%$key%' OR ingredients LIKE '%$key%' ORDER BY id desc");
    $recipes=[];
    while($row = $stmt->fetch_assoc()){
        array_push($recipes,new Recipe($row,$vt));
    }
    return $recipes;
}
function filterRecipes($min,$max,$type,$time,$diff)
{
    $query = "SELECT * FROM recipes WHERE 1 ";
    if($min!=''){
        $query.="AND calories>=$min ";
    }
    if($max!=''){
        $query.="AND calories<=$max ";
    }
    if($type!=''){
        $query.="AND type LIKE '%$type%' ";
    }
    if($time!=''){
        $query.="AND (cookingtime BETWEEN ($time-50) AND ($time+50)) ";
    }
    $query.="AND difficulty=$diff";
    global $vt;
    $stmt = $vt->query($query);
    $recipes=[];
    while($row = $stmt->fetch_assoc()){
        array_push($recipes,new Recipe($row,$vt));
    }
    return $recipes;
}