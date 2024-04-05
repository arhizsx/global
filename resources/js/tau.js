$(document).ready( function(){

    initializeSigns();

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

    $.when(field_update).done(function(){
        console.log("Ajax Action Done");
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

        default:



            var btn = AjaxAction(element_data, element)

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

