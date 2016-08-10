<form method="post">
    <input type="hidden" 
           name="<?php echo Yii::$app->request->csrfParam ?>"
           value="<?php echo Yii::$app->request->csrfToken ?>">
    <input type="text" name="string">
    <input type="submit" name="submit" value="Hantar">
</form>

<?php echo $arahan; ?>
