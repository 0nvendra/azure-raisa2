<?php
   require_once '/home/azureinvestama/AIG2/vendor/autoload.php';
        $host = "localhost";
        $uname = "azureinvestama_root";
        $pass = "Azure2022!";
        $db = "azureinvestama_pyk_sirii";
        
        $koneksi = mysqli_connect($host, $uname, $pass);
        mysqli_select_db($koneksi,$db);
        
        // if($koneksi){
        //     echo "sukses";
        // }
        
        // else{
        //     echo "gagal";
        // }
        
        $hasil = array();
        if($koneksi){
            $query = "SELECT emp.nik as NIK, emp.nama as nama, kontrak.tgl_akhir_kontrak as habis_kontrak, 
            max(kontrak.perpanjangan_ke) as perpanjangan_ke, emp.email, divisi.nama as nama_divisi, jabatan.jenis_jabatan as jabatan
            from karyawan as emp JOIN kontrak_karyawan as kontrak ON emp.nik = kontrak.nik_karyawan
            JOIN master_divisi as divisi ON emp.divisi_id = divisi.id 
            JOIN master_jabatan as jabatan ON emp.jabatan_id = jabatan.id 
            WHERE CURDATE() = (SELECT (DATE_SUB(max(kontrak.tgl_akhir_kontrak), INTERVAL 2 MONTH)))
            GROUP BY kontrak.nik_karyawan";
            $tampil = mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
            
            while($row = mysqli_fetch_assoc($tampil)){
               $hasil[] = $row;
            }
            
            if(mysqli_num_rows($tampil) == 0){
                echo "tidak ada reminder";
            }
            else{
             $transport = (new Swift_SmtpTransport('mail.azureinvestama.com', 465,'ssl'))
            ->setUsername('request.information@azureinvestama.com')
            ->setPassword('Azure2022!');
            
            $mailer = new Swift_Mailer($transport);

            $message = new Swift_Message();
            $message->setSubject('Reminder: Kontrak Kerja Karyawan');
            $message->setFrom(['request.information@azureinvestama.com' => 'RAISA Administration Team']); 
            $message->addTo('hrd@azureinvestama.com','HCM');
            $message->setCc([
                        'robby.manurung@azureinvestama.com', 
                        'jim.sanjaya@azureinvestama.com', 
                        'kamila@azureinvestama.com',
                        'mustafa@azureinvestama.com'
                    ]);
            
            $bodyText = "";
            $i = 1;
            foreach($hasil as $dt){
                $bodyText .= "<tr>
                            <td style='border: 1px solid black;'>".$i."</td>
                            <td style='border: 1px solid black;'>".$dt['NIK']."</td>
                            <td style='border: 1px solid black;'>".$dt['nama']."</td>
                            <td style='border: 1px solid black;'>".$dt['email']."</td>
                            <td style='border: 1px solid black;'>".$dt['nama_divisi']."</td>
                            <td style='border: 1px solid black;'>".$dt['jabatan']."</td>
                            <td style='border: 1px solid black;'>".$dt['habis_kontrak']."</td>
                            <center><td style='border: 1px solid black;'>".$dt['perpanjangan_ke']."</td></center>
                            </tr>";
                        
                        $i++;
            }
            $message->setBody(
                '<h4>
                <span>Dear Bapak/Ibu Human Capital Management (HCM),</span>
                <br>
                <span>Azure Investama Grup</span>
                </h4>
                <p>Berikut ini daftar karyawan yang akan habis kontrak:</p>
                <table style="border:1px solid black;border-collapse: collapse;width:100%;">
                        <thead>
                        <tr>
                            <th style="border: 1px solid black;">NO</th>
                            <th style="border: 1px solid black;">NIK</th>
                            <th style="border: 1px solid black;">Nama</th>
                            <th style="border: 1px solid black;">Email</th>
                            <th style="border: 1px solid black;">Divisi</th>
                            <th style="border: 1px solid black;">Posisi</th>
                            <th style="border: 1px solid black;">Tanggal Akhir Kontrak</th>
                            <th style="border: 1px solid black;">Kontrak Ke</th>
                        </tr>
                        </thead>
                        <tbody>
                        '.$bodyText.'
                </tbody>
                </table>
                <br><br>
                <span>Best Regards, </span>
                <br><br>
                <span>RAI-SA Administration Team</span>'
                ,'text/html'
            );
            
            $result = $mailer->send($message);
            }
        }
        else{
            echo "gagal";
        }
   
?>