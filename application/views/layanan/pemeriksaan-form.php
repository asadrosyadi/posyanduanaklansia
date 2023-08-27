<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Pemeriksaan Lansia</h3>
        </div>
    </div>
    <div class="flash-datap" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
    <?php if ($this->session->flashdata('msg')) : ?>

    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <br />
                    <form id="pemeriksaan-form" name="pemeriksaan-form" class="form-horizontal form-label-left" action="<?php echo base_url('pemeriksaan_lansia/submit'); ?>" method="POST" enctype="multipart/form-data">
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
                            <label class="col-form-label col-md-3 col-sm-3 label-align">NIK</label>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <input type="text" name="nik_lansia" id="nik_lansia" readonly="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">No. KK</label>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <input type="text" name="kk_lansia" id="kk_lansia" readonly="" class="form-control">
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
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <input type="text" name="jenis_kelamin" id="jenis_kelamin" readonly="" class="form-control">
                                </div>
                            </div>
                        </div>



                        

                        <div class="divider-dashed"></div>
                        <h2>Pertumbuhan</h2>
                        <div class="divider-dashed"></div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Sekarang
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input class="date-picker form-control" name="tgl_skrng" id="tgl_skrng" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                <script>
                                    function timeFunctionLong(input) {
                                        setTimeout(function() {
                                            input.type = 'text';
                                        }, 60000);
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="usia">Usia
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type=number step=any id="usia" name="usia" class="form-control">
                            </div>
                            <label class="col-form-label label-align" for="Tahunn">Tahun
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="bb">Berat Badan [BB]
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type=number step=any id="bb" name="bb" class="form-control">
                            </div>
                            <label class="col-form-label label-align" for="bb">kg
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tb">Tinggi Badan [TB]
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type=number step=any id="tb" name="tb" class="form-control">
                            </div>
                            <label class="col-form-label label-align" for="tb">cm
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tb">Tensi
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type=number step=any id="tensi" name="tensi" class="form-control">
                            </div>
                            <label class="col-form-label label-align" for="tensi">mmHg
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tb">Keluhan
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type=text step=any id="keluhan" name="keluhan" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tb">Obat Diberikan
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type=text step=any id="obat_diberikan" name="obat_diberikan" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Saran
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <textarea id="saran" class="form-control" name="saran" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" id="proses" name="proses" class="btn btn-success">Proses</button>
                            </div>
                        </div>
                    </form>

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
                                    <button class="btnSelectLansia btn btn-primary btn-sm"
                                            data-id="<?= $d['id_lansia']; ?>"
                                            data-nama="<?= $d['nama_lansia']; ?>"
                                            data-nik="<?= $d['nik_lansia']; ?>"
                                            data-kk="<?= $d['kk_lansia']; ?>"
                                            data-tempatlhr="<?= $d['tempat_lahir']; ?>"
                                            data-tgllahir="<?= $d['tgl_lahir']; ?>"
                                            data-jk="<?= $d['jenis_kelamin']; ?>"
                                            >Pilih</button>
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
                </div>
            </div>
        </div>
    </div>
</div>