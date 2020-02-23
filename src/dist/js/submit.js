$.submit = function (url = 'undefined.php') {
    $("form").submit(function (e) {
        let that = $(this);
        let formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            async: false,
            success: data => {
                $(that).html(data);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        e.preventDefault();
    });
};