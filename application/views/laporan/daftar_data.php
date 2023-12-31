<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Laporan Anak</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_content">
                    <br />
                    <?php echo form_open('laporan_anak/cetak_laporan', array('id' => 'laporananak')); ?>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Nama Anak
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <div class="input-group">
                                <input type="hidden" name="id_anak" id="id_anak" class="form-control" readonly>
                                <input type="text" name="nama_anak" id="nama_anak" class="form-control" readonly>
                                <span class="input-group-btn">
                                    <button id="pilihData" name="pilihData" type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#DataAnakModal">Pilih</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nik_anak">NIK
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <div class="input-group">
                                <input type="text" name="nik_anak" id="nik_anak" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kk_anak">No. KK
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <div class="input-group">
                                <input type="text" name="kk_anak" id="kk_anak" class="form-control" readonly>
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

                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_orang_tua">Nama Orang Tua
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <div class="input-group">
                                <input type="text" name="nama_orang_tua" id="nama_orang_tua" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="divider-dashed"></div>
                    <div class="form-group row">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="button" id="proseslaporan" name="proseslaporan" class="btn btn-info">Proses</button>
                            <button type="submit" id="printlaporan" name="printlaporan" class="btn btn-success">Print</button>
                        </div>
                    </div>
                    <div class="divider-dashed"></div>

                    <!-- Modal Data Anak -->
                    <div class="modal fade bs-example-modal-lg" id="DataAnakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Daftar Data Anak</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nama Anak</th>
                                                <th>NIK</th>
                                                <th>No. KK</th>
                                                <th>Tempat/Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Nama Orang Tua</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($d_anak as $d) : ?>
                                                <tr>
                                                    <td><?= $d['nama_anak']; ?></td>
                                                    <td><?= $d['nik_anak']; ?></td>
                                                    <td><?= $d['kk_anak']; ?></td>
                                                    <td><?= $d['tempat_lahir'] . ', ' . $d['tgl_lahir']; ?></td>
                                                    <td><?= $d['jenis_kelamin']; ?></td>
                                                    <td><?= $d['nama_orang_tua']; ?></td>
                                                    <td>
                                                        <button id="pilihAnak_Laporan" type="button" data-id="<?= $d['id_anak']; ?>" data-nama="<?= $d['nama_anak']; ?>" data-nik="<?= $d['nik_anak']; ?>" data-kk="<?= $d['kk_anak']; ?>" data-tgllahir="<?= $d['tgl_lahir']; ?>"  data-jk="<?= $d['jenis_kelamin']; ?>" data-nmaortu="<?= $d['nama_orang_tua']; ?>" class="btnSelectAnakLaporan btn btn-primary btn-sm">Pilih</button>
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