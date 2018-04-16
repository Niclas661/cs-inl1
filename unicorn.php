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
      <?php
          $url = 'http://unicorns.idioti.se/' . $_GET['id'];
          $res = $client->request('GET', $url);
          $data = json_decode($res->getBody());
          $log -> info('Unicorn ('. $data -> name .') access');
          echo '<h1>' . $data -> name . '</h1>';
          echo '<h3>Upptäckt: ' . $data -> spottedWhen . '</h3>';
          echo '<img src="' . $data -> image . '"  width="500px" />';
          echo '<p>' . $data -> description . '</p>';
      ?>
    </div>
  </body>
</html>
