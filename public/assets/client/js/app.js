$(document).ready(function () {
    $('.add-cart').click(function () {
        let target_class = $(this).data('target_class');
        let input = $('.' + target_class);
        let name = input.data('name');
        let id = input.data('id');
        let thumbnail = input.data('thumbnail');
        let price = input.data('price');
        let discount = input.data('discount');
        let qty = input.val();
        let url = input.data('url');
        let _token = $('input[name="_token"]').val();
        $.ajax({
            url: url,
            type: 'POST',
            data: {name: name, id: id, thumbnail: thumbnail, price: price, discount: discount, qty: qty, _token: _token},
        }).done(function (data) {
            swal("Thành công", data, "success");
        })
    })
})
