                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                          <?php
                            //require __DIR__ . '\..\vendor\autoload.php';

                            use GuzzleHttp\Client;

                            try {
                                $client = new Client([
                                    'base_uri' => 'http://127.0.0.1:5000',
                                    'timeout' => 5
                                ]);

                                $client2 = new Client([
                                  'base_uri' => 'http://127.0.0.1:6000',
                                  'timeout' => 5
                                ]);

                                $response =  $client->request('GET', '/api/list'); //Untuk data pesawat
                                $body = $response->getBody();
                                $data_body = json_decode($body, true);

                                $response2 =  $client->request('GET', '/api/pesawat'); //Untuk data reservasi
                                $body2 = $response2->getBody();
                                $data_body2 = json_decode($body2, true);

                                $response3 = $client2->request('GET', '/api/reservasi');
                                $body3 = $response3->getBody();
                                $data_body3 = json_decode($body3, true);
                            } catch (RuntimeException $e) {
                                echo $e->getMessage();
                            }

                            echo '<h4 class="mt-4"><i class="fas fa-table me-1"></i>Data</h4>';
                            
                            if ($_GET['module']=='home') {
                              echo '<div class="card-header">
                              <i class="fas fa-table me-1"></i>
                              Daftar Pesawat
                              </div>
                              <section class="inner-page">
                                <div class="container">
                                  <table class="table">';

                          echo '<thead>
                            <tr>
                              <th scope="col">ID Pesawat</th>  
                              <th scope="col">Nama Pesawat</th>
                              <th scope="col"> kelas</th>
                            </tr>
                          </thead>';

                          foreach ($data_body['data'] as $row) {
                            echo "<tbody>
                                  <tr>
                                    <td>$row[id]</td>
                                    <td>$row[nama_pesawat]</td>
                                    <td>$row[kelas]</td>
                                  </tr>
                                  </tbody>";
                          }
                          echo      '</table>
                                  </div>
                                </section>';
                            
                            
                            
                            //Data Tiket
                              echo '<div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Tiket
                                  </div>
                            <section class="inner-page">
                              <div class="container">
                                <table class="table">';

                                echo '<thead>
                                  <tr>
                                    <th scope="col">ID Jadwal</th>  
                                    <th scope="col">Nama Pesawat</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Kursi</th>
                                    <th scope="col">Tanggal Keberangkatan</th>
                                    <th scope="col">Harga</th>
                                  </tr>
                                </thead>';

                                foreach ($data_body2['data'] as $row2) {
                                  echo "<tbody>
                                        <tr>
                                          <td>$row2[id]</td>";
                                          foreach ($data_body['data'] as $row) {
                                            if ($row['id'] == $row2['id_pesawat']) {
                                              echo "<td>$row[nama_pesawat]</td>
                                                    <td>$row[kelas]</td>";
                                            }
                                          }
                                          
                                  echo    "<td>$row2[kursi]</td>
                                          <td>$row2[tanggal]</td>
                                          <td>$row2[harga]</td>
                                        </tr>
                                        </tbody>";
                                }
                                echo      '</table>
                                        </div>
                                      </section>';



                                      //Data reservasi
                                echo '<div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Data Reservasi
                                  </div>
                            <section class="inner-page">
                              <div class="container">
                                <table class="table">';

                                echo '<thead>
                                  <tr>
                                    <th scope="col">ID</th>  
                                    <th scope="col">ID Jadwal</th>
                                    <th scope="col">ID User</th>
                                  </tr>
                                </thead>';

                                foreach ($data_body3['data'] as $row3) {
                                  echo "<tbody>
                                  <tr>
                                    <td>$row3[id]</td>
                                    <td>$row3[id_jadwal]</td>
                                    <td>$row3[id_user]</td>
                                    </tr>
                                  </tbody>";
                                }
                                echo      '</table>
                                        </div>
                                      </section>';
                                
                                }
                          ?>
                        </div>
                    </div>
                </main>