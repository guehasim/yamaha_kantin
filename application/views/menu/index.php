<!-- start modal makanan -->

<div class="modal fade" id="modalMakan" tabindex="-1" role="dialog" aria-labelledby="modalMakanLabel" aria-hidden="true">
    <form class="form-horizontal" action="<?= site_url('menu/create') ?>" method="POST">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMakan">Form Daftar Makanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Makanan</label>
                                <div class="col-lg-8">
                                    <input class="form-control" autocomplete="off" type="text" placeholder="Type Here" name="nama" required>
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

<div class="modal fade" id="modalUbahMakan" tabindex="-1" role="dialog" aria-labelledby="modalUbahMakanLabel" aria-hidden="true">
    <form class="form-horizontal" action="<?= site_url('menu/update') ?>" method="POST">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="id" value="" />

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahMakan">Form Daftar Makanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Makanan</label>
                                <div class="col-lg-8">
                                    <input class="form-control" autocomplete="off" type="text" placeholder="Type Here" name="nama" required>
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

<!-- end modal makanan -->

<!-- start modal minuman -->
<div class="modal fade" id="modalMinum" tabindex="-1" role="dialog" aria-labelledby="modalMinumLabel" aria-hidden="true">
    <form class="form-horizontal" action="<?= site_url('minum/create') ?>" method="POST">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMinum">Form Daftar Minuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Minuman</label>
                                <div class="col-lg-8">
                                    <input class="form-control" autocomplete="off" type="text" placeholder="Type Here" name="nama" required>
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

<div class="modal fade" id="modalUbahMinum" tabindex="-1" role="dialog" aria-labelledby="modalUbahMinumLabel" aria-hidden="true">
    <form class="form-horizontal" action="<?= site_url('minum/update') ?>" method="POST">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="id" value="" />

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahMinum">Form Daftar Minuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Minuman</label>
                                <div class="col-lg-8">
                                    <input class="form-control" autocomplete="off" type="text" placeholder="Type Here" name="nama" required>
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

<!-- end modal minuman -->

<div class="col-6">
    <div class="box">
        <div class="box-header with-border ribbon-box">
            <div class="ribbon ribbon-danger">Makanan</div>
            <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMakan">
                    <i class="fa fa-plus-circle"></i> Tambah Data
                </button>
            </div>
        </div>
        <div class="box-body">
            <table id="tableMakan" class="table display table-bordered responsive nowrap" data-content="menu/ajax_makan">
                <thead>
                    <tr class="bg-info">
                        <th class="text-center" data-titletb="nama">Makanan</th>
                        <th class="text-center" data-titletb="action" width="5%">Detail</th>
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
            <div class="ribbon ribbon-danger">Minuman</div>
            <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMinum">
                    <i class="fa fa-plus-circle"></i> Tambah Data
                </button>
            </div>
        </div>
        <div class="box-body">
            <table id="tableMinum" class="table display table-bordered responsive nowrap" data-content="minum/ajax_minum">
                <thead>
                    <tr class="bg-info">
                        <th class="text-center" data-titletb="nama">Minuman</th>
                        <th class="text-center" data-titletb="action" width="5%">Detail</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>