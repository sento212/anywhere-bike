<?php

// include 'koneksi_lite.php';
$id_web_menu = '_MKS_pdf_cargo_';

?>

<style>
	#pilih_pdf, #pilih_print{
		width: 130%;
		text-align: center;
	}

	#button_pdf, #button_print {
    	/* display: block; */
    	/* margin: 0 auto; */
		/* width: fit-content; */
		position: absolute; /* Position the button absolutely */
    	right: 550px; /* Distance from the right edge in pixels */
		left: 550px;
	}
</style>
<?php
                $login_page = new Login_tampilan();
                $login_page->main($web_menu);
?>
<h2 class='text-center'> PRINT POLIS CARGO</h2>
<div class="table-responsive-sm">

	<table class='table table-borderless'>
		<tr>
				<td> <label for='pilih'>Menu </label>  </td>
				<td>
						<div>
							<select id='utama' name='form_select' class='form-control'>
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
						<select  id='status' name='status'  class='form-control' required>
							<option value=''>Pilih Status</option>
							<option value='ori'>Original</option>
							<option value='copy'>Copy</option>
						</select>
					</div>
				</td>
		</tr>

		<tr class='muncul_aksi' style='display:none'>
				<td><label for="action">Action</label></td>
				<td>
						<select id='pilih_range'  class='form-control'>
							<option value='' >Pilih Salah Satu</option>
							<option value='pdf'>PDF</option>
							<option value='print'>PRINT</option>
						</select>
				</td>
	    </tr>

		<tr id='aksi_range' style='display:none'>
			<td> <label>Masukkan Nomor Polis</label> </td>
			<td>

				<div id="pilih_pdf" style='display:none' class='row'>
					<div class="col-sm-1">
						<input class='form-control' maxlength='2' type='text' id='id_schedule_pdf' name='id_schedule_pdf' size='1' onkeypress='return ketikinput(event,"0123456789",this)'></input>
					</div>

					<div style="width: 70px;" class="col-sm-1 text-center">-</div>
					<div class="col-sm-1">
						<select id='schedule_pdf_jenis'  class='form-control' name='schedule_pdf_jenis'>
							<option value='C'>CARGO</option>
						</select>
					</div>
					<div style="width: 70px;" class="col-sm-1 text-center">-</div>
					<div class="col-sm-1">
						<input  maxlength='5'  class='form-control' type='text' id= 'seq_schedule_pdf' name='seq_schedule_pdf' size='3' onkeypress='return ketikinput(event,"0123456789",this)'></input>
					</div>
					<div style="width: 70px;" class="col-sm-1 text-center">-</div>
					<div class="col-sm-1 text-center">
						<input type="text" class='form-control' id="nomor_pol" name="nomor_pol" value="000" readonly>
					</div>
					<div style="width: 70px;" class="col-sm-1 text-center">-</div>
					<div class="col-sm-1">
						<select id='schedule_pdf_bulan'  class='form-control' name='schedule_pdf_bulan'>
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
					</div>
					<div style="width: 70px;" class="col-sm-1 text-center">-</div>
					<div class="col-sm-1">
						<select id='schedule_pdf_tahun'  class='form-control' name='schedule_pdf_tahun'>
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
						<button type='buttonload' id='button_pdf' class='btn btn-success btn-block my-3'  name='submit_schedule_pdf'   value='submit_schedule_pdf' ><i class='fa fa-circle-o-notch fa-spin'></i> SHOW PDF</button>

					</div>
					<div>
						<br>
					</div>
				</div>


				<div id="pilih_print" style='display:none' class='row'>
					<div class="col-sm-1">
						<input class='form-control' maxlength='2' type='text' id='id_schedule_print' name='id_schedule_print' size='1' onkeypress='return ketikinput(event,"0123456789",this)'></input>
					</div>
					<div style="width: 70px;" class="col-sm-1 text-center">-</div>
					<div class="col-sm-1">
						<select id='print_jenis'  class='form-control' name='print_jenis'>
							<!-- OPTION -->
							<!-- <option value='' >Jenis Polis</option> -->
							<option value='C'>CARGO</option>
						</select>
					</div>
					<div style="width: 70px;" class="col-sm-1 text-center">-</div>
					<div class="col-sm-1">
						<input  maxlength='5'  class='form-control' type='text' id= 'seq_schedule_print' name='seq_schedule_print' size='3' onkeypress='return ketikinput(event,"0123456789",this)'></input>
					</div>
					<div style="width: 70px;" class="col-sm-1 text-center">-</div>
					<div class="col-sm-1 text-center">
						<input type="text" class='form-control' id="polis_number" name="polis_number" value="000" readonly>
					</div>
					<div style="width: 70px;" class="col-sm-1 text-center">-</div>
					<div class="col-sm-1">
						<select id='schedule_print_bulan'  class='form-control' name='schedule_print_bulan'>
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
					</div>
					<div style="width: 70px;" class="col-sm-1 text-center">-</div>
					<div class="col-sm-1">
						<select id='schedule_print_tahun'  class='form-control' name='schedule_print_tahun'>
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
						<button type='buttonload' id='button_print' class='btn btn-success btn-block my-3'  name='submit_schedule_pdf'   value='submit_schedule_pdf' ><i class='fa fa-circle-o-notch fa-spin'></i>SHOW PDF</button>

					</div>
					<div>
						<br>
					</div>
				</div>

			</td>
	  	</tr>
	</table>
</div>
<input type='hidden' id='username' value='<?php echo $user_id?>'>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>							 -->
	<?php


// formula Java Script
//---------------------
echo "
<script type='text/javascript' src='https://code.jquery.com/jquery-3.7.0.js' integrity='sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=' crossorigin='anonymous'> </script>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
if ( $mkg_group == 'DEMO')
{include 'view/menu/print_cargo/controller/idx_cargo_js_orig.php'; }
else
{include 'view/menu/print_cargo/controller/idx_cargo_js_orig.php'; }


?>
