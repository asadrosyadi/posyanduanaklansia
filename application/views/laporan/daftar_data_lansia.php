<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Laporan Lansia</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_content">
                    <br />
                    <?php echo form_open('laporan_lansia/cetak_laporan', array('id' => 'laporanlansia')); ?>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Nama Lansia
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <div class="input-group">
                                <input type="hidden" name="id_lansia" id="id_lansia" class="form-control" readonly>
                                <input type="text" name="nama_lansia" id="nama_lansia" class="form-control" readonly>
                                <span class="input-group-btn">
                                    <button id="pilihData" name="pilihData" type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#DataLansiaModal">Pilih</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nik_lansia">NIK
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <div class="input-group">
                                <input type="text" name="nik_lansia" id="nik_lansia" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kk_lansia">No. KK
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <div class="input-group">
                                <input type="text" name="kk_lansia" id="kk_lansia" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <div class="input-group">
                                <input class="date-picker form-control" name="tgl_lahir" id="tgl_lahir" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" readonly>
                                <script>
                                    function timeFunctionLong(input) {
                                        setTimeout(function() {
                                            input.type = 'text';
                                        }, 60000);
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="jenis_kelamin">Jenis Kelamin
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <div class="input-group">
                                <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" readonly>
                            </div>
                        </div>
                    </div>


                    <div class="divider-dashed"></div>
                    <div class="form-group row">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="button" id="proseslaporanlansia" name="proseslaporanlansia" class="btn btn-info">Proses</button>
                            <button type="submit" id="printlaporan" name="printlaporan" class="btn btn-success">Print</button>
                        </div>
                    </div>
                    <div class="divider-dashed"></div>

                    <!-- Modal Data Lansia -->
                    <div class="modal fade bs-example-modal-lg" id="DataLansiaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Daftar Data Lansia</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nama Lansia</th>
                                                <th>NIK</th>
                                                <th>No. KK</th>
                                                <th>Tempat/Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($d_lansia as $d) : ?>
                                                <tr>
                                                    <td><?= $d['nama_lansia']; ?></td>
                                                    <td><?= $d['nik_lansia']; ?></td>
                                                    <td><?= $d['kk_lansia']; ?></td>
                                                    <td><?= $d['tempat_lahir'] . ', ' . $d['tgl_lahir']; ?></td>
                                                    <td><?= $d['jenis_kelamin']; ?></td>
                                                    <td>
                                                        <button id="pilihLansia_Laporan" type="button" data-id="<?= $d['id_lansia']; ?>" data-nama="<?= $d['nama_lansia']; ?>" data-nik="<?= $d['nik_lansia']; ?>" data-kk="<?= $d['kk_lansia']; ?>" data-tgllahir="<?= $d['tgl_lahir']; ?>"  data-jk="<?= $d['jenis_kelamin']; ?>" class="btnSelectLansiaLaporan btn btn-primary btn-sm">Pilih</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php echo form_close(); ?>
                    <div class="col-sm-12">
                        <div id="rowData"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>