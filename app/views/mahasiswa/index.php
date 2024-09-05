<div class="container mt-3">
    <div class="row">
        <div class="col-6">

            <h3>Daftar Mahasiswa</h3>

            <div class="row">
                <div class="col-lg-12">
                    <!-- langsung panggil class Flasher, dan karena static pakai :: , lalu panggil functionnya  -->
                    <?php Flasher::flash() ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <!-- Button trigger modal -->
                    <button type="button" data-name="Tambah" class="btn btn-primary tampilModal" data-toggle="modal" data-target="#formModal">
                        Tambah Mahasiswa
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post" class="form-inline my-2 my-lg-0">
                        <div class="input-group">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search.."
                                name="search" id="search" aria-label="Search" autocomplete="off">
                            <button class="btn btn-primary my-2 my-sm-0" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table table-hover table-dark">
                <tbody>
                    <?php foreach ($data['mhs'] as $key => $value) : ?>
                        <tr>
                            <td>
                                <?= $key + 1 ?>. <?= $value['nim']; ?> - <?= $value['nama']; ?>
                                <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $value['id']; ?>"
                                    class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin?');">Hapus</a>
                                <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $value['id']; ?>"
                                    class="badge badge-warning float-right ml-1 tampilModal"
                                    data-toggle="modal" data-name="Ubah" data-target="#formModal"
                                    data-id="<?= $value['id']; ?>">Ubah</a>
                                <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $value['id']; ?>"
                                    class="badge badge-primary float-right">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/mahasiswa/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="number" class="form-control" name="nim" id="nim">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                            <option>Pilih..</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Pendidikan IPS">Pendidikan IPS</option>
                            <option value="Teknik Nuklir">Teknik Nuklir</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>