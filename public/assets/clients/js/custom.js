$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.addToCart-btn').click(function(e) {
        e.preventDefault();
        let product_id = $(this).closest('.product-data').find('.product_id').val();
        let product_qty = $(this).closest('.product-data').find('.quantity-input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'quantity': product_qty,
            },
            dataType: "JSON",
            success: function(response) {
                showResult(response)
            }
        });
    });
    $('.increment-btn').click(function(e) {

        e.preventDefault();
        let inc_value = $(this).closest('.product-data').find('.quantity-input').val();
        let value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            console.log(value);
            $(this).closest('.product-data').find('.quantity-input').val(value);
        }
    });
    $('.decrement-btn').click(function(e) {

        e.preventDefault();
        let inc_value = $(this).closest('.product-data').find('.quantity-input').val();
        let value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            console.log(value);
            $(this).closest('.product-data').find('.quantity-input').val(value);
        }
    });

    $('.btn-delete-cart').click(function(e) {
        e.preventDefault();
        let product_id = $(this).closest('.product-data').find('.product_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/remove-cart-item",
            data: {
                'product_id': product_id,
            },
            dataType: "JSON",
            success: function(response) {
                showResult(response);
            }
        });
    });

    $('.changeQuantity').click(function(e) {
        e.preventDefault();
        let product_id = $(this).closest('.product-data').find('.product_id').val();
        let quantity_Input = $(this).closest('.product-data').find('.quantity-input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        datas = {
            'product_id': product_id,
            'quantity': quantity_Input,
        };
        $.ajax({
            type: "POST",
            url: "/update-cart",
            data: datas,
            dataType: "JSON",
            success: function(response) {
                showResult(response);
            }
        });
    });
});

function showResult(response) {
    if (response.result == 'true') {
        new swal("", response.status, "success");
        reloadPage();
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Lỗi...',
            text: response.status,
        })
    }
}

function reloadPage() {
    $('body').click(function(e) {
        window.location.reload();
    });
}

function sxss() {
    let url = new URL(location.href);
    let params = new URLSearchParams(url.search);

    //Add a second foo parameter.
    params.append('foo', 4);
    console.log(params)
}

function addAtive() {
    let currentnlocation = location.href;

    let menuIem = document.querySelectorAll(".list-group-item");
    let menuLength = menuIem.length;
    for (var i = 0; i < menuLength; i++) {
        if (currentnlocation === menuIem[i].href) {
            menuIem[i].className += " active"
        }
    }
}
addAtive();