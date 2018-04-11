<html>
  <head>

  </head>
  <body>
    <?php
    require 'vendor/autoload.php';

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    $log = new Logger('Test');
    $log->pushHandler(new StreamHandler('test.log', Logger::INFO));
    $log->info('Site accessed');
    ?>
  </body>
</html>
