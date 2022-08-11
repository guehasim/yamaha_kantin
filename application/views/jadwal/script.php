<script type="text/javascript">
// action ubah makan

    $(document).on('click', '.btn-detail-jadwal-tampil', function() {
        let id = $(this).attr('data-id');
        $.ajax({
            url: siteUrl + 'jadwal/detail_tampil/' + id,
            type: 'POST',
            data: {
                id,
            },
            success: function(res){
                if (res) {
                    res = JSON.parse(res);
                    $("#modalUbahJadwalTampil").find('input[name=id]').val(res.ID_jadwalTampilan);
                    $("#modalUbahJadwalTampil").find('input[name=tanggal]').val(res.Tanggal);
                    $("#modalUbahJadwalTampil").find('input[name=tampil]').val(res.ID_Tampilan);
                    // $("#modalUbahJadwalTampil").find('tampil').val(res.ID_Tampilan);
                    $("#modalUbahJadwalTampil").modal('show');
                }
            }
        })
    });

// action end
    $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy'}).val();
  } );

    $( function() {
    $( "#datepicker2" ).datepicker();
  } );

    $( function() {
    $( "#datepicker3" ).datepicker();
  } );

    $( function() {
    $( "#datepicker4" ).datepicker();
  } );

    $( function() {
    $( "#datepicker5" ).datepicker();
  } );

    $( function() {
    $( "#datepicker6" ).datepicker();
  } );
</script>