window.addEventListener('DOMContentLoaded', event => {
    initUpdatePassword();
    initForm();
});

function initUpdatePassword() {
    let isUpdatePassword = $('#isUpdatePassword');
    let updatePasswordArea = $('#updatePasswordArea');

    updatePasswordArea.hide();

    isUpdatePassword.on('change', function(e) {
        console.log('isUpdatePassword changed');
        const isChecked = e.target.checked;

        if(isChecked) {
            updatePasswordArea.show();
        } else {
            updatePasswordArea.hide();
        }
    });
}

function initForm () {
    $('#updateUserForm').on('reset', function(e) {
        $('#isUpdatePassword').prop('checked', false);
        $('#updatePasswordArea').hide();
    })
}