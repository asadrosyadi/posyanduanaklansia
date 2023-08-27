<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Tanggal Periksa</th>
            <th>Usia</th>
            <th>Berat Badan</th>
            <th>Tinggi Badan</th>
            <th>Tensi</th>
            <th>Keluhan</th>
            <th>Obat Diberikan</th>
            <th>Saran</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($laporan as $d) { ?>
            <tr>
                <td><?php echo date_format(date_create($d->tgl_skrng), "j F Y"); ?></td>
                <td><?php echo $d->usia; ?> bulan</td>
                <td><?php echo $d->bb; ?> kg</td>
                <td><?php echo $d->tb; ?> cm</td>
                <td><?php echo $d->tensi; ?>mmHg</td>
                <td><?php echo $d->keluhan; ?></td>
                <td><?php echo $d->obat_diberikan; ?></td>
                <td><?php echo $d->saran; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>