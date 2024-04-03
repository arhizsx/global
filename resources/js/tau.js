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
