/*Google Map*/
var myLatlng = new google.maps.LatLng('-0.113052', '-78.448075');

var mapOptions = {
  center: myLatlng,
  zoom: 14,
  mapTypeId: google.maps.MapTypeId.ROADMAP,
  scrollwheel: false
};

var map = new google.maps.Map(document.getElementById("map"), mapOptions);

map.setCenter(new google.maps.LatLng('-0.113052', '-78.448075'));

//Marcador Recorrido
var image = 'img/marker.png';
var latitudGoogle;
var longitudGoogle;
var log = [];

var marcadorUnidadUno = new google.maps.Marker({
  position: {
    lat: -0.113052,
    lng: -78.448075
  },
  map: map,
  icon: image
});
