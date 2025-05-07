<script>
    function ketiktombol(e)
    {
      if (window.event)
         return window.event.keyCode;
      else if (e)
         return e.which;
      else
         return null;
    };

    function ketikinput(e, daftar, id)
    {
      var key, keychar;
      key = ketiktombol(e);
      if (key == null) return true;
      keychar = String.fromCharCode(key);
      keychar = keychar.toLowerCase();
      daftar = daftar.toLowerCase();
      if (daftar.indexOf(keychar) != -1) return true;
      if ( key==null || key==0 || key==8 || key==9 || key==27 ) return true;
      if (key == 13) {
        var i;
        for (i = 0; i < id.form.elements.length; i++)
            if (id == id.form.elements[i])
                break;
        i = (i + 1) % id.form.elements.length;
        id.form.elements[i].focus();
        return false;
      };
      return false;
    };

    $(document).ready(function ()
    {
        // let user_id = $('#username').val();
        // console.log(user_id);
        $('#utama').change(function ()
        {
            let utama = $('#utama').val();
            $('.muncul_aksi').hide(600);
            $('#pilih_pdf').hide(600);
            $('#pilih_print').hide(600);
            if(utama == 'sch_biling')
            {
                $('.muncul_status').show(600);
            }
            else
            {
                $('.muncul_status').hide(600);
            }

        });

        $('#status').change(function ()
        {
            let status = $('#status').val();
            $('#pilih_pdf').hide(600);
            $('#pilih_print').hide(600);
            if(status == 'ori')
            {
                if (confirm("Apakah Yakin Print Original?") === true)
                {
                    $('.muncul_aksi').show(600);
                }
                else
                {
                    $('.muncul_aksi').hide(600);
                }
            }
            else if(status == 'copy')
            {
                $('.muncul_aksi').show(600);
            }
            else
            {
                $('.muncul_aksi').hide(600);
            }
        });

        $('#pilih_range').change(function ()
        {
            let range = $('#pilih_range').val();
            console.log('range ->' + range);

            if(range == 'print')
            {
                $('#aksi_range').show(600);
                $('#pilih_pdf').hide(600);
                $('#pilih_print').show(600);
            }
            else if(range == 'pdf')
            {
                $('#aksi_range').show(600);
                $('#pilih_pdf').show(600);
                $('#pilih_print').hide(600);
            }
            else
            {
                $('#aksi_range').hide(600);
                $('#pilih_pdf').hide(600);
                $('#pilih_print').hide(600);
            }

        });
    });

    $('#button_pdf').click(function ()
    {
        let user_id        = $('#username').val();
        let depan_sche     = $('#id_schedule_pdf').val();
        let tengah_sche    = $('#schedule_pdf_jenis').val();
        let belkng_sche    = $('#seq_schedule_pdf').val();
        let nomor_onya     = $('#nomor_pol').val();
        let polis_bulan    = $('#schedule_pdf_bulan').val();
        let polis_thun     = $('#schedule_pdf_tahun').val();
        let status         = $('#status').val();
        let pilih_range    = $('#pilih_range').val();

        let no_polis = depan_sche+'-'+tengah_sche+'-'+belkng_sche+'-'+nomor_onya+'-'+polis_bulan+'-'+polis_thun;

        // console.log('no_polis ->' + no_polis);

        let index_formdata = new FormData();
        index_formdata.append('user_id', user_id);
        index_formdata.append('no_polis', no_polis);
        index_formdata.append('key_id'  ,'key_idkey_id');
        index_formdata.append('status', status);
        index_formdata.append('tipe_pdf',pilih_range);
        index_formdata.append('background','si_pdf');
        // let a = {'user_id': user_id, 'no_polis':no_polis, 'key_id': 'key_idkey_id', 'status':status, 'tipe_pdf':pilih_range};
        // console.log(index_formdata);'key_idkey_id'
        console.log(index_formdata);
        ajax(index_formdata);

    });

    $('#button_print').click(function ()
    {
        let user_id            = $('#username').val();
        let awal_print         = $('#id_schedule_print').val();
        let tengah_print       = $('#print_jenis').val();
        let belkng_print       = $('#seq_schedule_print').val();
        let nomor_polnya       = $('#polis_number').val();
        let polis_print_bulan  = $('#schedule_print_bulan').val();
        let polis_print_thun   = $('#schedule_print_tahun').val();
        let status             = $('#status').val();
        let pilih_range        = $('#pilih_range').val();

        let no_polis = awal_print+'-'+tengah_print+'-'+belkng_print+'-'+nomor_polnya+'-'+polis_print_bulan+'-'+polis_print_thun;

        console.log('no_polis ->' + no_polis);

        let index_formdata = new FormData();
        index_formdata.append('user_id', user_id);
        index_formdata.append('no_polis', no_polis);
        index_formdata.append('key_id', 'key_idkey_id');
        index_formdata.append('status', status);
        index_formdata.append('tipe_pdf','print');
        // index_formdata.append('tipe_pdf',pilih_range);
        ajax(index_formdata);
    });

    function ajax(a)
    {
        //console.log(a);
        $.ajax(
        {
            type: "POST",
            url: "https://www.rks-m.com/mks/entry/view/menu/print_cargo/API/API_Cargo_Print.php",
            data: a,
            processData: false,
            contentType: false,
            beforeSend: function() {
                var sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';
                swal.fire({
                    html: '<h5>Generate Data</h5>',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    onRender: function() {
                        // there will only ever be one sweet alert open.
                        $('.swal2-content').prepend(sweet_loader);
                    }
                });
            },
            success: function (response)
            {
                let obj = JSON.parse(response);
                if(obj != '')
                {
                    swal.fire({
                        icon: 'success',
                        html: '<h5>Success!</h5>'
                    });
                    window.open(obj);
                }
                else
                {
                    swal.fire({
                        icon: 'error',
                        html: '<h5>Data Polis Tidak Ditemukan!</h5>'
                    });
                }
            },
            error: function(xhr, status, error)
            {
              alert("error bosku");
              console.log(status);
            }
        });
    }
</script>
