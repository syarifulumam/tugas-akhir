<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
    <div class="row">
        <div class="col">
        <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title mt-2">Data Rumah Sakit</h3>
            <div class="float-right">
                <a href="<?= base_url('rumahsakit/tambah_rumah_sakit') ?>" class="btn btn-primary">Tambah</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <!-- type class table : table-hover ,  table-striped -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Rumah Sakit</th>
                        <th>Alamat</th>
                        <th>nomor telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php $no = 1; foreach ($rumahsakit as $rs):?>
                    <tr>
                        <td><?= $no ?></td> 
                        <td><?= $rs->nama_rumah_sakit ?></td>
                        <td><?= $rs->alamat ?></td>
                        <td><?= $rs->nomor_telepon ?></td>
                        <td width="60px">
                            <div class="btn-group">
                                <a href="<?= base_url('rumahsakit/edit_rumah_sakit/'.$rs->id_rumah_sakit) ?>" class="btn btn-sm btn-warning btn-flat">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger btn-flat" data-toggle="modal"
                                    data-target="#modal-danger<?= $rs->id_rumah_sakit ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- modal -->
                    <div class="modal fade" id="modal-danger<?= $rs->id_rumah_sakit ?>">
                        <div class="modal-dialog">
                            <div class="modal-content bg-danger">
                                <div class="modal-header">
                                    <h4 class="modal-title">Hapus Data</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apa anda yakin ingin menghapus data ini?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                    <a href="<?= base_url('rumahsakit/delete_rumah_sakit/'.$rs->id_rumah_sakit) ?>"
                                        class="btn btn-outline-light">Delete</a>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <?php $no++; endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
</div>