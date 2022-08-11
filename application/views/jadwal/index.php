<!-- start jadwal tampilan -->
<div class="modal fade" id="modalJadwalTampil" tabindex="-1" role="dialog" aria-labelledby="modalJadwalTampilLabel" aria-hidden="true">
    <form class="form-horizontal" action="<?= site_url('jadwal/create_tampil') ?>" method="POST">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalJadwalTampil">Form Jadwal Tampilan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Tanggal</label>
                                <div class="col-lg-8">
                                    <input class="form-control" id="datepicker" value="<?php echo date('d-m-Y');?>" autocomplete="off" type="text" placeholder="Type Here" name="tanggal" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Pilih Tampilan</label>
                                <div class="col-lg-8">
                                    <select name="tampil" class="form-control">
                                        <option ></option>
                                        <?php foreach ($temp_tampil as $tamp): ?>
                                            <option value="<?php echo $tamp->ID_tampilan;?>"><?php echo "Gambar ".$tamp->ID_tampilan;?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="modalUbahJadwalTampil" tabindex="-1" role="dialog" aria-labelledby="modalUbahJadwalTampilLabel" aria-hidden="true">
    <form class="form-horizontal" action="<?= site_url('jadwal/update_tampil') ?>" method="POST">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="id" value="" />

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahJadwalTampil">Form Jadwal Tampilan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Tanggal</label>
                                <div class="col-lg-8">
                                    <input class="form-control" id="datepicker2" autocomplete="off" type="text" placeholder="Type Here" name="tanggal" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Pilih Tampilan</label>
                                <div class="col-lg-8">
                                    <select name="tampil" class="form-control">

                                    <?php foreach ($temp_tampil as $tamp): ?>                                      

                                        <?php if ($_POST['tampil'] == NULL): ?>
                                            <?php $tamp_selected = ""; ?>
                                        <?php elseif($_POST['tampil'] == $tamp->ID_tampilan): ?>
                                            <?php $tamp_selected = "selected"; ?>
                                        <?php else: ?>
                                            <?php $tamp_selected = ""; ?>
                                        <?php endif ?>
                                        <option value="<?php echo $tamp->ID_tampilan;?>" <?php echo $tamp_selected;?>> <?php echo $tamp_selected; ?> <?php echo "Gambar ".$tamp->ID_tampilan;?></option>                                       
                                    
                                    <?php endforeach ?>    
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- end jadwal tampilan -->


<!-- start jadwal makan -->

<div class="modal fade" id="modalJadwalMakan" tabindex="-1" role="dialog" aria-labelledby="modalJadwalMakanLabel" aria-hidden="true">
    <form class="form-horizontal" action="<?= site_url('jadwal/create') ?>" method="POST">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalJadwalMakan">Form Jadwal Makanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Tanggal</label>
                                <div class="col-lg-8">
                                    <input class="form-control" id="datepicker3" value="<?php echo date('d-m-Y');?>" autocomplete="off" type="text" placeholder="Type Here" name="tanggal" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Pilih Makanan</label>
                                <div class="col-lg-8">
                                    <select name="menu" class="form-control">
                                        <option ></option>
                                        <?php foreach ($temp_makan as $mkn): ?>
                                            <option value="<?php echo $mkn->ID_menu;?>"><?php echo $mkn->nama;?></option>
                                        <?php endforeach ?>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="modalUbahJadwalMakan" tabindex="-1" role="dialog" aria-labelledby="modalUbahJadwalMakanLabel" aria-hidden="true">
    <form class="form-horizontal" action="<?= site_url('jadwal/update') ?>" method="POST">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="id" value="" />

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahJadwalMakan">Form Jadwal Makan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Tanggal</label>
                                <div class="col-lg-8">
                                    <input class="form-control" id="datepicker4" autocomplete="off" type="text" placeholder="Type Here" name="tanggal" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Pilih Makanan</label>
                                <div class="col-lg-8">
                                    <select name="menu" class="form-control">
                                        <option ></option>
                                        <?php foreach ($temp_makan as $mkn): ?>
                                            <option value="<?php echo $mkn->ID_menu;?>"><?php echo $mkn->nama;?></option>
                                        <?php endforeach ?>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- end jadwal makan -->

<!-- start jadwal minum -->
<div class="modal fade" id="modalJadwalMinum" tabindex="-1" role="dialog" aria-labelledby="modalJadwalMinumLabel" aria-hidden="true">
    <form class="form-horizontal" action="<?= site_url('jadwal/create') ?>" method="POST">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalJadwalMinum">Form Jadwal Minuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Tanggal</label>
                                <div class="col-lg-8">
                                    <input class="form-control" id="datepicker5" value="<?php echo date('d-m-Y');?>" autocomplete="off" type="text" placeholder="Type Here" name="tanggal" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Pilih Minuman</label>
                                <div class="col-lg-8">
                                    <select name="menu" class="form-control">
                                        <option ></option>
                                        <?php foreach ($temp_minum as $mnm): ?>
                                            <option value="<?php echo $mnm->ID_menu;?>"><?php echo $mnm->nama;?></option>
                                        <?php endforeach ?>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="modalUbahJadwalMinum" tabindex="-1" role="dialog" aria-labelledby="modalUbahJadwalMinumLabel" aria-hidden="true">
    <form class="form-horizontal" action="<?= site_url('jadwal/update') ?>" method="POST">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="id" value="" />

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahJadwalMinum">Form Jadwal Minuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Jadwal</label>
                                <div class="col-lg-8">
                                    <input class="form-control" id="datepicker6" autocomplete="off" type="text" placeholder="Type Here" name="jadwal" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Pilih Minuman</label>
                                <div class="col-lg-8">
                                    <select name="menu" class="form-control">
                                        <option ></option>
                                        <?php foreach ($temp_minum as $mnm): ?>
                                            <option value="<?php echo $mnm->ID_menu;?>"><?php echo $mnm->nama;?></option>
                                        <?php endforeach ?>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- end jadwal minum -->

<div class="col-4">
    <div class="box">
        <div class="box-header with-border ribbon-box">
            <div class="ribbon ribbon-danger">Jadwal Tampilan</div>
            <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalJadwalTampil">
                    <i class="fa fa-plus-circle"></i> Tambah Data
                </button>
            </div>
        </div>
        <div class="box-body">
            <table id="tablejadwal2" class="table display table-bordered responsive nowrap" data-content="jadwal/ajax_jadwal_tampil">
                <thead>
                    <tr class="bg-info">
                        <th class="text-center" data-titletb="tanggal">Tanggal</th>
                        <th class="text-center" data-titletb="ID_tampilan">Gambar Ke</th>
                        <th class="text-center" data-titletb="action">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>

<div class="col-4">
    <div class="box">
        <div class="box-header with-border ribbon-box">
            <div class="ribbon ribbon-danger">Jadwal Makanan</div>
            <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalJadwalMakan">
                    <i class="fa fa-plus-circle"></i> Tambah Data
                </button>
            </div>
        </div>
        <div class="box-body">
            <table id="tablejadwal3" class="table display table-bordered responsive nowrap" data-content="jadwal/ajax_jadwal_makan">
                <thead>
                    <tr class="bg-info">
                        <th class="text-center" data-titletb="tanggal">Tanggal</th>
                        <th class="text-center" data-titletb="nama">Makanan</th>
                        <th class="text-center" data-titletb="action">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>

<div class="col-4">
    <div class="box">
        <div class="box-header with-border ribbon-box">
            <div class="ribbon ribbon-danger">Jadwal Minuman</div>
            <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalJadwalMinum">
                    <i class="fa fa-plus-circle"></i> Tambah Data
                </button>
            </div>
        </div>
        <div class="box-body">
            <table id="tablejadwal" class="table display table-bordered responsive nowrap" data-content="jadwal/ajax_jadwal_minum">
                <thead>
                    <tr class="bg-info">
                        <th class="text-center" data-titletb="tanggal">Tanggal</th>
                        <th class="text-center" data-titletb="nama">Minuman</th>
                        <th class="text-center" data-titletb="action">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>