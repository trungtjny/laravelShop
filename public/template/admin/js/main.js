$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url) {
    if (confirm('Bạn muốn xoá dữ liệu danh mục?')) {
        console.log(id, url)
        jQuery.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function(result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else alert("Xoá lỗi vui lòng thử lại");
            }
        })
    }
}



function removeProducts(id, url) {
    if (confirm('Bạn muốn xoá sản phẩm này?')) {
        console.log(id, url)
        jQuery.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function(result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else alert("Xoá lỗi vui lòng thử lại");
            }
        })
    }
}

function addAtiveClass() {
    let currentnlocation = location.href;
    let parentItem = document.querySelectorAll("nav > ul > li > a ");
    console.log(currentnlocation);
    console.log(parentItem);
    for (var i = 0; i < parentItem.length; i++) {
        console.log(parentItem[7])
        if (currentnlocation.includes(parentItem[i].href)) {
            parentItem[i].className += " active";
            parentItem[i].parentElement.className += 'menu-is-opening menu-open'
        }
    }
    let menuIem = document.querySelectorAll(".sidebar ul li ul li a");
    let menuLength = menuIem.length;
    for (var i = 0; i < menuLength; i++) {
        if (currentnlocation === menuIem[i].href) {
            menuIem[i].className += " active"
        }
    }
}
addAtiveClass();


$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".statusOrder").change(function() {
        let status = $(this).val();
        let order_id = $(this).parent().parent().find('.order_id').val();
        datas = {
            'order_id': order_id,
            'order_status': status
        };
        console.log(datas);
        $.ajax({
            type: "POST",
            url: "/admin/order/update",
            data: datas,
            dataType: "JSON",
            success: function(response) {
                showResult(response);
            }
        });
    });
    $('#confirmOrder').click(function(e) {
        e.preventDefault();
        let status = 1;
        let order_id = $('#order_id').val();
        datas = {
            'order_id': order_id,
            'order_status': status
        };
        $.ajax({
            type: "POST",
            url: "/admin/order/update",
            data: datas,
            dataType: "JSON",
            success: function(response) {
                showResult(response);
            }
        });
    });
    /* $('.acceptOrder').click(function(e) {
        e.preventDefault();
        alert("AAA");
    }); */
    $('.acceptOrder').click(function(e) {
        e.preventDefault();
        let order_id = $(this).find('input').val();
        datas = {
            'order_id': order_id,
        };
        $.ajax({
            type: "POST",
            url: "/shipper/add",
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
        setTimeout(reloadPage, 0);
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

function setActive_sale(id, status) {
    jQuery.ajax({
        type: 'POST',
        datatype: 'JSON',
        data: { id: id, status: status },
        url: '/admin/products/activesale',
        success: function(response) {
            showResult(response);
        }
    })
}

function setActive(id, status) {
    jQuery.ajax({
        type: 'POST',
        datatype: 'JSON',
        data: { id: id, status: status },
        url: '/admin/products/active-products',
        success: function(response) {
            showResult(response);
        }
    })
}