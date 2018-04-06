<!DOCTYPE html>
<html>
  <head>
    <title>Place Autocomplete Address Form</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">

  </head>

  <body>
    <div>
      <input id="autocomplete" placeholder="Enter your address" type="text"></input>
    </div>

    <script>
      var autocomplete;

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjiPiq0g0VPiJ9fZUNsvvmI7JczVr_5Ks&libraries=places&callback=initAutocomplete"
        async defer></script>
  </body>
</html>