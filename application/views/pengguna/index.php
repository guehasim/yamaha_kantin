<div class="modal fade" id="modalPengguna" tabindex="-1" role="dialog" aria-labelledby="modalPenggunaLabel" aria-hidden="true">
    <form class="form-horizontal" action="<?= site_url('pengguna/create') ?>" method="POST">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPengguna">Form Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Name</label>
                                <div class="col-lg-8">
                                    <input class="form-control" autocomplete="off" type="text" placeholder="Type Here" name="nama" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Username</label>
                                <div class="col-lg-8">
                                    <input class="form-control" autocomplete="off" type="text" placeholder="Type Here" name="user" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Password</label>
                                <div class="col-lg-8">
                                    <input class="form-control" autocomplete="off" type="password" placeholder="Type Here" name="pass" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Status</label>
                                <div class="col-lg-8">
                                    <select name="status" id="" class="form-control">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
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

<div class="modal fade" id="modalUbahPengguna" tabindex="-1" role="dialog" aria-labelledby="modalUbahPenggunaLabel" aria-hidden="true">
    <form class="form-horizontal" action="<?= site_url('pengguna/update') ?>" method="POST">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="id" value="" />

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahPengguna">Form Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Name</label>
                                <div class="col-lg-8">
                                    <input class="form-control" autocomplete="off" type="text" placeholder="Type Here" name="nama" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Username</label>
                                <div class="col-lg-8">
                                    <input class="form-control" autocomplete="off" type="text" placeholder="Type Here" name="user" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Password</label>
                                <div class="col-lg-8">
                                    <input class="form-control" autocomplete="off" type="password" placeholder="Type Here" name="pass" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Status</label>
                                <div class="col-lg-8">
                                    <select name="status" id="" class="form-control">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
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

<div class="col-12">
    <div class="box">
        <div class="box-header with-border ribbon-box">
            <div class="ribbon ribbon-danger">Master Pengguna</div>
            <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPengguna">
                    <i class="fa fa-plus-circle"></i> Tambah Data
                </button>
            </div>
        </div>
        <div class="box-body">
            <table id="tablepengguna" class="table display table-bordered responsive nowrap" data-content="pengguna/ajax_pengguna">
                <thead>
                    <tr class="bg-info">
                        <th class="text-center" data-titletb="nama">Nama</th>
                        <th class="text-center" data-titletb="username">Username</th>
                        <th class="text-center" data-titletb="status">Status</th>
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