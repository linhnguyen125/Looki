$(document).ready(function () {
    // add cart
    $('.add-cart').click(function () {
        let target_class = $(this).data('target_class');
        let input = $('.' + target_class);
        let name = input.data('name');
        let id = input.data('id');
        let thumbnail = input.data('thumbnail');
        let price = input.data('price');
        let discount = input.data('discount');
        let qty = input.val();
        let slug = input.data('slug');
        let url = input.data('url');
        let _token = $('input[name="_token"]').val();
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                name: name, id: id, thumbnail: thumbnail, price: price, discount: discount,
                qty: qty, slug: slug, _token: _token
            },
        }).done(function (data) {
            $('div#cart').html(data.html);
            $('div#empty').remove();
            $('#cart-count').html(data.cart_count);
            swal("Thành công", data.message, "success");
        })
    });

    // update cart
    $('.update-cart').click(function () {
        let target_rowId = $(this).data('row_id');
        let input = $('input.' + target_rowId);
        let qty = input.val();
        let url = input.data('url_update');
        let _token = $('input[name="_token"]').val();
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                rowId: target_rowId, qty: qty, _token: _token
            },
        }).done(function (data) {
            let subtotal = `
                ${data.subtotal} đ
            `;
            $('span.' + target_rowId).html(subtotal);
            let total = `
                Tổng thanh toán: ${data.total} đ
            `;
            $('.total').html(total);
        })
    });

    // delete row
    $('.delete').click(function () {
        let target_rowId = $(this).data('row_id');
        let input = $('input.' + target_rowId);
        let url = input.data('url_delete');
        let _token = $('input[name="_token"]').val();
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                rowId: target_rowId, _token: _token
            },
        }).done(function (data) {
            let a = document.getElementById(target_rowId);
            $(a).parent().parent().remove();
            if (data.total != '0') {
                let total = `
                Tổng thanh toán: ${data.total} đ
            `;
                $('.total').html(total);
                $('#cart-count').html(data.cart_count);
                $('div#cart').html(data.html);
                swal("Thành công", data.message, "success");
            }else {
                let image = input.data('img');
                let home = input.data('home');
                let html = `
                    <div class="text-center" style="min-height: 300px">
                        <span class="mb-3">
                        <img src="${image}" alt="null">
                        </span>
                        <p class="mb-3">Giỏ hàng của bạn còn trống</p>
                        <a href="${home}" class="btn btn--md btn-dark px-5">MUA NGAY</a>
                    </div>
                `;
                $('#cart-wp').html(html);
                $('div#cart').html(data.html);
                $('#cart-count').html(data.cart_count);
                swal("Thành công", data.message, "success");
            }

        })
    });
})
