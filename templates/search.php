<p><a href="../index.php">Вернуться на главную</a></p>
<hr>
<?php if (!empty($reports)): ?>
<h2>Результаты поиска по запросу «<span><?=$safe_search;?></span>»</h2>
<ul>
    <?php foreach ($reports as $value): ?>

        <div>
            <span><strong>Имя расчета</strong></span>
            <h4><a href="#"><?=$value['name']?></a></h4>
        </div>
        <div>
            <span><strong>Текст расчета</strong></span>
            <p>
                <?=$value['text']?>
            </p>
            <span><strong>Коды расчета</strong></span>
            <p>
                <?=$value['code']?>
            </p>
        </div>
        <br>
        <hr>
    <?php endforeach; ?>
<?php endif; ?>
<?php if (!empty($error)): ?>
    <?php foreach($error as $err): ?>
        <h2><li><strong><?=$err;?></strong></li></h2>
    <?php endforeach; ?>
<?php endif; ?>
</ul>
