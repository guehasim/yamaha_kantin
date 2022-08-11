<script type="text/javascript">
    $(document).on('click', '.btn-detail-tampilan', function() {
        let id = $(this).attr('data-id');
        $.ajax({
            url: siteUrl + 'tampilan/detail/' + id,
            type: 'POST',
            data: {
                id,
            },
            success: function(res){
                if (res) {
                    res = JSON.parse(res);
                    $("#modalUbahTampilan").find('input[name=id]').val(res.ID_tampilan);
                    $("#modalUbahTampilan").find('input[name=teks]').val(res.teks);
                    $("#modalUbahTampilan").find('input[name=image]').val(res.image);

                    $("#modalUbahPengguna").modal('show');
                }
            }
        })
    })
</script>