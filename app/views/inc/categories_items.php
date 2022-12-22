<?php $items = new Items() ?>

<section id="categories_items">
    <img id="logo" src="https://cdn.discordapp.com/attachments/1050411938594689024/1051799330308243486/image-removebg-preview.png" alt="">
    <div class="categories">
        <ul class="categories-links">
            <li><a id="categories-links-active" href="#">ALL</a></li>
            <li><a href="#">APPAREL</a></li>
            <li><a href="#">ACCESSORIES</a></li>
            <li><a href="#">MOVIES</a></li>
            <li><a href="#">MISC</a></li>
        </ul>
    </div>
    <h2 id="categories-links-current">ALL</h2>
    <div class="categories-items">
        <?php $items->listItems() ?>
    </div>
</section>