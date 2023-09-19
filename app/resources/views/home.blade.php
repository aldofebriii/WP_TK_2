<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Penginputan Nilai Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin-top: 1rem;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        h2 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 10px;
        }
        input {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 3px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Formulir Penginputan Nilai Quiz</h2>
        <div style="text-align:center">
            <a href="/graph" style="text-align:center;text-decoration:none;color: black;">Grafik Nilai</a>
        </div>
        <form id="nilaiForm">
            <label for="namaMahasiswa">Nama Mahasiswa:</label>
            <input type="text" id="namaMahasiswa" name="namaMahasiswa" required>
            <label for="nilaiQuiz">Nilai Quiz:</label>
            <input type="number" id="nilaiQuiz" name="nilaiQuiz" min="0" max="100" required>
            <label for="nilaiTugas">Nilai Tugas:</label>
            <input type="number" id="nilaiTugas" name="nilaiTugas" min="0" max="100" required>
            <label for="nilaiAbsensi">Nilai Absensi:</label>
            <input type="number" id="nilaiAbsensi" name="nilaiAbsensi" min="0" max="100" required>
            <label for="nilaiPraktek">Nilai Praktek:</label>
            <input type="number" id="nilaiPraktek" name="nilaiPraktek" min="0" max="100" required>
            <label for="nilaiUAS">Nilai UAS:</label>
            <input type="number" id="nilaiUas" name="nilaiUas" min="0" max="100" required>
            <button type="submit">Submit</button>
        </form>
    </div>
    
    <script>
        // Fungsi untuk menangani pengiriman formulir
        document.getElementById("nilaiForm").addEventListener("submit", async function (e) {
            e.preventDefault(); // Menghentikan pengiriman formulir
            // Mengambil nilai dari input
            const namaMahasiswa = document.getElementById("namaMahasiswa").value;
            const nilaiQuiz = document.getElementById("nilaiQuiz").value;
            const nilaiTugas = document.getElementById("nilaiTugas").value;
            const nilaiAbsensi = document.getElementById("nilaiAbsensi").value;
            const nilaiPraktek = document.getElementById("nilaiPraktek").value;
            const nilaiUas = document.getElementById("nilaiUas").value
            
            if(!namaMahasiswa || !nilaiQuiz || !nilaiTugas || !nilaiAbsensi || !nilaiPraktek || !nilaiUas) {
                return alert('Isi semua fomurlirnya!')
            };

            const res = await fetch('/api/add-student', {
                method: 'POST',
                headers: {
                    'x-requested-with': 'XMLHttpRequest',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    name: namaMahasiswa,
                    nilai_quiz: parseInt(nilaiQuiz),
                    nilai_tugas: parseInt(nilaiTugas),
                    nilai_absensi: parseInt(nilaiAbsensi),
                    nilai_praktek: parseInt(nilaiPraktek),
                    nilai_uas : parseInt(nilaiUas)
                })
            });

            if(res.status === 201 && res.ok) {
                alert("Data berhasil disimpan:\n" + "\nNama Mahasiswa: " + namaMahasiswa);
                document.getElementById("nilaiForm").reset(); // Membersihkan formulir
            };
        });
    </script>
</body>
</html>
