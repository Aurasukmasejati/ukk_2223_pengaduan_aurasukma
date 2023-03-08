<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-image: url('../assets/img/bg-image.png')">
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                𝐃𝐀𝐓𝐀 𝐓𝐀𝐍𝐆𝐆𝐀𝐏𝐀𝐍
                </div>
                <div class="card-body">
                    <a href="export_tanggapan.php" class="btn btn-success" target="_blank">Export Exel</a>       
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>TANGGAL</th>
                                <th>NIK</th>
                                <th>JUDUL</th>
                                <th>TANGGAPAN</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../config/koneksi.php';
                            $no = 1;
                            $echo_query = mysqli_query($koneksi,"SELECT a.*,b.* FROM tanggapan a INNER JOIN pengaduan b ON a.id_pengaduan=b.id_pengaduan");
                            while ($data = mysqli_fetch_array($echo_query)) { ?>

                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['tgl_tanggapan'] ?></td>
                                <td><?php echo $data['nik'] ?></td>
                                <td><?php echo $data['judul_laporan'] ?></td>
                                <td><?php echo $data['tanggapan'] ?></td>
                                <td>
                                    <?php
                                        if ($data['status']== 'proses') {
                                            echo "<span class='badge bg-warning'>Proses</span>";
                                        } elseif ($data['status'] == 'selesai') {
                                            echo "<span class='badge bg-success'>Selesai</span>";
                                        } else {
                                            echo "<span class='badge bg-danger'>Menunggu</span>";
                                        }
                                    
                                        ?>

                                </td>
                                <td>
                                <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_tanggapan'] ?>">HAPUS</a>
                                    <!-- Modal hapus -->
                                    <div class="modal fade" id="hapus<?php echo $data['id_tanggapan']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data<?php echo $data['judul_laporan'] ?></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="edit_data.php" method="POST">
                                                        <input type="hidden" name="id_tanggapan" class="form-control"
                                                            value="<?php echo $data['id_tanggapan'] ?>">
                                                        <p>Apakah yakin akan menghapus tanggapan <br><?php echo $data['judul_laporan'] ?>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="submit" name="hapus_tanggapan" class="btn btn-danger">Hapus</button>
                                                </div>
                                                </form>
                            
                                        
                                            </div>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>