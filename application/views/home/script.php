<script type="text/javascript">
    $(document).on('change', '.filtertgl', function(e){
        if ($(this).val() != '') {
            $("#form_date").trigger('submit');
        }
    });

    $(document).on('click', '.info_periksa', function(e){
        let type        = $(this).data('type');
        let tanggal     = $(this).data('tanggal');
        var table       = $("#tabledaftarstatus");
        $(".btn-pdf").attr('href', $(".btn-pdf").data('url')+'?type='+type+'&tanggal='+tanggal);
        $(".btn-excel").attr('href', $(".btn-excel").data('url')+'?type='+type+'&tanggal='+tanggal);

        if (parseInt(type) === 1) {
            $("#status_periksa").html('CEK DARAH');
        }else if (parseInt(type) === 2){
            $("#status_periksa").html('CEK THORAX');
        }else if (parseInt(type) === 3){
            $("#status_periksa").html('BELUM CEK DARAH');
        }else if (parseInt(type) === 3){
            $("#status_periksa").html('BELUM CEK THORAX');
        }

        table.data('content', table.data('basecontent')+'?type='+type+'&tanggal='+tanggal); 
        var dataTable   = window.alltable['tabledaftarstatus'];
        dataTable.destroy();
        window.createTable(table, dataTable.page.info().length);
        $("#modalStatus").modal('show');
        return false;
    });

    $(document).on('keyup change', '.filterstatus', function(e){
        let filter  = {
            dept: $("#id_dept").val()
        };
        
        var table   = $("#tabledaftarteshome");

        $.each($(".filterstatus"), function(idx, val){
            let dataVal = $(this).val();
            
            if (dataVal != '') {
                if (['date_from', 'date_to'].includes($(this).data('name'))) {
                    dataVal = $(this).val().replace(/\//g,'-') || '0';
                }
            }else {
                dataVal = '';
            }

            filter[$(this).data('name')] = dataVal;
        })

        table.data('content', table.data('basecontent')+'?'+$.param(filter)); 
        var dataTable   = window.alltable['tabledaftarteshome'];
        dataTable.destroy();
        window.createTable(table, dataTable.page.info().length);
        return false;
    });

    $(document).on('keyup change', '.filter_notcomplete', function(e){
        let filter  = {};
        var table   = $("#tablenotcompletecek");

        $.each($(".filter_notcomplete"), function(idx, val){
            let dataVal = $(this).val();
            
            if (dataVal != '') {
                if (['date_from', 'date_to'].includes($(this).data('name'))) {
                    dataVal = $(this).val().replace(/\//g,'-') || '0';
                }
            }else {
                dataVal = '';
            }

            filter[$(this).data('name')] = dataVal;
        })

        table.data('content', table.data('basecontent')+'?'+$.param(filter)); 
        var dataTable   = window.alltable['tablenotcompletecek'];
        dataTable.destroy();
        window.createTable(table, dataTable.page.info().length);
        return false;
    });

    $(document).on('keyup change', '.filter_complete', function(e){
        let filter  = {};
        var table   = $("#tablecompletecek");

        $.each($(".filter_complete"), function(idx, val){
            let dataVal = $(this).val();
            
            if (dataVal != '') {
                if (['date_from', 'date_to'].includes($(this).data('name'))) {
                    dataVal = $(this).val().replace(/\//g,'-') || '0';
                }
            }else {
                dataVal = '';
            }

            filter[$(this).data('name')] = dataVal;
        })

        table.data('content', table.data('basecontent')+'?'+$.param(filter)); 
        var dataTable   = window.alltable['tablecompletecek'];
        dataTable.destroy();
        window.createTable(table, dataTable.page.info().length);
        return false;
    });

    // $(document).ready(function() {
    //     setInterval(() => {
    //         window.location.reload();     
    //     }, 10000);
    // });
</script>