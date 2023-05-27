function singleMap() {
    const svgMarker = {
        path: "M10.453 14.016l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM12 2.016q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
        fillColor: main_color,
        fillOpacity: 1,
        strokeWeight: 0,
        rotation: 0,
        scale: 2,
        anchor: new google.maps.Point(15, 30),
    };
    var myLatLng = {
        lng: $('#singleMap').data('longitude'),
        lat: $('#singleMap').data('latitude'),
    };
    var single_map = new google.maps.Map(document.getElementById('singleMap'), {
        zoom: 15,
        center: myLatLng,
        scrollwheel: false,
        fullscreenControl: true,
        scaleControl: false,
        navigationControl: false,
        streetViewControl: true,
        styles: [{
            "featureType": "landscape",
            "elementType": "all",
            "stylers": [{
                "color": "#f2f2f2"
            }]
        }]
    });
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: single_map,
        icon: svgMarker,
        draggable: true,
        title: 'Your location'
    });
    google.maps.event.addListener(marker, 'dragend', function (event) {
        document.getElementById("latitude").value = event.latLng.lat();
        document.getElementById("longitude").value = event.latLng.lng();
    });
}
var head = document.getElementsByTagName( 'head' )[0];

// Save the original method
var insertBefore = head.insertBefore;

// Replace it!
head.insertBefore = function( newElement, referenceElement ) {

    if ( newElement.href && newElement.href.indexOf( 'https://fonts.googleapis.com/css?family=Roboto' ) === 0 ) {
        return;
    }

    insertBefore.call( head, newElement, referenceElement );
};
var single_map = document.getElementById('singleMap');

if (typeof (single_map) != 'undefined' && single_map != null) {
    google.maps.event.addDomListener(window, 'load', singleMap);
}

$(document).on('click', '.edit_address', function (e) {
    setTimeout(() => {
        if(document.getElementById("singleMapEdit"))
        {
            $lat = $('.editAddress-form #latitude_edit').val();
            $long = $('.editAddress-form #longitude_edit').val();
    
            var latlng = new google.maps.LatLng($lat, $long);
            var mapOptions = {
                zoom: 10,
                center: latlng
            }
    
            singleMapEdit = new google.maps.Map(document.getElementById('singleMapEdit'), mapOptions);
    
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng($lat, $long),
                map: singleMapEdit,
                draggable: true
            });
    
            google.maps.event.addListener(marker, 'dragend', function(evt){
                $('.editAddress-form #latitude_edit').val(evt.latLng.lat());
                $('.editAddress-form #longitude_edit').val(evt.latLng.lng());
            });
        }
    }, 1000);
});