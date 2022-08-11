<script type="text/javascript">
	$(document).on('click', '.btn-detail', function(e){
		let id = $(this).data('id');
		$.ajax({
			url: siteUrl + 'laporan/detail',
			type: 'POST',
			data: {
				id,
			},
			success: function(res) {
				if (res) {
					let data = $.parseJSON(res);
					if (data) {
						let html = ``;						
						$.each(data.detail, function(idx, val){
							html += `<tr>
										<td>${val.area}</td>
                                        <td>${val.name}</td>
                                        <td>${val.tgl_update ? moment(val.tgl_update).format('DD MMM YYYY') : ''}</td>
										<td>${val.actual}</td>
										<td><span class="${val.judge == 'OK' ? 'text-success' : 'text-danger'} font-weight-bold">${val.judge}</span></td>
									</tr>`;
						});

                        $("#btn-cetak-detail").attr('href', siteUrl + 'laporan/print_detail/' + (data.id_transaksi || ''));
						$("#modalDetail").find('.modal-body').find("#table-result tbody").html(html);
						$("#modalDetail").modal('show');
					}
				}
			}
		})
	});

	$(document).on('keyup change', '.filter_column', _.debounce(function(e){
        let filter  = {};
        var table   = $("#tabledaftarcovid");

        $.each($(".filter_column"), function(idx, val){
            let dataVal = $(this).val();
            
            if (dataVal != '') {
                if (['tgl_survey'].includes($(this).data('name'))) {
                    dataVal = $(this).val().replace(/\//g,'-') || '0';
                }
            }else {
                dataVal = '';
            }

            filter[$(this).data('name')] = dataVal;
        })

        table.data('content', table.data('basecontent')+'?'+$.param(filter)); 
        var dataTable   = window.alltable['tabledaftarcovid'];
        dataTable.destroy();
        window.createTable(table, dataTable.page.info().length);
        return false;
    }, 700));

    $(document).on('change', '.filter_select', _.debounce(function(e){
        let filter  = {};
        var table   = $("#tabledaftarcovid");

        $.each($(".filter_select"), function(idx, val){
            let dataVal = $(this).val();
            
            if (dataVal != '') {
                if (['date_from'].includes($(this).data('name'))) {
                    dataVal = $(this).val().replace(/\//g,'-') || '0';
                }
            }else {
                dataVal = '';
            }

            filter[$(this).data('name')] = dataVal;
        })

        table.data('content', table.data('basecontent')+'?'+$.param(filter)); 
        var dataTable   = window.alltable['tabledaftarcovid'];
        dataTable.destroy();
        window.createTable(table, dataTable.page.info().length);
        return false;
    }, 700));

        $( function() {
    $( "#period_awal" ).datepicker({dateFormat:'dd-mm-yy'});
  } );

    $( function() {
    $( "#period_akhir" ).datepicker({dateFormat:'dd-mm-yy'});
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