$(document).ready(function () {
    // checkout
    $('a.checkout').click(function () {
        let phone = $('input[name="phone"]').val();
        let province = $('select[name="province"]').val();
        let district = $('select[name="district"]').val();
        let ward = $('select[name="ward"]').val();
        let more = $('input[name="more"]').val();
        let note = $('textarea[name="note"]').val();
        let _token = $('input[name="_token"]').val();
        let url = $('input#url').val();
        swal.fire("Đang xử lý", "...xin vui lòng chờ trong giây lát!");
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                phone: phone, province: province, district: district, ward: ward, more: more,
                note: note, _token: _token
            },
            success: function(data){
                Swal.fire("Thành Công", data.message, "success");
                $('div.order').html(data.html);
            },
            error: function (error) {
                if(error.responseJSON.errors.phone){
                    let html = errorMessage(error.responseJSON.errors.phone);
                    $('div.phone').html(html);
                }
                if(error.responseJSON.errors.more){
                    let html = errorMessage(error.responseJSON.errors.more);
                    $('div.more').html(html);
                }
                $('button.swal2-confirm').click();
            }
        })
    });
})

function errorMessage(html) {
    let errorMsg = `
            <small
                class="text-danger">${html}
            </small>
        `;
    return errorMsg;
}
