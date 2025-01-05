document.addEventListener("DOMContentLoaded", function() {
    const radios = document.querySelectorAll('.user-radio');
    const userIdInput = document.getElementById('user_id');
    const fullNameInput = document.getElementById('full_name');
    const rutInput = document.getElementById('rut');
    const userTypeSelect = document.getElementById('user_type');

    radios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                const selectedUser = allUsers.find(user => user.user_id == this.value);
                userIdInput.value = selectedUser.user_id;
                fullNameInput.value = selectedUser.full_name;
                rutInput.value = selectedUser.rut;
                userTypeSelect.value = selectedUser.user_type;
            }
        });
    });
});