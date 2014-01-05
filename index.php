<html !DOCTYPE>
<?php ?>
<head>
    
<link href="css/stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" /> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSFdGPHXzMM5m-MUrtokbJHODONiuG8RU&sensor=false">
    </script>
</head>

<body>
    
<div id="container">
    
    <h1>Travelling Photo Finder</h1>
    
    <h2>To get started, just enter the name of a town or city into the box below and hit search!</h2>
    
    <div id="inputFields">
        <input type="text" name="place" id="place" />
        <input type="button" id="searchPlace" value="Search" />
    </div>
    
    <div id="whereTheMagicHappens">
        <div id="photos"></div>
        <div id="map"></div>
    </div>    
</div>    
    <script type="text/javascript">
        
    var placeCoordinates;
        
        // when the Search button is clicked
        $('#searchPlace').click(function() {
            var placeName = document.getElementById("place").value;
            
            //use placeName to create first Flickr API call
            var placeNameCall = 'http://api.flickr.com/services/rest/?method=flickr.places.find&api_key=bd7baec4e47b6420f3e17a115ab08074&query=' + placeName + '&format=json&jsoncallback=?';
            
            // connect to Flickr API and read results into JSON array
            $.getJSON(placeNameCall, function(json) {
                                                
                // create API call using place_id of first returned place
                var placeCall = 'http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=bd7baec4e47b6420f3e17a115ab08074&sort=interestingness-desc&place_id=' + json.places.place[0].place_id + '&extras=owner_name&per_page=13&page=1&format=json&jsoncallback=?';
                  
                // use placeCall to search for photos of specified place
                $.getJSON(placeCall, function(data) {
                    
                    // clear photos div
                    $('#photos').html('');    
                    
                    // for each photo in the array
                    $.each(data.photos.photo, function(i, item) {
                        
                        // read the photo ID
                        var photoID = item.id;
                            
                        // get the photo's url
                        var photoURL = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_m.jpg';
                            
                        // use the url and ownername to create html string
                        htmlString = '<div class="photo"><img src="' + photoURL + '">' + '<p>This photo is by ' + item.ownername + '</p></div>';
                            
                        // add image and owner name to the photos div
                        $('#photos').append(htmlString);
                        
                    }); // end of loop
                    
                });
                
                // access latitude and longitude of first returned place
                var lat = json.places.place[0].latitude;
                var long = json.places.place[0].longitude;
                
                //create Google Maps centered location with new searched-for location
                function initialize() {

                    // clear previous map
                    $('#map').html('');    
                
                     var mapOptions = {
                         zoom: 12,
                         center: new google.maps.LatLng(lat, long),
                         mapTypeId: google.maps.MapTypeId.HYBRID
                     };
                     var map = new google.maps.Map(document.getElementById('map'), mapOptions);
                 }
                 initialize();     
                
            });
            
        });
                
</script>
    
</body>

</html>
