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
        if (!product_qty) product_qty = 1;
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
    $('#btn-update-order').click(function(e) {
        e.preventDefault();
        let input = {
            'fname': $("#fname").val(),
            'lname': $("#lname").val(),
            'id': $("#id").val(),
            'phone': $("#phone").val(),
            'city': $("#city").val(),
            'address': $("#address").val(),
        }

        $.ajax({
            type: "POST",
            url: "/my-orders/update",
            data: input,
            dataType: "JSON",
            success: function(response) {
                showResult(response);
            }
        });
    });
    $('#btn-remove-order').click(function(e) {
        e.preventDefault();
        let input = {
            'id': $("#id").val(),
        }
        $.ajax({
            type: "POST",
            url: "/my-orders/remove",
            data: input,
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

$(document).ready(function() {
    $("#sort").change(function(e) {
        e.preventDefault();
        let sort = $(this).val();
        let queryString = window.location.search;
        let urlParams = new URLSearchParams(queryString);
        if (urlParams.has('sort')) {
            urlParams.set("sort", sort);
        } else urlParams.append("sort", sort);
        let link = window.location.origin + window.location.pathname + "?" +
            urlParams.toString();
        window.location = link;
    });
    $('#searchBtn').click(function(e) {
        e.preventDefault();
        let keyword = $('#keyword').val();
        let queryString = window.location.search;
        let urlParams = new URLSearchParams(queryString);
        if (urlParams.has('keyword')) {
            urlParams.set("keyword", keyword);
        } else urlParams.append("keyword", keyword);
        let link = window.location.origin + window.location.pathname + "?" +
            urlParams.toString();
        window.location = link;
    });
    $("#filter-range-price").click(function(e) {
        e.preventDefault();
        let price_s = $("#amount-begin").val();
        let queryString = window.location.search;
        let urlParams = new URLSearchParams(queryString);
        if (urlParams.has('min')) {
            urlParams.set("min", price_s);
        } else urlParams.append("min", price_s);
        let price_e = $("#amount-end").val();

        if (urlParams.has('max')) {
            urlParams.set("max", price_e);
        } else urlParams.append("max", price_e);
        let link = window.location.origin + window.location.pathname + "?" +
            urlParams.toString();
        window.location = link;
    });
});