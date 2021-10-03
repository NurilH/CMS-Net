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
                        <h4 class="card-title">Detail costomer</h4>

                        <p class="card-description"> Personal info </p>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img src="/img/<?= $customer['ktp'];?>" alt="Admin"
                                                class=" viewktp" width="250">
                                            <div class="mt-3">
                                        

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

                            </div>

                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <form action="/customer/update/<?= $customer['id']; ?>" method="post" enctype="multipart/form-data"
                                            class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="slug" value="<?= $customer['slug']; ?>">
                                            <input type="hidden" name="ktplama" value="<?= $customer['ktp']; ?>">

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mt-2">Nama</h6>

                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    <input type="text"
                                                        class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid': '' ; ?>"
                                                        name="nama" value="<?= $customer['nama']; ?>">
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
                                                    <textarea rows="3" type="text"
                                                        class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid': '' ; ?>"
                                                        name="alamat"
                                                        value="<?= $customer['alamat']; ?>"><?= $customer['alamat']; ?></textarea>
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
                                                    <input type="text"
                                                        class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid': '' ; ?>"
                                                        name="telepon" value="<?= $customer['telepon']; ?>">
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
                                                    <input type="text"
                                                        class="form-control <?= ($validation->hasError('registrasi')) ? 'is-invalid': '' ; ?>"
                                                        name="registrasi" value="<?= $customer['registrasi']; ?>">
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
                                                    <input type="text"
                                                        class="form-control <?= ($validation->hasError('paket')) ? 'is-invalid': '' ; ?>"
                                                        name="paket" value="<?= $customer['paket']; ?>">
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
                                                        <label class="custom-file-label" for="ktp"><?= $customer['ktp'];?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <button class="btn btn-info" type="submit">Ubah</button>
                                        </form>

                                        <form action="/customer/delete/<?= $customer['id']; ?>" method="post"
                                            class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Apakah anda yakin?');">Hapus</button>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <?= $this->endSection(); ?>