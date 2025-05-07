<?php

		// $no_polis = '01-C-00065-000-07-2021';

		// https://www.araksa.com/mks/epol/cargo/index.php

		use function PHPSTORM_META\type;

		$id_web_menu = '_MKS_pdf_cargo_';

		//modifikasi tahun
		//hide HTML comment
		//fix NOTA


		$host_lite	= "localhost";
		$user_lite	= "prog-x";
		$pass_lite	= "N@tiv3_pr0g_x";
		$db_lite	= "epolis";
		$conn       = mysqli_connect($host_lite,$user_lite,$pass_lite, $db_lite);

				?>

		  <!DOCTYPE html>
			<html>
				<head>
				<title>CARGO</title>
				</head>
				<body style='background-color:  #F8F7E6'>
					<h1> PRINT POLIS CARGO</h1>

						</div>
						<table border = '1' cellspacing='6' cellpadding='4'>
							<tr>
								<td> 
								<label for='pilih'>Menu </label>
								</td>
								<td>
								<div>
									<select id='utama' name='form_select'>
									<option value=''>Silakan Dipilih</option>
									<option value='sch_biling'>Schedule Billingual</option>
									</select>
								</div> 
								</td>
							</tr>

							<tr class='muncul_status' style='display:none'>
								<td><label> Status Dokumen </label></td>
								<td>
								<div>
								<select  id='status' name='status' required>
									<option value=''>Pilih Status</option>
									<option value='ori'>Original</option>
									<option value='copy'>Copy</option>
								</select>
								</div>
								</td>
								
							</tr>

							<tr class='muncul_aksi' style='display:none'>
								<td>Action </td>
								<td>
									<select id='pilih_range'>
										<option value='' >Pilih Salah Satu</option>
										<option value='pdf'>PDF</option>
										<option value='print'>PRINT</option>
									</select>
									<div id='aksi_range' style='display:none'>
										<div id="pilih_pdf" style='display:none'>
											<label>Masukkan Nomor Polis</label>
											<br>
											<input maxlength='2' type='text' id='id_schedule_pdf' name='id_schedule_pdf' size='1' onkeypress='return ketikinput(event,"0123456789",this)'></input> -
											<select id='schedule_pdf_jenis' name='schedule_pdf_jenis'>
												<!-- OPTION -->
												<option value='' >Jenis Polis</option>
												<option value='CARGO'>CARGO</option>
											</select> -
											<input  maxlength='5' type='text' id= 'seq_schedule_pdf' name='seq_schedule_pdf' size='3' onkeypress='return ketikinput(event,"0123456789",this)'></input>
											<label> - 000 - </label>
											<select id='schedule_pdf_bulan' name='schedule_pdf_bulan'>
												<!-- OPTION -->
												<option value='' >Bulan</option>
												<option value='01'>01</option>
												<option value='02'>02</option>
												<option value='03'>03</option>
												<option value='04'>04</option>
												<option value='05'>05</option>
												<option value='06'>06</option>
												<option value='07'>07</option>
												<option value='08'>08</option>
												<option value='09'>09</option>
												<option value='10'>10</option>
												<option value='11'>11</option>
												<option value='12'>12</option>
											</select>

											<!-- OPTION -->
											- <select id='schedule_pdf_tahun' name='schedule_pdf_tahun'>
													<option value='' >Tahun</option>
													<?php
													$a = date('Y')+1;
													for($i=0;$i<10;$i++)
													{
													$a -= 1;
													echo "<option value= '$a'>$a</option>";
													}
													?>
											</select>
											<br><br>
											<button type='submit'  name='submit_schedule_pdf'   value='submit_schedule_pdf' >SHOW PDF</button>
										</div>


										</div>
										<div id="pilih_print" style='display:none'>
											INI KALO KE PRINT
										</div>
									</div>	
								</td>
							</tr>
						</table>

						<?php

// formula Java Script
   //---------------------
   echo "
   <script
   src='https://code.jquery.com/jquery-3.7.0.js'
   integrity='sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM='
   crossorigin='anonymous'></script>  
   ";
   if ( $mkg_group == 'DEMO')
   {
	   include 'idx_cargo_js_orig.php';
   }
   else
   {
	   include 'idx_cargo_js_orig.php';
   }

   // unlink("https://www.araksa.com/mks/epol/hvc/pdf/20230119_151911675200.pdf");

?>

