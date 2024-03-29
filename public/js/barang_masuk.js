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
    let id_transaksi_array = document.getElementsByClassName("id_transaksi");
    let id_barang_array = document.getElementsByClassName("id_barang");


    // default hide
    box_modal_alert.hide();
    box_modal_form.hide();
    box_modal_edit_form.hide();

    // modal alert
    for (let i = 0; i < del_btn.length; i++) {
        del_btn[i].addEventListener('click', function () {
            box_modal_alert.slideDown(200);
        });
        yes_btn.on('click', function () {
            let get_id_transaksi = id_transaksi_array[i].innerHTML;
            let get_id_barang = id_barang_array[i].innerHTML;
            window.location.href = `php/delete_barang_masuk.php?id_transaksi=${get_id_transaksi}&id_barang=${get_id_barang}`;
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
        // OTOMATIS ISI TANGGAL PADA INPUT ADD
        var today = new Date().toISOString().split('T')[0];
        document.getElementById('tanggal').value = today;
    });


});







document.getElementById("form_add_barangMasuk").addEventListener("submit", function(e){

    let btn_tambah = document.getElementById("btn_tambah");

    btn_tambah.innerHTML = "Loading...";
    btn_tambah.classList.add("not_allow");
    btn_tambah.disabled = true;

    e.preventDefault();
    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'barang/masuk', true);
    xhr.onload = function(){
        if (xhr.status >= 200 && xhr.status < 300) {
            var response = xhr.responseText;
            document.getElementById("box-modal-form").style.display = 'none';
            document.getElementById('tbody-barang').innerHTML = response;
            document.getElementById('form_add_barangMasuk').reset();
            document.getElementById("btn_tambah").classList.remove('not_allow');
            document.getElementById("btn_tambah").innerHTML = 'Tambah';
            document.getElementById("btn_tambah").disabled = false;
        } else {
            console.log("Error sending data");
        }
    }
    xhr.onerror = function() {
        console.error(xhr.statusText);
    };
    xhr.send(formData);
});