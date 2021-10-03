<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <a href="/customer/create" class="btn btn-success py-2"> Tambah Customer</a>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Customer</li>
                </ol>
            </nav>
        </div>
        <?php if(session()->getFlashdata('pesan')): ?>
        <div>
            <p class="text-success">
                <?= session()->getFlashdata('pesan'); ?>
            </p>
        </div>     
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Customer</h4>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Nama </th>
                                        <th> Alamat </th>
                                        <th> No Telepon </th>
                                        <th> Tanggal Registrasi </th>
                                        <th> Detail </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($customer as $c) : ?>
                                    <tr>
                                        <td> <?= $i++; ?> </td>
                                        <td> <?= $c['nama']; ?> </td>
                                        <td><?= $c['alamat']; ?></td>
                                        <td> <?= $c['telepon']; ?> </td>
                                        <td> <?= $c['registrasi']; ?> </td>
                                        <td> <button type="submit"
                                                onclick="location.href='/customer/<?= $c['slug']; ?>'"
                                                class="btn btn-primary mr-2">Detail</button> </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- content-wrapper ends -->
    <?= $this->endSection(); ?>