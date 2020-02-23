$.table = function (count = false) {
    if (count === true){
        let i = 0;
        $("table tbody tr").each(function () {
            i++;
            $(this).find('td:first-child').html(i);
        });
    }
    $("table").DataTable({
        "ordering": true,
        "paging": true,
        "columnDefs": [{
            "targets": 'no-sort',
            "orderable": false,
        }],
        "language": {
            "zeroRecords": "هیچ موردی یافت نشد",
            "lengthMenu": "نمایش _MENU_ داده",
            "loadingRecords": "درحال بارگزاری...",
            "processing": "در حال پردازش...",
            "search": "جستجو:",
            "info": "در حال نمایش _PAGE_ صفحه از _PAGES_ صفحه",
            "infoEmpty": "هیچ موردی وجود ندارد!",
            "infoFiltered": "(از _MAX_ داده فیلتر شده)",
            "paginate": {
                "next": "بعدی",
                "previous": "قبلی",
            },
        },
    });
};
