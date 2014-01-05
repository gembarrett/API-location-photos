<html !DOCTYPE>
<?php ?>
<head>
    
<link href="css/stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" /> 
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
    
    <div id="footer"><p>This is an API experiment by <a href="http://www.gembarrett.com" target="_blank">Gem Barrett</a><br /><br />
            <a href="https://github.com/gembarrett/API-location-photos" target="_blank"><img src="images/github.png" alt="See this project on GitHub" /></a>
            <a href="http://www.linkedin.com/in/gembarrett" target="_blank"><img src="images/linkedin.png" alt="Connect with me on LinkedIn" /></a>
            <a href="https://twitter.com/gembarrett" target="_blank"><img src="images/twitter.png" alt="Follow me on Twitter" /></a>
        </p></div>
    
</div>    

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>    
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSFdGPHXzMM5m-MUrtokbJHODONiuG8RU&sensor=false"></script>
<script src="js/api.min.js"></script>
</body>

</html>
