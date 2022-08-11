<!-- <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalPenggunaLabel" aria-hidden="true" style="z-index: 99999999;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPengguna">Detail Inspeksi Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 400px;overflow: auto">
                <a href="javascript:void(0)" class="btn btn-primary" id="btn-cetak-detail">
                    <i class="fa fa-print mr-2"></i> Cetak PDF
                </a>
                <br />
                <br />
                <table class="table table-sm" id="table-result">
                    <thead>
                        <tr class="bg-black text-white">
                            <th>Area</th>
                            <th>Operator</th>
                            <th>Tgl Inpupt</th>
                            <th>Hasil Inspeksi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->

<div class="col-12">
    <div class="box">
        <div class="box-header with-border ribbon-box">
            <div class="ribbon ribbon-danger">Laporan Daftar Menu</div>
        </div>
        <div class="box-body table-responsive">
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal" action="<?= site_url('laporan') ?>" method="POST">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="row">
                            <div class="col-lg-6 col-xs-12 mb-2">
                                <div class="form-group row mb-5">
                                    <label class="col-form-label col-md-4 m-0">Period Awal</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" autocomplete="off" type="text" placeholder="MM/YYYY" name="tgl" required value="<?=$period_awal?>">
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
                            <div class="col-lg-6 col-xs-12 mb-2">
                                <div class="form-group row mb-5">
                                    <label class="col-form-label col-md-4 m-0">Period Selesai</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" id="period_akhir" autocomplete="off" type="text" placeholder="MM/YYYY" name="period_akhir" required value="<?=$period_akhir?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <div class="d-inline-flex align-items-center btn bg-orange py-0">
                                    <i class="fa fa-print"></i>
                                    <input type="submit" name="submitdata" class="btn bg-orange" value="Print PDF" />
                                </div>

                                <div class="d-inline-flex align-items-center btn btn-success py-0">
                                    <i class="fa fa-print"></i>
                                    <input type="submit" class="btn btn-success" name="submitdata" value="Print Excel">
                                </div>

                                <div class="d-inline-flex align-items-center btn btn-secondary py-0">
                                    <i class="fa fa-arrow-circle-left"></i>
                                    <input type="submit" class="btn btn-secondary btn-reset-form" name="submitdata" value="Reset">
                                </div>

                                <div class="d-inline-flex align-items-center btn btn-primary py-0">
                                    <i class="fa fa-search"></i>
                                    <input type="submit" class="btn btn-primary" name="submitdata" value="Search">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>                      
        </div>
        <!-- /.box-body -->
    </div>
</div>

<div class="col-6">
    <div class="box">
        <div class="box-header with-border ribbon-box">
            <div class="ribbon ribbon-danger">Laporan Makanan</div>
        </div>
        <div class="box-body">
            <table id="tablelaporan" class="table display table-bordered responsive nowrap" data-content="laporan/ajax_laporan_makan/<?=(!empty($period_awal) ? date('Y-m-d', strtotime($period_awal)) : '0')?>/<?=(!empty($period_akhir) ? date('Y-m-d', strtotime($period_akhir)) : '0')?>" data-basecontent="laporan/ajax_laporan_makan/<?=(!empty($period_awal) ? date('Y-m-d', strtotime($period_awal)) : '0')?>/<?=(!empty($period_akhir) ? date('Y-m-d', strtotime($period_akhir)) : '0')?>">
                <thead>
                    <tr class="bg-info">
                        <th class="text-center" data-titletb="tanggal">Tanggal</th>
                        <th class="text-center" data-titletb="nama">Makanan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div> 

<div class="col-6">
    <div class="box">
        <div class="box-header with-border ribbon-box">
            <div class="ribbon ribbon-danger">Laporan Minuman</div>
        </div>
        <div class="box-body">
            <table id="tablelaporan" class="table display table-bordered responsive nowrap" data-content="laporan/ajax_laporan_minum/<?=(!empty($period_awal) ? date('Y-m-d', strtotime($period_awal)) : '0')?>/<?=(!empty($period_akhir) ? date('Y-m-d', strtotime($period_akhir)) : '0')?>" data-basecontent="laporan/ajax_laporan_minum/<?=(!empty($period_awal) ? date('Y-m-d', strtotime($period_awal)) : '0')?>/<?=(!empty($period_akhir) ? date('Y-m-d', strtotime($period_akhir)) : '0')?>">
                <thead>
                    <tr class="bg-info">
                        <th class="text-center" data-titletb="tanggal">Tanggal</th>
                        <th class="text-center" data-titletb="nama">Minuman</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>