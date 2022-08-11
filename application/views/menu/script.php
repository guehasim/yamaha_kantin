<script type="text/javascript">
    $(document).on('click', '.btn-detail-makan', function() {
        let id = $(this).attr('data-id');
        $.ajax({
            url: siteUrl + 'menu/detail/' + id,
            type: 'POST',
            data: {
                id,
            },
            success: function(res){
                if (res) {
                    res = JSON.parse(res);
                    $("#modalUbahMakan").find('input[name=id]').val(res.ID_menu);
                    $("#modalUbahMakan").find('input[name=nama]').val(res.nama);

                    $("#modalUbahMakan").modal('show');
                }
            }
        })
    });

     $(document).on('click', '.btn-detail-minum', function() {
        let id = $(this).attr('data-id');
        $.ajax({
            url: siteUrl + 'minum/detail/' + id,
            type: 'POST',
            data: {
                id,
            },
            success: function(res){
                if (res) {
                    res = JSON.parse(res);
                    $("#modalUbahMinum").find('input[name=id]').val(res.ID_menu);
                    $("#modalUbahMinum").find('input[name=nama]').val(res.nama);

                    $("#modalUbahMinum").modal('show');
                }
            }
        })
    });
</script>