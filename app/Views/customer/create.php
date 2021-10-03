<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/customer">Customer</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah costomer</h4>
                        <form action="/customer/save" method="post" class="form-sample" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <!-- <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                                    alt="Admin" class="rounded-circle" width="150">
                                                <div class="mt-3">
                                                    <h4></h4>

                                                    <button class="btn btn-primary">Upload</button>
                                                </div>

                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    Tagihan Lunas :
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    Agustus 2021
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div> -->

                                <div class="col-md-8">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="nama" class="mt-2">Nama</label>
                                                   
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    <input type="text" class="form-control 
                                                    <?= ($validation->hasError('nama')) ? 'is-invalid': '' ; ?>"
                                                        id="nama" name="nama" autofocus value="<?= old('nama');?>">
                                                    <div class="invalid-feedback">
                                                    <?= $validation->getError('nama'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mt-2">Alamat</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    <input type="text"s class=" form-control <?= ($validation->hasError('alamat')) ? 'is-invalid': '' ; ?>" value="<?= old('alamat');?>" id="alamat" name="alamat">
                                                    <div class="invalid-feedback">
                                                    <?= $validation->getError('alamat'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mt-2">No Tlp</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    <input type="text" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid': '' ; ?>" value="<?= old('telepon');?>"
                                                        id="telepon" name="telepon">
                                                        <div class="invalid-feedback">
                                                    <?= $validation->getError('telepon'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mt-2">Tgl Registrasi</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    <input type="text" class="form-control <?= ($validation->hasError('registrasi')) ? 'is-invalid': '' ; ?>" value="<?= old('registrasi');?>" id="registrasi" name="registrasi" placeholder="yyyy-mm-dd">
                                                    <div class="invalid-feedback">
                                                    <?= $validation->getError('registrasi'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mt-2">Paket internet</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    <input type="text" class="form-control <?= ($validation->hasError('paket')) ? 'is-invalid': '' ; ?>" value="<?= old('paket');?>" id="paket" name="paket">
                                                    <div class="invalid-feedback">
                                                    <?= $validation->getError('paket'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mt-2">Ktp</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                     <div class="custom-file">
                                                        <input type="file" class="custom-file-input <?= ($validation->hasError('ktp')) ? 'is-invalid': '' ; ?>"  id="ktp" name="ktp" onchange="previewktp()">
                                                        <div class="invalid-feedback">
                                                        <?= $validation->getError('ktp'); ?>
                                                        </div>
                                                        <label class="custom-file-label" for="ktp">Pilih gambar</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-info " type="submit" >Tambah Data</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?= $this->endSection(); ?>