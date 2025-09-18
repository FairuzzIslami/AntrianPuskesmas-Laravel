 // Toggle Password
        document.addEventListener("DOMContentLoaded", function () {
            const toggleIcons = document.querySelectorAll('.toggle-password');

            toggleIcons.forEach(icon => {
                icon.addEventListener('click', function () {
                    const input = this.closest('.input-group').querySelector('input');
                    const eyeIcon = this.querySelector('i');

                    if (input.type === 'password') {
                        input.type = 'text';
                        eyeIcon.classList.remove('fa-eye');
                        eyeIcon.classList.add('fa-eye-slash');
                    } else {
                        input.type = 'password';
                        eyeIcon.classList.remove('fa-eye-slash');
                        eyeIcon.classList.add('fa-eye');
                    }
                });
            });
        });
