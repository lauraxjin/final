 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src= "jquery.tweet-linkify.js"></script>
 <link href="style.css" rel="stylesheet">
 <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
 <script>
    function pageReady(){
    console.log("pageReady()");
    $('p.tweet').tweetLinkify();
    };
 </script>

<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "237439312-DRX5xRVtF0TyJeV8rCi0cNNG558GqGPjmyn4P7n0",
    'oauth_access_token_secret' => "mK5gGOwH0IQMUDIo8zM9jKwGnaD2XqUP7PuOq4MzXJxdw",
    'consumer_key' => "SARr2cyz0x8R6PzuGu5nv1hzZ",
    'consumer_secret' => "BHfGvkmRQSdeeNRfLp0S5yYHb6a482siSjO5HuHtbs2g2UFz7Q"
);
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=%23yoga&count=20';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
 $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
//$url = 'https://api.twitter.com/1.1/blocks/create.json';
//$requestMethod = 'GET';

/** POST fields required by the URL above. See relevant docs as above **/
//$postfields = array(
//    'screen_name' => 'usernameToBlock', 
//    'skip_status' => '1'
//);

/** Perform a POST request and echo the response **/
//$twitter = new TwitterAPIExchange($settings);
/*echo $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();*/
$string = json_decode($twitter ->setGetfield($getfield)
         -> buildOauth($url, $requestMethod)
         ->performRequest(),$assoc = TRUE);
echo "<h2>Latest Yoga Tweets</h2>";
foreach($string['statuses'] as $items)
{
   $tweetText = $items['text'];
   $users = $items['user'];
   echo "<img src='". $users['profile_image_url']. "'>";
   echo "<p class='tweet'> @". $users['screen_name']. ": </br>";
   echo "" .$tweetText. "";
   echo "When: " . $items['created_at']."</br></p>";


}
echo '<script>pageReady();</script>';
/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
?>