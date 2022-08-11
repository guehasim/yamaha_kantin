<script type="text/javascript">
	$(document).on('change', '.filtertgl', function(e){
        if ($(this).val() != '') {
            $("#form_date").trigger('submit');
        }
    });
</script>