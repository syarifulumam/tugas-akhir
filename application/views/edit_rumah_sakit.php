<div class="row">
    <div class="col">
        <!-- general form elements -->
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Lokasi</h3>
              </div>
                <div class="card-body">
                  <div id="mapid" style="height: 400px;"></div>
                </div>
            </div>
            <!-- /.card -->
    </div>
    <div class="col">
      <!-- general form elements -->
      <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Rumah Sakit</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?= form_open_multipart('','',array('id'=>$rumahsakit->id_rumah_sakit,'foto'=> $rumahsakit->thumbnail)) ?>
              <div class="card-body">
                <div class="form-group">
                  <label for="">Nama Rumah sakit</label>
                  <input type="text" name="nama_rumah_sakit" class="form-control" id="" value="<?= $rumahsakit->nama_rumah_sakit ?>" placeholder="">
                  <?= form_error('nama_rumah_sakit','<small class="text-danger pl-1">','</small>') ?>
                </div>
                <div class="form-group">
                  <label for="">Nomor Telepon</label>
                  <input type="text" name="nomor_telepon" class="form-control" id="" value="<?= $rumahsakit->nomor_telepon ?>" placeholder="">
                  <?= form_error('nomor_telepon','<small class="text-danger pl-1">','</small>') ?>
                </div>
                <div class="form-group">
                  <label for="">Alamat</label>
                  <textarea class="form-control" name="alamat" rows="3" placeholder=""><?= $rumahsakit->alamat ?></textarea>
                  <?= form_error('alamat','<small class="text-danger pl-1">','</small>') ?>
                </div>
                <div class="form-group">
                  <label for="">Latitude</label>
                  <input type="text" name="latitude" class="form-control" id="Latitude" value="<?= $rumahsakit->latitude ?>" placeholder="" readonly>
                  <?= form_error('latitude','<small class="text-danger pl-1">','</small>') ?>
                </div>
                <div class="form-group">
                  <label for="">Longitude</label>
                  <input type="text" name="longitude" class="form-control" id="Longitude" value="<?= $rumahsakit->longitude ?>" placeholder="" readonly>
                  <?= form_error('longitude','<small class="text-danger pl-1">','</small>') ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Foto</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
    </div>
</div>


<script>
var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
	curLocation =[<?= $rumahsakit->latitude ?>, <?= $rumahsakit->longitude ?>];	
}

var mymap = L.map('mapid').setView([<?= $rumahsakit->latitude ?>, <?= $rumahsakit->longitude ?>], 11);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
			id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1
}).addTo(mymap);

mymap.attributionControl.setPrefix(false);
var marker = new L.marker(curLocation, {
	draggable:'true'
});

//marker drag
marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position,{
	draggable : 'true'
	}).bindPopup(position).update();
	$("#Latitude").val(position.lat);
	$("#Longitude").val(position.lng).keyup();
});

$("#Latitude, #Longitude").change(function(){
	var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
	marker.setLatLng(position, {
	draggable : 'true' 
	}).bindPopup(position).update();
	mymap.panTo(position);
});
mymap.addLayer(marker);

//marker klik
mymap.on("click", function(e) {
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;
    if (!marker) {
      marker = L.marker(e.latlng).addTo(mymap);
    } else {
      marker.setLatLng(e.latlng);
    }

    $("#Latitude").val(lat);
	  $("#Longitude").val(lng);
});

</script>