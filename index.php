<html>
  <head>

  </head>
  <body>
    <?php
    require 'vendor/autoload.php';

    use \Monolog\Logger;
    use \Monolog\Handler\StreamHandler;
    use GuzzleHttp\Client;

    $log = new Logger('SiteVisit');
    $log->pushHandler(new StreamHandler('test.log', Logger::INFO));
    // $log->info('Page (index.php) accessed');

    $client = new Client([
        'headers' => [
            'accept' => ['application/json']
        ]
    ]);
    $res = $client->request('GET', 'http://unicorns.idioti.se/');
    $data = json_decode($res->getBody());
    foreach($data as $unicorn) {
        echo '<h1>' . $unicorn -> name . '</h1>';
    }
    ?>

  </body>
</html>
