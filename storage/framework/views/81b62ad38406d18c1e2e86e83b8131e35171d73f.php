<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <title>Document</title>
</head>
<body>
    <h1 class="text 3xl font-bold underline">
Hello, World!
    </h1>
    <div id = "app">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html><?php /**PATH /opt/lampp/htdocs/first_project/resources/views/app.blade.php ENDPATH**/ ?>