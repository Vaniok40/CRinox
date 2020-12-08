<?php
require 'views/header.php';
require 'connect.php';
?>
<section class="catalog">
<div class="container">
<div class="url">
    <a class="home" href="index.php">Pagina principal&#259;</a>&nbsp;/&nbsp;Catalog de lucr&#259;ri
</div>
    <div class="categories">
    &#x25CF;&nbsp;&nbsp;Catalogul de lucr&#259;ri&nbsp;&nbsp;&#x25CF;
    </div>
    <form action="" onsubmit="return false" class="categories-form">
<label><span class="category-name">Toate</span><input value="*" type="submit" name="category"></label>
<label><span class="category-name">Balustrade</span><input value="balustrade" type="submit" name="category"></label>
<label><span class="category-name">Balustrade cu laminare</span><input value="balustrade cu laminare" type="submit" name="category"></label>
<label><Span class="category-name">Copertine</span><input value="copertine" type="submit" name="category"></label>
<label><span class="category-name">Por&#355;i/Garduri</span><input value="porți/garduri" type="submit" name="category"></label>
<label><span class="category-name">Sc&#259;ri</span><input value="scări" type="submit" name="category"></label>
</form>
<div class="works-grid">

</div>
<div class="load-more-btn">
<button class="check-more">Vezi mai multe</button>
</div>
</div>
</div>
</section>
<?php
require 'views/footer.php';
?>