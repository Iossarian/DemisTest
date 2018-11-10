<a href="../index.php">Вернуться на главную</a>
<hr>
<ul>
    <?php foreach ($reports_array as $value): ?>

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
</ul>