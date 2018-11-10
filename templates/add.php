<p>
    <a href="../index.php">Вернуться на главную</a>
</p>
<form action="add.php" method="POST">
    <p>Название расчета</p>
    <input type="text" name="name" value="<?=$data['name'] ?? '' ;?>">
    <p>Текст расчета</p>
    <textarea name="text" cols="30" rows="10"><?=$data['text'] ?? '' ;?></textarea>
    <p>
    <button type="submit" name="add">Добавить расчет</button>
    </p>
    <?php if(!empty($errors)): ?>
        <?php foreach($errors as $err): ?>
            <li><strong style="color: red;"><?=$err;?></strong></li>
        <?php endforeach; ?>
    <?php endif; ?>
</form>