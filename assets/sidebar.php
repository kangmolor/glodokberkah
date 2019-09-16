<div class="sidebar">
    <div class="logo">
        <h1>GlodokBerkah</h1>
    </div>
   
        <h3>Kategori:</h3>

    <a href="kategori.php?id=?????"><div class="kategori">Peralatan Elektronik</div><a>
        

        <?php
    $query = mysqli_query($conn,"SELECT distinct kategori from detailbarang");
    while($subcategory = mysqli_fetch_array($query)){ ?>
        <ul>
            <li>
                <div class="kategori-list">
                 
                <a href="kategori.php?id=<?= $subcategory[0]?>"><?= $subcategory[0]?></a>
                    
                
            </div>
            </li>
        </ul>
    <?php } ?>
</div>
    
