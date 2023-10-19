import './bootstrap';

$(function (){
    const successAlert = $('#success-alert');
    if (successAlert.length) {
        setTimeout(function () {
            successAlert.alert('close');
        }, 3000);
    }
});
