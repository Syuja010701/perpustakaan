<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <style>
        /* CSS untuk pusatkan kotak */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #333; /* Warna latar belakang untuk mode gelap */
            color: #fff; /* Warna teks untuk mode gelap */
        }

        .big-box {
            width: 600px; /* Lebar kotak */
            height: 400px; /* Tinggi kotak */
            background-color: #555; /* Warna latar belakang kotak */
            border-radius: 15px;
            text-align: center;
            padding: 40px; /* Padding untuk konten di dalam kotak */
            display: flex;
            align-items: center;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.5); /* Shadow untuk efek 3D */
        }

        .box-content {
            text-align: left;
            padding-left: 20px;
        }

        .box-content img {
            max-width: 300px; /* Lebar maksimum gambar */
            max-height: 300px; /* Tinggi maksimum gambar */
            border-radius: 8px;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <div class="big-box">
        <div class="box-content">
            <img src="https://via.placeholder.com/500" alt="Placeholder Gambar">
        </div>
        <div class="box-content">
            <h2>The number</h2>
            <h2>SEO Service Company</h2>
            <?php
            // Contoh penggunaan PHP di dalam kotak
            $keterangan = "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.";
            echo "<p>$keterangan</p>";
            ?>
            <?php
            // Contoh penggunaan PHP kedua di dalam kotak
            $keterangan2 = "At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren.";
            echo "<p>$keterangan2</p>";
            ?>
        </div>
    </div>
</body>
</html>
