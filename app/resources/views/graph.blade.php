<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Nilai</title>
    <style>
        .container {
            max-width: 720px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
            display: block;
        }
        .grafik-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-end; /* Aligned to the bottom */
            height: 300px; /* Set the height of the container */
        }
        .grafik-bar {
            width: 40px; /* Width of each bar */
            margin: 0 10px; /* Spacing between bars */
            background-color: #007BFF; /* Bar color */
            border-radius: 5px 5px 0 0; /* Rounded top corners */
            transition: height 1s; /* Animation for height change */
        }
        .nilai-label {
            font-weight: bold;
            margin-top: 5px; /* Space between bar and label */
            text-align: center;
        }

        .grafik-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .list-mahasiswa {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
    <div style="text-align:center">
            <a href="/" style="text-align:center;text-decoration:none;color: black;">Home</a>
        </div>
        <div class="grafik-container">
            @foreach (['A', 'B', 'C', 'D', 'E'] as $g)
                <div class="grafik-bar" style="height: {{($hasil->$g/$length)*100}}%;"></div> 
            @endforeach<!-- Change height according to value -->
        </div>
        <div class="grafik-label">
            <div class="nilai-label">A</div>
            <div class="nilai-label">B</div>
            <div class="nilai-label">C</div>
            <div class="nilai-label">D</div>
            <div class="nilai-label">E</div>
        </div>
        <table>
                <th>Nama</th>
                <th>Nilai Quiz</th>
                <th>Nilai Tugas</th>
                <th>Nilai Absensi</th>
                <th>Nilai Praktek</th>
                <th>Nilai Uas</th>
                <th>Grade</th>
            <tbody>
                @foreach ($students as $s) 
                <tr>
                    <td>{{$s->name}}</td>
                    <td>{{$s->nilai_quiz}}</td>
                    <td>{{$s->nilai_tugas}}</td>
                    <td>{{$s->nilai_absensi}}</td>
                    <td>{{$s->nilai_praktek}}</td>
                    <td>{{$s->nilai_uas}}</td>
                    <td>{{$s->grade}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body> 
</html>
