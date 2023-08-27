<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Tanggal Periksa</th>
            <th>Usia</th>
            <th>Berat Badan</th>
            <th>Tinggi Badan</th>
            <th>Lingkar Kepala</th>
            <th>Lingkar Lengan</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($laporan as $d) { ?>
            <tr>
                <td><?php echo date_format(date_create($d->tgl_skrng), "j F Y"); ?></td>
                <td><?php echo $d->usia; ?> bulan</td>
                <td><?php echo $d->bb; ?> kg</td>
                <td><?php echo $d->tb; ?> cm</td>
                <td><?php echo $d->lingkar_kepala; ?></td>
                <td><?php echo $d->lingkar_lengan; ?></td>
                <td><?php echo $d->ket; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>