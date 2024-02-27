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
    let id_admin_array = document.getElementsByClassName("id_admin");


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
            let get_id_admin = id_admin_array[i].innerHTML;
            window.location.href = 'php/delete_admin.php?id_admin=' + get_id_admin;
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
    for (let i = 0; i < edit_btn.length; i++) {
        let id_admin = id_admin_array[i].innerHTML;
        edit_btn[i].addEventListener('click', function () {
            // AJAX
            $.ajax({
                url: `./php/get_admin.php?id_admin=${id_admin}`,
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