<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pengaturan pesawat</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="redirect.php?module=home">Dashboard</a></li>
                            <li class="breadcrumb-item active">pesawat</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-body">
                              <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title">Form pesawat</h4>
                                    <p class="card-description">
                                      Input pesawat Baru
                                    </p>
                                    <?php
                                      $aksi = 'module/pesawat/pesawat_action.php';
                                        use GuzzleHttp\Client;

                                        try {
                                            $client = new Client([
                                                'base_uri' => 'http://127.0.0.1:5000',
                                                'timeout' => 5
                                            ]);
            
                                            $response =  $client->request('GET', '/api/list'); //Untuk data  
                                            $body = $response->getBody();
                                            $data_body = json_decode($body, true);
                                        } catch (RuntimeException $e) {
                                            echo $e->getMessage();
                                        }

                                        echo '<div class="card-header">
                                                  <i class="fas fa-table me-1"></i>
                                                  List pesawat
                                              </div>
                                              <section class="inner-page">
                                                <div class="container">
                                                  <table class="table">';

                                                  echo '<thead>
                                                  <tr>
                                                    <th scope="col">ID pesawat</th>  
                                                    <th scope="col">Nama Pesawat</th>
                                                    <th scope="col"> kelas</th>
                                                    <th scope="col">Aksi</th>
                                                  </tr>
                                                </thead>';
                      
                                                foreach ($data_body['data'] as $row) {
                                                  echo "<tbody>
                                                        <tr>
                                                          <td>$row[id]</td>
                                                          <td>$row[nama_pesawat]</td>
                                                          <td>$row[kelas]</td>
                                                          <td>
                                                            <a href='$aksi?module=pesawat&act=hapus&id=$row[id]' class='btn btn-danger'>Hapus</a>
                                                          </td>
                                                        </tr>
                                                        </tbody>";
                                                }
                                                echo      '</table>
                                                        </div>
                                                      </section>';

                                        echo "<form class='forms-sample' action='$aksi?module=pesawat&act=insert' method='POST'>
                                            <div class='form-group'>
                                            <label for='value'>nama_pesawat</label>
                                            <input type='text' class='form-control' name='nama_pesawat' placeholder='nama_pesawat  '>
                                            <label for='value'> kelas</label>
                                            <input type='text' class='form-control' name=' kelas' placeholder=' kelas  '>
                                            </div>
                                            <button type='submit' class='btn btn-primary mr-2'>Insert</button>
                                            </form>";


                                            echo "<br><br>";



                                        echo "<form class='forms-sample' action='$aksi?module=pesawat&act=update' method='POST'>
                                            <div class='form-group'>";
                                          echo "<label for='id'>ID Pesawat</label>
                                          <select name='id' class='form-select'>";
                                            foreach ($data_body['data'] as $row) {
                                              echo "<option value='$row[id]'>ID : '$row[id]', nama_pesawat : '$row[nama_pesawat]'</option>";
                                            }
                                            echo "</select>
                                            <label for='value'>Nama Pesawat</label>
                                            <input type='text' class='form-control' name='nama_pesawat' placeholder='Nama Pesawat'>
                                            <label for='value'> kelas</label>
                                            <input type='text' class='form-control' name='kelas' placeholder='Kelas'>
                                            </div>
                                            <button type='submit' class='btn btn-primary mr-2'>Update</button>
                                            </form>";
                                    ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </main>