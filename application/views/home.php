<div id="mapid" style="height: 530px;"></div>

<script>
  //map
  var mymap = L.map('mapid').setView([-6.169690354051554, 106.63584469367682], 12);

  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
  }).addTo(mymap);

  //mark
  var iconRumahSakit = L.icon({
    iconUrl: "<?= base_url('upload/icon/icon.png') ?>",
    iconSize:     [25, 35]
  });
  <?php foreach ($rumahsakit as $rs){ ?>
    L.marker([<?= $rs->latitude ?>, <?= $rs->longitude ?>],{icon: iconRumahSakit}).addTo(mymap)
    .bindPopup(
      "<img src='<?= base_url('upload/'. $rs->thumbnail) ?>' class='mb-2 img-fluid'" +
      "</br><b><?= $rs->nama_rumah_sakit ?></b>" + 
      "</br><?= $rs->alamat ?>" + 
      "</br><?= $rs->nomor_telepon ?>" +
      "</br><a href='<?= base_url('rumahsakit/detail') ?>'><button class='btn btn-primary btn-block mt-2'>detail</button></a>" 
    );
  <?php } ?>
  
  //GeoJSON
  L.geoJSON(tangerang).addTo(mymap);
  
</script>