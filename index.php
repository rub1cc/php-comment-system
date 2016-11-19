<?php
    include "database.php";
    $db = new DB();
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Comment System</title>
        <link rel="stylesheet" href="css/site.css" media="screen" title="no title">

    </head>
    <body>

        <header>
            <div class="container">
                <p>
                    Created by <a href="https://www.instagram.com/frzaulia/" target="_blank">@frzaulia</a> on localhost with<div title="laptop" id="laptop"></div>
                </p>
            </div>
        </header>

        <?php
            if(isset($_POST['kirim'])):
                $nama = $_POST['name'];
                $email = $_POST['email'];
                $website = $_POST['website'];
                $komentar = $_POST['komentar'];
                $tanggal = date('Y-m-d H:i:s');

                $db->kirim($nama,$email,$website,$komentar,$tanggal);
            endif;
         ?>

            <div id="body">
                <div class="container">
                    <div class="left-side">
                        <h1 class="title">Leave a comment</h1>
                        <div class="box">
                            <form class="" action="" method="post">
                                <label for="name">Nama *</label>
                                <br>
                                <input type="text" name="name" placeholder="Nama Anda" required="">
                                <br>
                                <label for="email">Email *</label>
                                <br>
                                <input type="email" name="email" placeholder="contoh@contoh.com" required="">
                                <br>
                                <label for="website">Website</label>
                                <br>
                                <input type="text" name="website" placeholder="www.contoh.com">
                                <br>
                                <label for="komentar">Comment *</label>
                                <br>
                                <textarea class="tinymce" name="komentar" placeholder="Tulis komentar anda" required=""></textarea>
                                <br>
                                <button type="submit" name="kirim" class="btn">Kirim</button>
                                <button type="reset" name="button" class="btn">Batal</button>
                            </form>
                        </div>
                    </div>

                    <div class="right-side">
                        <h1 class="title">Comments</h1>
                        <div class="box-kanan">
                            <?php
                                $fungsi = $db->tampil();
                                while ($data = mysqli_fetch_assoc($fungsi)):

                            ?>
                            <div class="box">
                                <div class="box-komentar">
                                    <div class="detail">
                                        <p>By <a><?php echo $data['nama']; ?></a> on <?php echo date('d M Y', strtotime($data['tanggal'])); ?></p>
                                        <div class="info">
                                            <p>Nama : <?php echo $data['nama']; ?></p>
                                            <p>Email : <?php echo $data['email']; ?></p>
                                            <p>Website : <a target="_blank" href="http://<?php echo $data['website']; ?>"><?php echo $data['website']; ?></a></p>
                                        </div>
                                    </div>
                                        <?php echo $data['komentar']; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>


        <script src="js/jquery.min.js" charset="utf-8"></script>
        <script src="plugins/tinymce/jquery.tinymce.min.js" charset="utf-8"></script>
        <script src="plugins/tinymce/tinymce.min.js" charset="utf-8"></script>
        <script src="js/init.js" charset="utf-8"></script>

    </body>
</html>
