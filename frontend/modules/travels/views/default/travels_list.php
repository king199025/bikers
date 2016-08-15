<h2 class="travels__road_title">Список путешествий</h2>
<div class="travels__road_left">
    <h3 class="travels__road_column-name">Название</h3>
    <?php foreach ($travels as $item): ?>
        <div class="travelName" id="<?= $item['id'] ?>"><?= $item['name'] ?>
            <?php
            $cityS = '';
            $cityEn = '';
            foreach ($cityList as $it) {
                if ($it['value'] == $item['city_start']) {
                    $cityS = $it['label'];
                    break;
                }
            }
            foreach ($cityList as $it) {
                if ($it['value'] == $item['city_end']) {
                    $cityEn = $it['label'];
                    break;
                }
            }
            ?>
            <p><?= $cityS ?> - <?= $cityEn ?></p>
        </div>
        <?php endforeach; ?>
</div>
<div class="travels__road_right">
    <h3 class="travels__road_column-name travels__road_column-name-second">Дата выезда</h3>
<?php foreach ($travels as $item): ?>
        <p><?= $item['dt_start'] ?></p>
    <?php endforeach; ?>
</div>