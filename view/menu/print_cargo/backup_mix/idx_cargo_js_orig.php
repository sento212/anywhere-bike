<script>
    $(document).ready(function () {
        $('#utama').change(function () { 
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
        $('#status').change(function () { 
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
        $('#pilih_range').change(function () { 
            let range = $('#pilih_range').val();
            console.log(range);
            if(range == 'pdf')
            {
                $('#aksi_range').show(600);
                $('#pilih_pdf').show(600);
                $('#pilih_print').hide(600);
            }
            else if(range == 'print')
            {
                $('#aksi_range').show(600);
                $('#pilih_pdf').hide(600);
                $('#pilih_print').show(600);
            }
            else
            {
                $('#aksi_range').hide(600);
                $('#pilih_pdf').hide(600);
                $('#pilih_print').hide(600);
            }
            
        });
    });

    
</script>