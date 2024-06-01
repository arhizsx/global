$(document).ready( function(){

    initializeSigns();

});

window.onload = () => {
    $('#onload').modal('show');
}

$('#onload').on('shown.bs.modal', function() {
    $('#active_chapter_check').focus();
});

$(document).on("shown.bs.modal", "#modal", function(){
    var signbox = $(document).find("#modal").find(".signature");

    signbox.signature( {background: '#fdd700', color: '#000000', thickness: 3} );
    signbox.signature({syncField: '#signatureJSON'});

});

$(document).on("change", ".field_monitor", function(){

    console.log( this.value );
    console.log( $(this).attr("name") );
    console.log( $(this).data() );
    console.log($(this).closest("form.ajax_form").attr("id"));

    var element = $(this);
    var form_id =  $(this).closest("form.ajax_form").attr("id");
    var field_name =  $(this).attr("name");
    var field_value =  $(this).val();
    var field_data =  $(this).data();

    if(field_name == "country"){
        if(field_value == "PH"){
            $(this).closest(".row").find("[name='region']").parent().removeClass("d-none");
            $(this).closest(".row").find("[name='province']").parent().removeClass("d-none");

        } else {
            $(this).closest(".row").find("[name='region']").parent().addClass("d-none");
            $(this).closest(".row").find("[name='province']").parent().addClass("d-none");
        }


    }

    if(field_name == "region"){

    }

    if(field_name == "province"){

    }

    if(field_name == "city"){

    }

    var action = "field_monitor";
    var field_update = AjaxAction(
            {
                action: action,
                form_id: form_id,
                field_name: field_name,
                field_value: field_value,
                field_data: field_data
            },
            element
        );

    $.when(field_update).done(function( field_update ){
        console.log("Ajax Action Done");
        console.log(field_update.data);

        var region = $(document).find(".field_monitor[name='region']");
        var province = $(document).find(".field_monitor[name='province']");
        var city = $(document).find(".field_monitor[name='city']");

        if(field_name == "country"){

            region.empty();
            province.empty();
            city.empty();
            region.append("<option>--</option>")

            $.each( field_update.data.regions, function(k, v){

                region.append("<option value='" + v.region + "'>" + v.region + "</option>")

            });

        }

        if(field_name == "region"){

            province.empty();
            city.empty();

            province.append("<option>--</option>")
            $.each( field_update.data.provinces, function(k, v){

                province.append("<option value='" + v.province + "'>" + v.province + "</option>")

            });

        }

        if(field_name == "province"){


            city.empty();
            city.append("<option>--</option>")
            $.each( field_update.data.cities, function(k, v){

                city.append("<option value='" + v.lgu + "'>" + v.lgu + "</option>")

            });

        }


    });

});

$(document).on("change", ".field_monitor_multi", function(){

    console.log( this.value );
    console.log( $(this).attr("name") );
    console.log( $(this).data() );
    console.log($(this).closest("form.ajax_form").attr("id"));

    var element = $(this);
    var form_id =  $(this).closest("form.ajax_form").attr("id");
    var field_name =  $(this).attr("name");
    var field_value =  $(this).val();
    var field_group_id = $(this).attr("data-fieldgroup_id");
    var field_group = $(this).attr("data-fieldgroup_name");

    if(field_name == "country"){
        if(field_value == "PH"){
            $(this).closest(".row").find("[name='region']").parent().removeClass("d-none");
            $(this).closest(".row").find("[name='province']").parent().removeClass("d-none");

        } else {
            $(this).closest(".row").find("[name='region']").parent().addClass("d-none");
            $(this).closest(".row").find("[name='province']").parent().addClass("d-none");
        }
    }

    if(field_name == "region"){

    }

    if(field_name == "province"){

    }

    if(field_name == "city"){

    }

    var action = "field_monitor_multi";
    var field_update = AjaxAction(
            {
                action: action,
                form_id: form_id,
                field_name: field_name,
                field_value: field_value,
                field_group_id: field_group_id,
                field_group: field_group,
            },
            element
        );

    $.when(field_update).done(function(){
        console.log("Ajax Action Done");
    });

});

$(document).on("click", ".ajax_btn", function(e){

    e.preventDefault();

    var element = $(this);
    var element_data = element.data();
    var form = $(document).find(".ajax_form").attr("id");

    console.log(element);
    console.log(element_data);

    switch( $(this).data("action")  ){

        case "affix-signature":


            $(document).find("#modal").modal("show");
            $(document).find("#modal").find(".ajax_btn[data-action='set-signature']").attr("data-signbox", element.data("signbox"));

        break;

        case "clear-signature":

            element.parent().find(".signature").signature("clear");

        break;

        case "set-signature":

            var signbox = $(this).attr("data-signbox");

            console.log(signbox);

            var canvas_width = $(document).find("#modal").find(".signature").find("canvas").width();
            var canvas_height = $(document).find("#modal").find(".signature").find("canvas").height();

            var signature = element.parent().parent().find("#signatureJSON").val();

            var target = $(document).find(".signature[data-signbox='" + signbox + "']");
            var target_box = $(document).find(".signature_box[data-signbox='" + signbox + "']");
            var target_textarea = $(document).find(".field_monitor_multi[data-signbox='" + signbox + "']");

            target_textarea.text(signature).change();

            target_box.removeClass("d-none");

            target.css("width", canvas_width);
            target.css("height", canvas_height);

            target.signature({background: '#fdd700', color: '#000000', thickness: 3});
            target.signature("enable").signature("draw", signature).signature("disable");

            $(document).find("#modal").modal("hide");

        break;

        case "fieldgroup-add":


            var target_box =  $(this).closest(".row").closest(".row");
            var fieldgroup_box = target_box.find(".fieldgroup_box[data-fieldgroup_id='0']");
            var fieldgroup_name = $(this).data("fieldgroup_name");

            var data = {
                action: "fieldgroup_add",
                form_id: form,
                fieldgroup_name: fieldgroup_name
            }

            var btn = AjaxAction(data, element);

            $.when(btn).done(function(id){
                target_box.prepend(
                    '<div class="fieldgroup_box row p-0 m-0" data-fieldgroup_name="' + fieldgroup_name + '" data-fieldgroup_id="' + id + '" >' +
                        fieldgroup_box.html() +
                        '<div class="col-12 py-0 pe-3 mb-1 d-flex flex-row-reverse"><button  style="margin-top: -10px;" class="py-0 btn-danger btn btn-sm ajax_btn" data-action="fieldgroup_remove" data-fieldgroup_name="' + fieldgroup_name + '" data-fieldgroup_id="' + id + '" >remove</button></div>' +
                    '</div>'
                );

                target_box.find(".fieldgroup_box[data-fieldgroup_id='" + id + "']").find(".form-control").attr("data-fieldgroup_id", id);


            });

        break;

        case "active_chapter_check":

            let active_chapter_check = $(document).find("input#active_chapter_check");
            let active_chapter_check_value = active_chapter_check.val();

            active_chapter_check.attr("disabled", true);


            var data = {
                action: "active_chapter_check",
                active_chapter: active_chapter_check_value
            }

            var btn = AjaxAction(data, element);

            $.when(btn).done(function(btn){

                active_chapter_check.attr("disabled", false);

                if( btn.error == false ){

                    console.log(btn.data);

                    $(document).find("#onload").modal("hide");

                    $(document).find("input[name='chapter_name']").val( btn.data.chapter_name ).change();
                    $(document).find("input[name='chapter_serial_number']").val( btn.data.chapter_serial_number ).change();
                    $(document).find("select[name='chapter_category']").val( btn.data.chapter_type.charAt(0).toUpperCase() + btn.data.chapter_type.slice(1) ).change();

                } else {

                    console.log(btn.message);

                }


            });

        break;

        case "active_lady_chapter_check":

            let active_lady_chapter_check = $(document).find("input#active_chapter_check");
            let active_lady_chapter_check_value = active_lady_chapter_check.val();

            active_lady_chapter_check.attr("disabled", true);

            var data = {
                action: "active_lady_chapter_check",
                active_lady_chapter_check: active_lady_chapter_check_value
            }

            var btn = AjaxAction(data, element);

            $.when(btn).done(function(id){

                active_lady_chapter_check.attr("disabled", false);

                console.log(btn);

            });

        break;

        case "triskelion-registration-continue":

            $(document).find("#confirm_registration").modal("show");

        break;

        case "triskelion-registration-confirm":

            var old_text = element.text();
            var old_bg = element.css("background-color");

            var data = {
                action: "triskelion_registration_confirm"
            }


            var btn = AjaxAction(data, element);

            element.attr("disabled", "disabled");
            element.text("Please wait...");

            $.when(btn).done(function(btn){


                if(btn.error == false ){

                    console.log(btn);
                    element.removeAttr("disabled");
                    element.css("background-color", old_bg);
                    element.text(old_text);

                    location.reload();

                } else {

                    alert("Error encountered");
                }

            });


        break;

        case "lady-triskelion-registration-continue":

            $(document).find("#confirm_registration").modal("show");

            break;

        case "lady-triskelion-registration-confirm":

            var old_text = element.text();
            var old_bg = element.css("background-color");

            var data = {
                action: "lady_triskelion_registration_confirm"
            }


            var btn = AjaxAction(data, element);

            element.attr("disabled", "disabled");
            element.text("Please wait...");

            $.when(btn).done(function(btn){


                if(btn.error == false ){

                    console.log(btn);
                    element.removeAttr("disabled");
                    element.css("background-color", old_bg);
                    element.text(old_text);

                    location.reload();

                } else {

                    alert("Error encountered");
                    element.removeAttr("disabled");
                    element.css("background-color", old_bg);
                    element.text(old_text);

                }

            });


        break;

        case "neophyte-application-continue":

            $(document).find("#confirm_registration").modal("show");

        break;

        case "neophyte-application-confirm":

            var old_text = element.text();
            var old_bg = element.css("background-color");

            var data = {
                action: "neophyte_application_confirm"
            }


            var btn = AjaxAction(data, element);

            element.attr("disabled", "disabled");
            element.text("Please wait...");

            $.when(btn).done(function(btn){


                if(btn.error == false ){

                    console.log(btn);
                    element.removeAttr("disabled");
                    element.css("background-color", old_bg);
                    element.text(old_text);

                    location.reload();

                } else {

                    alert("Error encountered");
                }

            });


        break;

        case "chapter-history-continue":

            $(document).find("#confirm_registration").modal("show");

        break;

        case "chapter-history-confirm":

            var old_text = element.text();
            var old_bg = element.css("background-color");

            var data = {
                action: "chapter_history_confirm"
            }


            var btn = AjaxAction(data, element);

            element.attr("disabled", "disabled");
            element.text("Please wait...");

            $.when(btn).done(function(btn){


                if(btn.error == false ){

                    console.log(btn);
                    element.removeAttr("disabled");
                    element.css("background-color", old_bg);
                    element.text(old_text);

                    location.reload();

                } else {

                    alert("Error encountered");
                }

            });


        break;



        case "chapter-registration-continue":

            $(document).find("#confirm_registration").modal("show");

        break;

        case "chapter-registration-confirm":

            var old_text = element.text();
            var old_bg = element.css("background-color");

            var data = {
                action: "chapter_registration_confirm"
            }


            var btn = AjaxAction(data, element);

            element.attr("disabled", "disabled");
            element.text("Please wait...");

            $.when(btn).done(function(btn){


                if(btn.error == false ){

                    console.log(btn);
                    element.removeAttr("disabled");
                    element.css("background-color", old_bg);
                    element.text(old_text);

                    location.reload();

                } else {

                    alert("Error encountered");
                }

            });


        break;

        case "tgs-chapter-registration-continue":

            $(document).find("#confirm_registration").modal("show");

        break;

        case "tgs-chapter-registration-confirm":

            var old_text = element.text();
            var old_bg = element.css("background-color");

            var data = {
                action: "tgs_chapter_registration_confirm"
            }


            var btn = AjaxAction(data, element);

            element.attr("disabled", "disabled");
            element.text("Please wait...");

            $.when(btn).done(function(btn){


                if(btn.error == false ){

                    console.log(btn);
                    element.removeAttr("disabled");
                    element.css("background-color", old_bg);
                    element.text(old_text);

                    location.reload();

                } else {

                    alert("Error encountered");
                }

            });

        break;

        case "new-chapter-application-continue":

            $(document).find("#confirm_registration").modal("show");

        break;

        case "new-chapter-application-confirm":

            var old_text = element.text();
            var old_bg = element.css("background-color");

            var data = {
                action: "new_chapter_application_confirm"
            }


            var btn = AjaxAction(data, element);

            element.attr("disabled", "disabled");
            element.text("Please wait...");

            $.when(btn).done(function(btn){


                if(btn.error == false ){

                    console.log(btn);
                    element.removeAttr("disabled");
                    element.css("background-color", old_bg);
                    element.text(old_text);

                    location.reload();

                } else {

                    alert("Error encountered");
                }

            });

        break;

        case "delegate-chapter-continue":

            $(document).find("#delegate_modal").modal("show");

        break;

        case "council-registration-continue":

            $(document).find("#confirm_registration").modal("show");

        break;

        case "council-registration-confirm":

            var old_text = element.text();
            var old_bg = element.css("background-color");

            var data = {
                action: "council_registration_confirm"
            }


            var btn = AjaxAction(data, element);

            element.attr("disabled", "disabled");
            element.text("Please wait...");

            $.when(btn).done(function(btn){


                if(btn.error == false ){

                    console.log(btn);
                    element.removeAttr("disabled");
                    element.css("background-color", old_bg);
                    element.text(old_text);

                    location.reload();

                } else {

                    alert("Error encountered");
                }

            });

        break;

        default:

            var btn = AjaxAction(element_data, element)

        break;

    }


});

function AjaxAction(data, element) {

    var ajax_resp = new $.Deferred();

    $.ajax({
        url: "/ajax",
        method: "POST",
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend:function(){
        },
        success: function (resp){
            ajax_resp.resolve(resp);
        },
        complete: function(){
        },
        error: function(){
            ajax_resp.fail("Error in Ajax Call");
        }
    });


    return ajax_resp.promise();

}


function initializeSigns(){
    var signs = $(document).find(".ajax_form").find(".signature_box");

    $.each(signs, function(k, v){

        var signbox = $(v).attr("data-signbox");
        var target = $(v).find("textarea[data-signbox='" + signbox + "']");
        $(v).removeClass("d-none");

        var target_signbox = $(v).find(".signature[data-signbox='" + signbox + "']");

        if( target.val().length > 0 ){

            target_signbox.css("height", 200);
            target_signbox.css("width", "60%");
            target_signbox.signature({background: '#fdd700', color: '#000000', thickness: 3}).signature("disable");

            target_signbox.signature("enable").signature("draw", target.val() ).signature("disable");
        }

    });

}

