/* ============================ Show Password ========================= */
const showPassword = () => {
    const passwordInput = document.getElementById('floatingAdminPassword');
    passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
};
// ================wallet===================
$(document).on('click', '.wallet-pending', function() {
    $('#wallet-pending-content').show();
    $('#wallet-history-content').hide();
    $('#add-list-option').hide();
});

$(document).on('click', '.wallet-history', function() {
    $('#wallet-pending-content').hide();
    $('#wallet-history-content').show();
    $('#add-list-option').hide();
});
$(document).on('click', '.add-list-option', function() {
    $('#wallet-pending-content').hide();
    $('#wallet-history-content').hide();
    $('#add-list-option').show();
});
// =======================user====================
$(document).on('click', '.user-pending', function() {
    $('#user-pending-content').show();
    $('#user-approve-block').hide();
    $('#user-list').hide();
    $('#transfer-users').hide();
});
$(document).on('click', '.user-list', function() {
    $('#user-pending-content').hide();
    $('#user-approve-block').hide();
    $('#user-list').show();
    $('#transfer-users').hide();

});
$(document).on('click', '.create-user', function() {
    $('#user-pending-content').hide();
    $('#user-approve-block').show();
    $('#user-list').hide();
    $('#transfer-users').hide();
});
$(document).on('click', '.transfer-user', function() {
    $('#user-pending-content').hide();
     $('#user-approve-block').hide();
    $('#user-list').hide();
    $('#transfer-users').show();
});
// ===============settings===============

$(document).on('click', '.settings-general', function() {
    $('#general-setting-tab').show();
     $('#pg-setting-tab').hide();
    $('#notifications').hide();
    $('#tutorial').hide();
    
});
$(document).on('click', '.settings-pg', function() {
    $('#general-setting-tab').hide();
     $('#pg-setting-tab').show();
    $('#notifications').hide();
    $('#tutorial').hide();
});
$(document).on('click', '.settings-notifications', function() {
    $('#general-setting-tab').hide();
     $('#pg-setting-tab').hide();
    $('#notifications').show();
    $('#tutorial').hide();
});
$(document).on('click', '.settings-tutorials', function() {
    $('#general-setting-tab').hide();
     $('#pg-setting-tab').hide();
    $('#notifications').hide();
    $('#tutorial').show();
});


