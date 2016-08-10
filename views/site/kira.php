<form method="post">
    <input type="hidden" 
           name="<?php echo Yii::$app->request->csrfParam; ?>"
           value="<?php echo Yii::$app->request->csrfToken; ?>" />
    <input type="text" name="num1"> +
    <input type="text" name="num2">
    <input type="submit" name="submit" value="jumlah">
</form>

<?php echo 'Jumlah:' . $total; ?>

