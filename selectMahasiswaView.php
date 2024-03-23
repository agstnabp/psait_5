<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .wrapper{
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            background-color: #fff;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        .add-button {
            margin-bottom: 20px;
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            border-top: none !important;
            border-bottom: 1px solid #dee2e6 !important;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="float-left">Library Visitors Data</h2>
                            <a href="insertMahasiswaView.php" class="btn btn-light float-right add-button"><i class="fa fa-plus"></i> Add New</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $curl = curl_init();
                                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($curl, CURLOPT_URL, 'http://10.33.35.64/sait_project_api/mahasiswa_api.php');
                                        $res = curl_exec($curl);
                                        $json = json_decode($res, true);

                                        for ($i = 0; $i < count($json["data"]); $i++){
                                            echo "<tr>";
                                            echo "<td>{$json["data"][$i]["id_mhs"]}</td>";
                                            echo "<td>{$json["data"][$i]["nama"]}</td>";
                                            echo "<td>{$json["data"][$i]["alamat"]}</td>";
                                            echo "<td>";
                                            echo '<a href="updateMahasiswaView.php?id_mhs='. $json["data"][$i]["id_mhs"] .'" class="mr-2" title="Update Record"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="deleteMahasiswaDo.php?id_mhs='. $json["data"][$i]["id_mhs"] .'" title="Delete Record"><span class="fa fa-trash"></span></a>';
                                            echo "</td>";
                                            echo "</tr>";
                                        }

                                        curl_close($curl);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
