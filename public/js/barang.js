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
        edit_btn[i].addEventListener('click', function () {
            var id_barang = $(this).data('id');
            // AJAX
            $.ajax({
                url: `barang/get_data/id_barang/${id_barang}`,
                method: "GET",
                success: function (data) {
                    $("#form_edit").html(data);
                    box_modal_edit_form.show(200);
                },
                error: function (xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        });
    }

    $('#form_edit').submit(function (e) {

        // loading button
        $("#btn_edit").addClass('not_allow');
        $("#btn_edit").html('Loading...');
        $("#btn_edit").prop("disabled", true);

        e.preventDefault();
        var formData = $(this).serialize();
        var id_barang = $("#id_barang").val();
        $.ajax({
            url: `barang/update/${id_barang}`,
            type: 'POST',
            data: formData,
            success: function (data) {
                box_modal_edit_form.hide(150);
                $("#tbody-barang").html(data);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });

    $('.delete-data').click(function () {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        delete_data(id, nama);
    });

});

function delete_data(id, nama_barang) {
    let yes_btn = $("#yes-btn");
    let box_modal_alert = $("#box-modal-alert");
    $('#txt-box-modal-alert').text(`Hapus Barang ${nama_barang}?`);
    box_modal_alert.slideDown(200);
    yes_btn.on('click', function () {
        $.ajax({
            url: `barang/del/${id}`,
            method: "POST",
            success: function (data) {
                $("#tbody-barang").html(data);
            },
            error: function (xhr, status, error) {
                console.error("Error: " + error);
            }
        });
    });
}

document.getElementById("form_add").addEventListener("submit", function (e) {

    let btn_tambah = document.getElementById("btn_tambah");

    btn_tambah.innerHTML = "Loading...";
    btn_tambah.classList.add("not_allow");
    btn_tambah.disabled = true;

    e.preventDefault();
    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'barang/addbarang', true);
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            var response = xhr.responseText;
            document.getElementById("box-modal-form").style.display = 'none';
            document.getElementById('tbody-barang').innerHTML = response;
            document.getElementById('form_add').reset();
            document.getElementById("btn_tambah").classList.remove('not_allow');
            document.getElementById("btn_tambah").innerHTML = 'Tambah';
            document.getElementById("btn_tambah").disabled = false;
        } else {
            console.log("Error sending data");
        }
    }
    xhr.onerror = function () {
        console.error(xhr.statusText);
    };
    xhr.send(formData);
});

// SEARCH WHILE INPUT
document.getElementById('form_cari').addEventListener('input', function (e) {
    var cari = document.getElementById('input_cari').value;

    e.preventDefault();
    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            var response = xhr.responseText;
            document.getElementById('tbody-barang').innerHTML = response;
        } else {
            console.log("Error sending data");
        }
    }
    xhr.open('POST', `caribarang/${cari}`, true);
    xhr.onerror = function () {
        console.error(xhr.statusText);
    };
    xhr.send(formData);
});