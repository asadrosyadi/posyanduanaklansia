<!-- page content -->
<div class="right_col" role="main">
    <div class="row top_tiles">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-child"></i></div>
                <div class="count"><?= $count_anak; ?></div>
                <h3>Data Anak</h3>
                <p></p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-wheelchair"></i></div>
                <div class="count"><?= $count_lansia; ?></div>
                <h3>Data Lansia</h3>
                <p></p>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Dashboard </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                        <h3>Selamat datang, <?= $user['name']; ?></h3>
                        <p>Aplikasi Posyandu Anak dan Lansia</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>