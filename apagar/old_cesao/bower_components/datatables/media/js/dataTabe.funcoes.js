$(document).ready(function () {
    //$.cookie("pegaId", 0);
    var table = $('#dataTables-example').DataTable({
        responsive: true,
        pagingType: "full_numbers",
        "dom": 'TC<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "bower_components/datatables/media/swf/copy_csv_xls_pdf.swf",
            "sRowSelect": "single",
            "aButtons": [
                "copy",
                "print",
                {
                    "sExtends": "collection",
                    "sButtonText": "Save",
                    "aButtons": ["xls", "pdf"]
                }]
        }

    });
    new $.fn.dataTable.ColReorder(table);
    $('#dataTables-example tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');
        if ($('.DTTT_selected').length) {
            pegaId = $(this).attr('id');
            console.log(pegaId);
            $.cookie("pegaId", pegaId);
        }else{
            $.cookie("pegaId", 0);
            console.log($.cookie("pegaId"));
        }
    });

    $('#button').click(function () {
        alert(table.rows('.selected').data().length + ' row(s) selected');
    });

});