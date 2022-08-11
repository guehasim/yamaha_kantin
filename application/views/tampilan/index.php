<div class="modal fade" id="modalTampilan" tabindex="-1" role="dialog" aria-labelledby="modalTampilanLabel" aria-hidden="true">
    <form class="form-horizontal" action="<?= site_url('tampilan/create') ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTampilan">Form Latar Belakang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Teks</label>
                                <div class="col-lg-8">
                                    <input class="form-control" autocomplete="off" type="text" placeholder="Type Here" name="teks" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Gambar</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="file" name="image" required>
                                    <p>Format Gambar :</br>
                                                1.Format Gambar gif | jpg | png | jpeg</br>
                                                2.Resolusi Gambar maksimal 600X600 Pixel</br>
                                                3.Ukuran Maksimal 2MB</p>
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

<div class="modal fade" id="modalUbahTampilan" tabindex="-1" role="dialog" aria-labelledby="modalUbahTampilanLabel" aria-hidden="true">
    <form class="form-horizontal" action="<?= site_url('Tampilan/update') ?>" method="POST">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="id" value="" />

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahTampilan">Form Latar Belakang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Teks</label>
                                <div class="col-lg-8">
                                    <input class="form-control" autocomplete="off" type="text" placeholder="Type Here" name="teks" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-5">
                                <label class="col-form-label col-md-4 m-0">Gambar</label>
                                <div class="col-lg-8">
                                    <input class="form-control" autocomplete="off" type="file" placeholder="Type Here" name="image" required>
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
            <div class="ribbon ribbon-danger">Master Latar Belakang</div>
            <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTampilan">
                    <i class="fa fa-plus-circle"></i> Tambah Data
                </button>
            </div>
        </div>
        <div class="box-body">
            <table id="tableTampilan" class="table display table-bordered responsive nowrap" data-content="tampilan/ajax_tampilan">
                <thead>
                    <tr class="bg-info">
                        <th class="text-center" data-titletb="identitas">No.</th>
                        <th class="text-center" data-titletb="teks">Teks</th>
                        <th class="text-center" data-titletb="gambar">Gambar</th>
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