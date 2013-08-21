<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title><?=$title?></title> <!-- $title - заголовок страницы -->
        <meta name="description" content="<?=$description?>"><!-- $description - описание страницы -->
        <meta name="keywords" content="<?=$keywords?>"><!-- $keywords - ключевые слова -->
		
        <?=$styles?><!-- Здесь будет подключение файлов css -->
        <style>
        <?=$custom_css?> <!-- Здесь будет css код -->
        </style>
    </head>
    <body>
		<?=$header?> <!-- Шапка страницы -->
        <?=$content?> <!-- Сюда будет вставлено основное содержимое страницы -->
		<?=$footer?> <!-- Подвал -->
        <?=$scripts?> <!--  Подключение файлов javascript -->
		<script type="text/javascript">
		<?=$custom_js?> <!-- код javascript -->
		</script>
    </body>
</html>