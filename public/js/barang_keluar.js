document.getElementById('box-modal-form').style.display = 'none';
document.getElementById('box-modal-alert').style.display = 'none';


$(document).ready(function () {

    // navbar
    let navbar = $("#nav");
    let btn_show = $("#btn_show");

    // modal alert
    let box_modal_alert = $("#box-modal-alert");
    let del_btn = $(".delete-btn");
    let yes_btn = $("#yes-btn");
    let cancel_btn = $("#cancel-btn");

    // modal add form
    let close_icon_add = $("#close-icon-add");
    let box_modal_form = $("#box-modal-form");
    let btn_add = $("#btn-add");
    let show_data_barang = $("#show-data-barang");
    let id_barang = $("#id_barang");

    // modal delete
    let id_transaksi_array = document.getElementsByClassName("id_transaksi");
    let id_barang_array = document.getElementsByClassName("id_barang");

    id_barang.on('input', function(){
        // AJAX
        $.ajax({
            url: `./php/show_data_barang.php?id_barang=${id_barang.val()}`,
            method: "GET",
            success: function (data) {
                show_data_barang.html(data);
                show_data_barang.show(200);
            },
            error: function (xhr, status, error) {
                console.error("Error: " + error);
            }
        });
    });


    // default hide
    box_modal_alert.hide();
    box_modal_form.hide();

    // modal alert
    for (let i = 0; i < del_btn.length; i++) {
        del_btn[i].addEventListener('click', function () {
            box_modal_alert.slideDown(200);
        });
        yes_btn.on('click', function () {
            let get_id_barang = id_barang_array[i].innerHTML;
            let get_id_transaksi = id_transaksi_array[i].innerHTML;
            window.location.href = `php/delete_barang_keluar.php?id_transaksi=${get_id_transaksi}&id_barang=${get_id_barang}`;
        });
    }
    cancel_btn.click(function () {
        box_modal_alert.slideUp(200);
    });
    yes_btn.click(function () {
        box_modal_alert.slideUp(200);
    });

    // navbar
    btn_show.click(function () {
        navbar.toggle(100);
    });

    // modal form
    close_icon_add.click(function () {
        box_modal_form.hide(200);
    });
    btn_add.click(function () {
        box_modal_form.show(200);
    });


});