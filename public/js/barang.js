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

    // modal edit form
    let box_modal_edit_form = $("#box-modal-edit-form");
    let edit_btn = $(".edit-btn");
    let id_barang_array = document.getElementsByClassName("id_barang");


    // default hide
    box_modal_alert.hide();
    box_modal_form.hide();
    box_modal_edit_form.hide();

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
    for (let i = 0; i < edit_btn.length; i++) {
        let id_barang = id_barang_array[i].innerHTML;
        edit_btn[i].addEventListener('click', function () {
            // AJAX
            $.ajax({
                url: `barang/get_data/id_barang/${id_barang}`,
                method: "GET",
                success: function (data) {
                    box_modal_edit_form.html(data);
                    box_modal_edit_form.show(200);
                },
                error: function (xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        });
    }


});

function delete_data(id, nama_barang) {
    let yes_btn = $("#yes-btn");
    let box_modal_alert = $("#box-modal-alert");
    $('#txt-box-modal-alert').text(`Hapus Barang ${nama_barang}?`);
    let tbody_barang = $("#tbody-barang");
    box_modal_alert.slideDown(200);
    yes_btn.on('click', function () {
        $.ajax({
            url: `barang/del/${id}`,
            method: "POST",
            success: function (data) {
                tbody_barang.html(data);
            },
            error: function (xhr, status, error) {
                console.error("Error: " + error);
            }
        });
    });
}