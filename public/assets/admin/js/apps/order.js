$(document).ready(function () {
    // change status
    $('select#status').change(function () {
        let status = $(this).val();
        let url = $('input[name="url"]').val();
        let orderId = $('input[name="url"]').data('id');
        let _token = $('input[name="_token"]').val();
        $.ajax({
            url: url,
            type: 'POST',
            data: {status: status, orderId: orderId, _token: _token},
            success: function (data) {
                swal("Thành công", data, "success");
            },
            error: function (error) {
                swal("Thất bại", "thay đổi thất bại", "warning");
            }
        })
    })
})
