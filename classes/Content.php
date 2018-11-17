<?php 
    class Content {
        public static function profil ($idUser){
            $user = DB::selectUser($idUser);
            $dataGolongan = DB::selectAllGolongan();
            $namaLengkap    = $user['namaLengkap'];
            $email          = $user['email'];
            $golongan       = $user['idGolongan'];
            $nomorInduk     = $user['nomorInduk'];
            $sekolah        = $user['sekolahUser'];
            $gender         = $user['gender'];
            $tempatLahir    = $user['tempatLahir'];
            $tanggalLahir   = $user['tanggalLahir'];
            $foto           = $user['foto'];
            $diskripsi      = $user['diskripsiUser'];
          
            $isPerempuan = ($gender=="Perempuan")?'checked':'';
            $isLakilaki = ($gender=="Laki-laki")?'checked':'';
            $listGolongan ="";
            foreach($dataGolongan as $i){
                if($golongan == $i['idGolongan']){
                    $listGolongan .= '<option value="'.$i['idGolongan'].'" selected >'.$i['namaGolongan'].'</option>';
                }else{
                    $listGolongan .= '<option value="'.$i['idGolongan'].'">'.$i['namaGolongan'].'</option>';
                }   
            }
            $tombolCommand ='
                <div class="form-group row">
                    <div class="input-group col-md-12">      
                        <input class="btn btn-success col-sm-12" type="submit" name="save" value="Save"/>
                    </div>        
                </div>
            </form>
            ';
            return '
            <div class="card-body">
                <h4 class="card-title">Formulir Biodata</h4>
                <p class="card-description">Data profil biodata pengguna</p>
                <form class="forms-sample" action="./transaction.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="input-group col-md-12">
                            <img class="mb-3 mx-auto d-block" style="width:auto; height: 200px" src="'.Navigation::getSourceImageProfilLoggedIn().'" alt="Foto"/>
                        </div>
                    </div>
                    <div class="form-group row">    
                        <div class="input-group col-md-12">
                            <label for="keterangan" class=" col-form-label">Deskripsi Diri</label>    
                            <div class="input-group">
                                <textarea name="deskripsiUser" class="form-control" id="exampleTextarea1" rows="2" placeholder="Keterangan">'.$diskripsi.'</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama</label>
                        <div class="input-group col-sm-9">
                            <input type="hidden" name="id" value="'.$idUser.'">
                            <input type="text" name="namaLengkap" value="'.$namaLengkap.'"class="form-control" placeholder="Masukkan Nama" aria-label="Masukkan Nama" aria-describedby="colored-addon3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_panggilan" class="col-md-3 col-form-label">Sekolah</label>
                        <div class="input-group col-md-1">
                           <select name="idGolongan" class="form-control">
                           '.$listGolongan.'
                           </select>
                        </div>
                        <div class="input-group col-md-8">
                           <input type="text" name="sekolahUser" class="form-control" placeholder="Nama Sekolah" aria-label="Masukkan Nama" aria-describedby="colored-addon3" value="'.$sekolah.'">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_panggilan" class="col-sm-3 col-form-label">Nomor Induk</label>
                        <div class="input-group col-sm-9">
                           <input type="text" name="nomorInduk" class="form-control" placeholder="Masukan Nomor induk" aria-label="Masukkan Nama" aria-describedby="colored-addon3" value="'.$nomorInduk.'">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="input-group col-sm-9">
                            <input type="text" name="tempatLahir" class="form-control" placeholder="Tempat Lahir" aria-label="Tanggal Lahir" aria-describedby="colored-addon3" value="'.$tempatLahir.'" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="input-group col-sm-9">
                           <input type="date" name="tanggalLahir" class="form-control" placeholder="Tanggal Lahir" aria-label="Masukkan Tanggal Lahir" aria-describedby="colored-addon3" value="'.$tanggalLahir.'" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Gender</label>
                        <div class="col-sm-4">
                            <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jk" id="membershipRadios1" value="Laki-laki" '.$isLakilaki.' required> Laki-laki
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-radio">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jk" id="membershipRadios2" value="Perempuan"'.$isPerempuan.' required> Perempuan
                            </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" id="exampleInputPassword2" placeholder="Email" value="'.$email.'">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                        <div class="input-group col-sm-9">
                            <input type="file" name="gambar" class="form-control" id="">
                        </div>
                    </div>
                    <br>
            '.$tombolCommand.'
            </div>';
        } 
        public static function password ($idUser){
            return '
            <div class="card-body">
                <h4 class="card-title">Password</h4>
                <p class="card-description">Ganti Password</p>
                <form class="forms-sample" action="./setting.php" method="post">
                    <div class="form-group">
                        <label class="label">Password Lama</label>
                        <div class="input-group">
                            <input type="hidden" name="id" class="form-control" value="'.$idUser.'">
                            <input type="password" name="oldPassword" class="form-control" placeholder="Password Lama" required>
                        </div>
                    </div>       
                    <div class="form-group">
                        <label class="label">Password Baru</label>
                        <div class="input-group">
                            <input type="password" name="newPassword" class="form-control" placeholder="Password Baru" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label">Konfirmasi Password</label>
                        <div class="input-group">
                            <input type="password" name="matchNewPassword" class="form-control" placeholder="Password Baru" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-succes  container" name="setPassword" class="form-control" value="Set Password">
                    </div>  
                </form>
            </div> 
            ';
        }
        public static function passwordRecovery(){
            $idUser = Login::isLoggedIn() ;
          if(DB::query('SELECT idUser FROM forgot WHERE idUser = :idUser',array(':idUser'=> $idUser))){
            $forgot = DB::query('SELECT * FROM forgot WHERE idUser = :idUser',array(':idUser'=>$idUser))[0];
            return '
              <div class="card-body">
              <h4 class="card-title">Recovery Password</h4>
                <form class="forms-sample" action="./setting.php" method="post">
                <div class="form-group">
                    <label class="label">Pertanyaan</label>
                    <div class="input-group">
                        <input type="hidden" name="idrecovery" class="form-control" placeholder="" value="'.$forgot['idforgot'].'" required>
                        <input type="text" name="pertanyaan" class="form-control" placeholder="Pertanyaan" value="'.$forgot['pertanyaan'].'" required>
                    </div>
                </div>       
                <div class="form-group">
                    <label class="label">Password Baru</label>
                    <div class="input-group">
                        <input type="text" name="jawaban" class="form-control" placeholder="Password Baru" value="'.$forgot['jawaban'].'"required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-succes  container" name="updaterecovery" class="form-control" value="Update Lupa Password">
                </div>  
                </form>
              </div> 
            ';
          }else{
              return '
              <div class="card-body">
                <h4 class="card-title">Recovery Password</h4>
                  <form class="forms-sample" action="./setting.php" method="post">
                  <div class="form-group">
                      <label class="label">Pertanyaan</label>
                      <div class="input-group">
                          <input type="text" name="pertanyaan" class="form-control" placeholder="Pertanyaan" required>
                      </div>
                  </div>       
                  <div class="form-group">
                      <label class="label">Jawabaan</label>
                      <div class="input-group">
                          <input type="text" name="jawabaan" class="form-control" placeholder="Password Baru" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-succes  container" name="forgotpassword" class="form-control" value="Set Lupa Password">
                  </div>  
              </form>
            </div> 
            ';
            }
        }
        public static function ForgotPassword(){
            return '
            <h1 class="text-primary">Lupa Password</h1>
            <form class="forms-sample" action="./forgot_password.php" method="post">
                <div class="form-group">
                    <label class="label">Email</label>
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="label">Nomor Induk</label>
                    <div class="input-group">
                        <input type="text" name="nomorInduk" class="form-control" placeholder="Nomor Induk" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" name="forgotpassword" class="btn btn-primary submit-btn btn-block" value="Kirim">
                        </div>
                    </div>    
                </div>
            </form>
            <div class="form-group d-flex justify-content-between">
                <div class="form-check form-check-flat mt-0">
                    <a href="./login.php" class="text-center text-small text-black">Masuk</a>
                </div>
                
            </div>
        
            ';
        }
        public static function FormPertanyaan($email,$nomorInduk){
            $idUser = DB::query('SELECT idUser FROM user WHERE email =:email AND nomorInduk = :nomorInduk',array(':email'=>$email,':nomorInduk'=>$nomorInduk))[0]['idUser'];
            if(DB::query('SELECT idForgot FROM forgot WHERE idUser =:idUser',array(':idUser'=>$idUser))){
                $forgot = DB::query('SELECT * FROM forgot WHERE idUser =:idUser',array(':idUser'=>$idUser))[0];
                return '
                <h1 class="text-primary">Pertanyaan</h1>
                <form class="forms-sample" action="./forgot_password.php" method="post">
                <div class="form-group">
                    <label class="label">Pertanyaan</label>
                    <div class="input-group">
                        <input type="hidden" name="id" class="form-control" value="'.$forgot['idUser'].'">
                        <input type="text" name="pertanyaan" class="form-control" value="'.$forgot['pertanyaan'].'">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label">Jawabaan</label>
                    <div class="input-group">
                        <input type="text" name="jawaban" class="form-control" placeholder="Jawaban" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" name="confirm" class="btn btn-primary submit-btn btn-block" value="Kirim">
                        </div>
                    </div>    
                </div>
                </form>
                <div class="form-group d-flex justify-content-between">
                    <div class="form-check form-check-flat mt-0">
                        <a href="./login.php" class="text-center text-small text-black">Masuk</a>
                    </div>  
                </div>
            
            ';
            }else{
                return self::ForgotPassword();
            }  
        }
        public static function BuatPassword($idUser){
            return '
            <h1 class="text-primary">Atur Password</h1>
            <form class="forms-sample" action="./forgot_password.php" method="post">
            <div class="form-group">
                <label class="label">Password Baru</label>
                <div class="input-group">
                    <input type="hidden" name="id" class="form-control" value="'.$idUser.'" >
                    <input type="password" name="password" class="form-control" >
                </div>
            </div>
            <div class="form-group">
                <label class="label">Konfirmasi Password</label>
                <div class="input-group">
                    <input type="password" name="password2"class="form-control" placeholder="Jawaban" required>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" name="buatpassword" class="btn btn-primary submit-btn btn-block" value="Kirim">
                    </div>
                </div>    
            </div>
            </form>
            <div class="form-group d-flex justify-content-between">
                <div class="form-check form-check-flat mt-0">
                    <a href="./login.php" class="text-center text-small text-black">Masuk</a>
                </div>  
            </div>
         
         ';
        }
        public static function Login(){
            $golongan = DB::query('SELECT * FROM golongan');
            $listGolongan= '';
            foreach($golongan as $i ){
                $listGolongan.= "<option value=".$i['idGolongan'].">".$i['namaGolongan']."</option>";
            }
            return '
                                    <div class="logo-login">
                                        <img src="./images/Logo.png" class="img-fluid">
                                    </div>
                                    <br>
                                    <!-- Nav pills -->
                                    <div class="col-centered">
                                        <ul class="nav nav-pills" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="pill" href="#login">Masuk</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#register">Daftar</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div id="login" class="tab-pane active"><br>
                                            <form class="forms-sample" action="./login.php" method="post">
                                                <div class="form-group">
                                                    <label class="label">Email</label>
                                                    <div class="input-group">
                                                        <input type="email" name="email" class="form-control" placeholder="Username" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="mdi mdi-check-circle-outline"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label">Password</label>
                                                    <div class="input-group">
                                                        <input type="password" name="password"class="form-control" placeholder="*********" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="mdi mdi-check-circle-outline"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="submit" name="login" class="btn btn-primary submit-btn btn-block" value="Masuk">
                                                        </div>
                                                    </div>    
                                                </div>
                                                <div class="form-group d-flex justify-content-between">
                                                    <div class="form-check form-check-flat mt-0">
                                                        <!-- <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" checked> Biarkan
                                                            tetap masuk
                                                        </label> -->
                                                    </div>
                                                    <a href="./forgot_password.php" class="text-small forgot-password text-black">Lupa Password</a>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="register" class="tab-pane"><br>
                                            <form class="forms-sample" action="./login.php" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label class="label">Nama Lengkap</label>
                                                    <div class="input-group">
                                                        <input type="text" name="namaLengkap" class="form-control" placeholder="Nama Lengkap" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="mdi mdi-check-circle-outline"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label">Email</label>
                                                    <div class="input-group">
                                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="mdi mdi-check-circle-outline"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label">Tempat Lahir</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="tempatLahir" placeholder="Tempat lahir" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="mdi mdi-check-circle-outline"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label">Tanggal Lahir</label>
                                                    <div class="input-group">
                                                        <input type="date" name="tanggalLahir" class="form-control" placeholder="Tanggal Lahir" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="mdi mdi-check-circle-outline"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12">Jenis - Kelamin</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-radio">
                                                        <label class="form-check-label">
                                                            <input type="radio" name="jk" class="form-check-input" id="membershipRadios1" value="Laki-laki" required> Laki-laki
                                                        </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-radio">
                                                        <label class="form-check-label">
                                                            <input type="radio" name="jk" class="form-check-input"  id="membershipRadios2" value="Perempuan" required> Perempuan
                                                        </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label">Pendidikan Terakhir Kali</label>
                                                    <div class="input-group">
                                                        <select class="form-control" name="idgolongan" required>
                                                            '.$listGolongan.'
                                                        </select>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="text" name="sekolahUser" class="form-control" placeholder="Nama Sekolah" required>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="text" name="nomorInduk" class="form-control" placeholder="NISN\NPM" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label">Password</label>
                                                    <div class="input-group">
                                                        <input type="password" name="password"class="form-control" placeholder="*********" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="mdi mdi-check-circle-outline"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label">Konfirmasi Password</label>
                                                    <div class="input-group">
                                                        <input type="password" name="password2" class="form-control" placeholder="*********" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="mdi mdi-check-circle-outline"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="create_account" class="btn btn-primary col-md-12" value="Daftar">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <ul class="auth-footer">
                                        <p class="footer-text text-center">copyright © 2018 ARS. Infomatic Engineering UNILA .</p>
                                    </ul>
            ';
        } 
    }
?>