<!DOCTYPE html>
<html>
   <head>
      <title>LiveCount | YouTube</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
      <link href="dist/css/bootstrap-material-design.css" rel="stylesheet">
      <link href="dist/css/ripples.min.css" rel="stylesheet">
      <link href="index.css" rel="stylesheet">
      <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
      <link type="text/css" rel="stylesheet" href="dist/css/counter.css">
      <meta name="description" content="Count YouTube subscribers for FREE! Every second a refresh from the counter.">
      <meta name="keywords" content="Youtube, Youtube subscriber count, YT, Subscriber, Subscribers, Subs, SUB4SUB, LiveCount, Live Count, Livecounter, Live Counter, Live subscribers, Count live, cool">
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
      <script type="text/javascript">
         window.cookieconsent_options = {
             "message": "This website uses cookies to analyse our traffic.",
             "dismiss": "OK",
             "learnMore": "",
             "link": null,
             "theme": "light-floating"
         };
      </script>
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js"></script>
   </head>
   <body>
      <?php include 'inc/analytics.php'; ?>
      <script src="js/youtube.js"></script>
      <script src="js/counter.js"></script>
      <?php
         $youtuberstart = "Dumpert";
         $api = false;
         
         if (isset($_POST['channel']) && strlen(trim($_POST['channel'])) || isset($_GET['c']) && strlen(trim($_GET['c']))) {
           if (isset($_POST['channel'])) {
             $inputform = trim(htmlspecialchars($_POST['channel']));
           } else {
             $inputform = trim($_GET['c']);
             $api = true;
           }
           $inputformlower = strtolower($inputform);
         
           if ($inputformlower == 'ksi') {
             $channel = 'KSIOlajidebt';
           } else {
             $channel = $inputform;
           }
         } else {
           $channel = $youtuberstart;
         }
         ?>
      <div class="header-panel shadow-z-2">
         <div class="container-fluid">
         </div>
      </div>
      <div class="container-fluid main">
         <div class="pages col-xs-11">
            <!-- <div class="row"> -->
            <div class="col-xs-11">
               <div class="well page active" id="home">
                  <div class="center">
                     <em>LIVECOUNT.EU</em>
                     <h1 class="header text"><?php echo $channel; ?></h1>
                     <h1 id="currentLive" class="counter text meter odometer">[loading]</h1>
                     <h1 id="currentLive" class="not-found">Not found</h1>
                     <?php if (!$api): ?>
                     <div class="form-group label-placeholder">
                        <form action="" method="POST">
                           <div class="input-group">
                              <input type="text" class="form-control" name="channel" placeholder="E.G. MarkiplierGAME or UC_SG1fKhjJAW6TaV5wOLgjQ (Press ENTER to load)" id="i5p">
                              <span class="input-group-btn">
                              <a href="channel_id"><button class="btn btn-warning btn-sm" type="button">?</button></a>
                              </span>
                           </div>
                        </form>
                     </div>
                     <?php endif ?>
                     <script>
                        username = '<?php echo $channel ?>'
                        $("#cpa-form").submit(function(e) {
                            return false;
                        });
                     </script>
                     <hr>
                  </div>
                  <div class="row">
                     <a href="?c=<?php echo $channel; ?> " target="_blank">
                     <button type="button" class="btn btn-primary" data-toggle="modal">OPEN IN NEW TAB</button>
                     </a>
                     <a href="https://twitter.com/intent/tweet?button_hashtag=livecounteu&text=I'm%20counting%20live%20youtube%20subscribers%20with%20https%3A%2F%2Flivecount.eu%20%2C%20You%20too%3F" data-related="livecounteu">
                     <button type="button" class="btn btn-primary" data-toggle="modal">TWEET</button>
                     </a>
                     <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#refs">Host</button>
                     <p class="text center">&copy;
                        <?php echo date("Y"); ?> LiveCount.eu
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
   </body>
</html>
