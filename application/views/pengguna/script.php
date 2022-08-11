<script type="text/javascript">
    $(document).on('click', '.btn-detail-pengguna', function() {
        let id = $(this).attr('data-id');
        $.ajax({
            url: siteUrl + 'pengguna/detail/' + id,
            type: 'POST',
            data: {
                id,
            },
            success: function(res){
                if (res) {
                    res = JSON.parse(res);
                    $("#modalUbahPengguna").find('input[name=id]').val(res.ID_user);
                    $("#modalUbahPengguna").find('input[name=nama]').val(res.nama);
                    $("#modalUbahPengguna").find('input[name=user]').val(res.username);
                    $("#modalUbahPengguna").find('select[name=status]').val(res.status);

                    $("#modalUbahPengguna").modal('show');
                }
            }
        })
    })
</script>