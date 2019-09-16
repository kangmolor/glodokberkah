<div class="navbar">

<?php if(isset($_POST["cari"])){
    $query = cari($_POST["keyword"]);} ?>

<a href="index.php"><div class="strip">Home</div></a>
<a href=""><div class="strip">About</div></a>
<a href=""><div class="strip">Info</div></a>
<a href=""><div class="strip">Contact</div></a>
<a href=""><div class="strip">Pricing</div></a>
<form action="" method="post">
<input type="search" name="keyword" placeholder="ketikkan sesuatu" size="40" autocomplete="off" autofocus>
<button type="submit" name="cari">Cari!</button>
</form>

</div>