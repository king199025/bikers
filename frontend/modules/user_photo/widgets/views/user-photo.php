<?php foreach($photo as $item): ?>
    <a class="fancybox-thumb-2 gallery-items" rel="fancybox-thumb" href="/<?= $item->img?>" title="">
        <img src="/<?= $item->img?>" alt="">
    </a>
<?php endforeach; ?>
