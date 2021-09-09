<div id="mapid" style="height: 530px;"></div>
<div id="latitude"></div>
<div id="longitude"></div>

<script>
    var latitud = document.getElementById("latitude");
    var longi = document.getElementById("longitude");
    //mengambil titik kordinat device
    getLocation();
    function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        console.lof("Geolocation is not supported by this browser.");
    }
    }

    function showPosition(position) {
        latitud.innerHTML = position.coords.latitude;
        longi.innerHTML = position.coords.longitude;

        let latLng1 = L.latLng(position.coords.latitude, position.coords.longitude); //start
        let latLng2 = L.latLng(-6.180985513496112, 106.58117070762619); // end

        //mark icon rute
        L.Routing.control({
            waypoints: [latLng1,latLng2], // (start , end)
            routeWhileDragging: false,
        }).addTo(mymap);
    }



    //map
    var getLatitude = document.querySelector('#latitude').innerText;
    var getLongitude = document.querySelector('#longitude').innerText;
    
    var mymap = L.map('mapid').setView([-6.169690354051554, 106.63584469367682], 12);
    let latLng1 = L.latLng(-6.180236568616947, 106.58046249324954); //start
    let latLng2 = L.latLng(-6.180985513496112, 106.58117070762619); // end
    let wp1 = new L.Routing.Waypoint(latLng1);
    let wp2 = new L.Routing.Waypoint(latLng2);


    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic3lhcmlmdWx1bWFtIiwiYSI6ImNrbHM0Nmd2cDA0NHoydXF2NHR2bnFrYmkifQ.0Jti4lChLc-FPrt2ATMQMg', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);

    

    //rute lokasi terdekat
    let routeUs = L.Routing.osrmv1();
    routeUs.route([wp1,wp2],(err,routes)=>{
        if(!err)
        {
            let best = 100000000000000;
            let bestRoute = 0;
            for(i in routes)
            {
                if(routes[i].summary.totalDistance < best) {
                    bestRoute = i;
                    best = routes[i].summary.totalDistance;
                }
            }
            console.log('best route',routes[bestRoute]);
            L.Routing.line(routes[bestRoute],{}).addTo(map);
        
        }
    })






</script>