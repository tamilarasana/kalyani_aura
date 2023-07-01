function showError(field, message){
    if(!message){
        $("#" + field)
            .addClass("is-valid")
            .removeClass("is-invalid")
            .siblings(".invalid-feedback")
            .text("");
    }else{
        $("#" + field)
            .addClass("is-invalid")
            .removeClass("is-valid")
            .siblings(".invalid-feedback")
            .text(message);
    }
}

function removeValidtionClasses(from){
    $(from).each(function () {
        $(from).find(":input").removeClass("is-valid is-invalid");
    })
}

function showMessage(type, message){
    return ` <div class="alert alert-${type}" role="alert">
    <span class="fe fe-minus-circle fe-16 mr-2"></span> ${message} </div>`
}