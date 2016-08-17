
<?php foreach ($events as $item): ?>
    <!-- open .events-conrent__item -->
    <div class="events-conrent__item">
        <!-- open .events-conrent__item_thumb -->
        <a href="#" class="events-conrent__item_thumb">
            <img src="/frontend/web/img/placeholder.png" alt="" />
            <span class="events-conrent__item_distance"><strong>2800</strong>км</span>
        </a>
        <!-- close .events-conrent__item_thumb -->
        <a href="#" class="events-conrent__item_title"><?= $item['name'] ?></a>
        <span class="events-conrent__item_date"><?= date('j F', $item['dt_start']) ?></span>
        <a href="#" class="button button_orange events-conrent__item_price"><?= $item['city'][0]['Name'] ?>, 50RUS</a>
    </div>
    <!-- close .events-conrent__item -->
<?php endforeach;