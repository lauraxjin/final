 <html>
   <head>
   <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
   <title>Yoga Web API</title>
   <link href="bootstrap.min.css" rel="stylesheet">
   <link href="style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Crafty+Girls' rel='stylesheet' type='text/css'>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsHnnWH-vYw1GErcmGIDx1JYGES0rflI8&sensor=false">
    </script>
    <script src="instafeed.min.js" type="text/javascript"></script>
    <script src= "jquery.tweet-linkify.js"></script>
    <script src="instagram.js" type="text/javascript"></script>
    <script>
      function pageReady(){
      console.log("pageReady()");
      $('p.tweet').tweetLinkify();
      };
    </script>
   <!--instafeed-->
   <script>
      var feed = new Instafeed({
        get: 'tagged',
        tagName: 'yoga',
        clientId: '681476f9f41249eda847f775abc87b93'
    });
    feed.run();
   </script>
   <script type="text/javascript">
        $(document).ready(function() {
          loadXML();
        });
      
        //load marker xml
        function loadXML(){
        
           $.ajax({
            type: "GET",
            url: "cent_loc.xml",
            dataType: "xml",
            success: initialize
        });
        }
        function initialize(xml) {
          //map
          var infowindow = null;
          var mapOptions = {
            center: new google.maps.LatLng(35.9333, -79.0333),
            zoom: 10
          };
          var map = new google.maps.Map(document.getElementById("map-canvas"),
              mapOptions);
          //marker
              $(xml).find("center").each(function(index){
                  var name= $(this).find("name").text();
                  var location= $(this).find("location").text();
                  var lat=$(this).find("lat").text();
                  var long=$(this).find("long").text();
                  var marker=[];
                  var contentString=[];
                  var infowindow=[];
                  
                  marker[index] = new google.maps.Marker
                  ({
                    position: new google.maps.LatLng(lat, long),
                    map: map,
                    draggable:true,
                    animation: google.maps.Animation.DROP,
                    title: ''+name+''
                  });
                  console.log(index);
                  contentString[index] = '<h4>'+name+'</h4><a href="#">'+location+'</a>'
                  infowindow[index] = new google.maps.InfoWindow
                  ({
                    content: contentString[index],
                  });
                  google.maps.event.addListener(marker[index], 'click', function(){
                  infowindow[index].open(map,marker[index]);
                    //if (infowindow) {
                      //infowindow.close();
                    //}
                  //infowindow[index].close();
                  console.log("Theses are markers ----" + marker[index]);
                  })
                  //console.log(marker);
                  //console.log(contentString);
                  console.log("Theses are markers ----" + marker[index]);
        });
        } 
      //google.maps.event.addDomListener(window, 'load', foo);
      </script>
   
      </head>
      <body>
        <h1 class="title">Yoga in the Triangle</h1>
        <h3 class="title center" style="color:black;"><a href="#intro">Intro</a> | <a href="#pic">Picture Gallery</a> | <a href="#styles">Yoga Styles</a> | <a href="#twtitle">Tweets</a> | <a href="#map">Locations</a></h3>
       
        <div class="bg">
            <div class="container">
            <div class="row">
            <div class="col-md-8">
                <div id="intro">
                    <h3 class='othertitle'>Introduction to Yoga</h3>
                    <h4 class="intro">Yoga is a mind and body practice with historical origins in ancient Indian philosophy. Like other meditative movement practices used for health purposes, various styles of yoga typically combine physical postures, breathing techniques, and meditation or relaxation.</h4>
                </div>
                <div id="pic">
                    <h3 class='othertitle' id="pic-gallery">Picture Gallery</h3>
                    <div id="instafeed"></div>
                </div>
                <div id="styles">
                    <h3 class='othertitle'>Common Yoga Styles</h3>
                     <h4 class="intro">Yoga in its full form combines physical postures, breathing exercises, meditation, and a distinct philosophy. There are numerous styles of yoga. Hatha yoga, commonly practiced in the United States and Europe, emphasizes postures, breathing exercises, and meditation. Hatha yoga styles include Ananda, Anusara, Ashtanga, Bikram, Iyengar, Kripalu, Kundalini, Viniyoga, and others.</h4>
                    <h2 style="color:#D9E0AD;">&nbsp;&nbsp;&nbsp;Styles</h2>
                    <div class="btn-group styles-margin" id="button1" id="padding"><a data-toggle="text1"><button type="button" class="btn btn-default btn-sm"><strong><h3>Tibetan</h3></strong>  Toggle to hide</button></a></div>
                        <p class="text1 intro"><br/>
                        <b>
                        Tibetan Yoga is a term used among Buddhists to describe a range of tantric meditation and pranayama practices. Though little is known in the West about the physical practices of Tibetan Yoga, in 1939, Peter Kelder published Ancient Secret of the Fountain of Youth, describing a sequence of postures of Tibetan origin called "The Five Rites of Rejuvenation." In 1994, yoga teacher Christopher Kilham published a modern version of these exercises called The Five Tibetans: Five Dynamic Exercises for Health, Energy, and Personal Power (Inner Traditions). Composed of five flowing movements, this active workout keeps students on the move. Beginners start with 10 or 12 repetitions and progressively work their way up to the 21 repetitions of the full routine. Classes may be difficult to find.
Tibetan Buddhist monk Tarthang Tulku adapted another ancient movement practice for the modern West called Kum Nye. More contemplative in nature than the vigorous Five Tibetans, Kum Nye strives to integrate body and mind and means "interaction with the subtle body." For more information, see Tulku's Kum Nye Relaxation or visit nyingma.org.
                         <hr>
                          </b>
                        </p>
                     <div class="btn-group styles-margin"" id="button2" id="padding"><button type="button" class="btn btn-default btn-sm"><strong><h3>Hatha</h3></strong> Toggle to hide  </button></div>
                        <p class="text2 intro"><br/>
                        <b>
                           Hatha

                        If you are browsing through a yoga studio's brochure of classes and the yoga offered is simply described as "hatha," chances are the teacher is offering an eclectic blend of two or more of the styles described above. It's a good idea to ask the teacher or director of the studio where he or she was trained and if the poses are held for a length of time or if you will be expected to move quickly from one pose to the next, and if meditation or chanting is included. This will give you a better idea if the class is vigorous or more meditative.
                         <hr>
                          </b>
                        </p>
                        <div class="btn-group styles-margin" id="button3" id="padding"><button type="button" class="btn btn-default btn-sm" ><strong><h3>Aunusara</h3></strong>  Toggle to hide</button></div>
                        <p class="text3 intro"><br/>
                        <b>
                           Anusara

                        Anusara means "to step into the current of divine will." Anusara Yoga is an integrated approach to hatha yoga in which the human spirit blends with the precise science of biomechanics. It is a new system of hatha yoga that can be both spiritually inspiring and yet grounded in a deep knowledge of outer and inner body alignment. It can be therapeutically effective and physically transformative. The central philosophy of this yoga is that each person is equally divine in every part—body, mind, and spirit. Each student's various abilities and limitations are respected and honored. Anusara Yoga differentiates itself from other hatha yoga systems with three key areas of practice:

Attitude: The practitioner balances an opening to grace with an aspiration for awakening to his or her true nature. 
Alignment: Each pose is performed with an integrated awareness of all the different parts of the body. 
Action: Each pose is performed as an artistic expression of the heart in which muscular stability is balanced with an expansive inner freedom. For more information, visit anusara.com.
                         <hr>
                          </b>
                        </p>
                        <div class="btn-group styles-margin" id="button4" id="padding"><button type="button" class="btn btn-default btn-sm "><strong><h3>Kripalu</h3></strong>  Toggle to hide</button></div>
                        <p class="text4 intro"><br/>
                        <b>
                           Kripalu

                       Located in the Berkshire region of Western Massachusetts, the Kripalu Center for Yoga and Health has helped guide thousands of people along their path of self-discovery by teaching a system of yoga developed over a 20-year period by yogi Amrit Desai and the Kripalu staff.

During the 1970s, while studying under Indian guru Kripaluvananda, Amrit felt his body begin to move in a spontaneous flow of postures without the direction of his mind. This deep release of prana (life's energy force) brought about a profound transformation in Amrit, so he developed these movements into three stages of practice which he could then teach to others.

The three stages of Kripalu yoga include: willful practice (a focus on alignment, breath, and the presence of consciousness); willful surrender (a conscious holding of the postures to the level of tolerance and beyond, deepening concentration and focus of internal thoughts and emotions); and meditation in motion (the body's complete release of internal tensions and a complete trust in the body's wisdom to perform the postures and movements needed to release physical and mental tensions and enter deep meditation). For more information, visit kripalu.org.
                         <hr>
                          </b>
                        </p>
                         <script>
                            $( "#button1" ).click(function() {
                            $( ".text1" ).toggle( "slow" )
                            });
                            $( "#button2" ).click(function() {
                            $( ".text2" ).toggle( "slow" )
                            });
                               $( "#button3" ).click(function() {
                            $( ".text3" ).toggle( "slow" )
                            });
                                  $( "#button4" ).click(function() {
                            $( ".text4" ).toggle( "slow" )
                            });
                            </script>
                </div>
                <div id="map">
                    <h3 class='othertitle'>Triangle Locations</h3>
                    <div id="map-canvas" style="width:500px; height:500px; margin-left: 80px;"/></div>
                </div>
            </div>
              <!--Twitter-->
            <div class="col-md-4">
                <h4 class='twtitle' id="twtitle">Latest Yoga Tweets</h4>
                <div class="twdiv">
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
                $getfield = '?q=%23yoga&count=18';
                $requestMethod = 'GET';
                $twitter = new TwitterAPIExchange($settings);
                $twitter->setGetfield($getfield)
                             ->buildOauth($url, $requestMethod)
                             ->performRequest();
                $string = json_decode($twitter ->setGetfield($getfield)
                         -> buildOauth($url, $requestMethod)
                         ->performRequest(),$assoc = TRUE);
                foreach($string['statuses'] as $items)
                {
                   $tweetText = $items['text'];
                   $users = $items['user'];
                   $time = $items['created_at'];
                   $time1 = date('d-m-Y', strtotime($time));
                   echo "<img class='pictw' src='". $users['profile_image_url']. "'>";
                   echo "<p class='tweet'> @". $users['screen_name']. ": </br>";
                   echo "" .$tweetText. "";
                   echo "<p class='tweet1'>";
                   echo "Date: " . $time1."</br></p></p>";
                
        
                }
                echo '<script>pageReady();</script>';
               
                ?>
            </div><!--twitter column-->
            
        </row>
        
      </div>
          </div><!--bg-->
       </div><!--container--> 
       </div>
      </body>
 </html>