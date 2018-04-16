<html>
  <head>
    <title>Inl 1</title>
    <style>
      .left {
        float: left;
        width: 30%;
      }
      .right {
        float: right;
        width: 70%;
      }
    </style>
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
    ?>
    <div class="left">
      <ul>
      <?php
          $res = $client->request('GET', 'http://unicorns.idioti.se/');
          $data = json_decode($res->getBody());
          foreach($data as $unicorn) {
              echo '<li><a href="unicorn.php?id=' . $unicorn -> id . '">' . $unicorn -> name . '</a></li>';
          }
      ?>
      </ul>
    </div>
    <div class="right">
      <h1>Enhörningar</h1>
      <p>Klicka på en enhörning i listan till vänster för att veta mer om den.</p>
    </div>
  </body>
</html>
