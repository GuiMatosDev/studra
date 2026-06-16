const esconderSenhas = document.querySelectorAll('.esconder-senha');

esconderSenhas.forEach(toggle => {

    toggle.addEventListener('click', () => {

        const targetId = toggle.getAttribute('data-target');

        const input = document.getElementById(targetId);

        if (input.type === 'password') {

            input.type = 'text';

        } else {

            input.type = 'password';

        }

    });

});