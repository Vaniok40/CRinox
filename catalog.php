<?php
require 'views/header.php';
?>
<section class="catalog">
<div class="container">
<div class="url">
    <a class="home" href="index.php">Pagina principal&#259;</a>&nbsp;/&nbsp;Catalog de lucr&#259;ri
</div>
    <div class="categories">
    &#x25CF;&nbsp;&nbsp;Catalogul de lucr&#259;ri&nbsp;&nbsp;&#x25CF;
    </div>
    <form  method="GET" class="categories-form">
<label><span class="category-name">Toate</span><input value="*" type="radio" name="category"></label>
<label><span class="category-name">Balustrade</span><input value="balustrada" type="radio" name="category"></label>
<label><span class="category-name">Balustrade cu laminare</span><input value="balustrada cu laminare" type="radio" name="category"></label>
<label><Span class="category-name">Copertine</span><input value="copertina" type="radio" name="category"></label>
<label><span class="category-name">Porti/Garduri</span><input value="poarta/gard" type="radio" name="category"></label>
<label><span class="category-name">Scari</span><input value="scara" type="radio" name="category"></label>
</form>
<div class="works">
<?php
if(isset($_GET["category"])){
    $category = $_GET["category"];
}

?>
</div>
</div>
</section>
<?php
require 'views/footer.php';
?>