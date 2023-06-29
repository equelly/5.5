<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    </head>
    <body>
        <div id = "app">
        <example-component>
        
    </example-component>

        <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
    </div>
    </body>
</html>
<?php /**PATH /opt/lampp/htdocs/first_project/resources/views/welcome.blade.php ENDPATH**/ ?>