//Mostrar / Esconder Senha

const esconderSenhas = document.querySelectorAll('.esconder-senha');

esconderSenhas.forEach(toggle => {

    toggle.addEventListener('click', () => {

        const targetId = toggle.getAttribute('data-target');
        const input = document.getElementById(targetId);

        const olhoIcone = toggle.querySelector('.olho-ícone');
        const olhoFechadoIcone = toggle.querySelector('.olho-fechado-ícone');

        if (input.type === 'password') {

            input.type = 'text';

            if (olhoIcone) olhoIcone.classList.add('hidden');
            if (olhoFechadoIcone) olhoFechadoIcone.classList.remove('hidden');

        } else {

            input.type = 'password';

            if (olhoIcone) olhoIcone.classList.remove('hidden');
            if (olhoFechadoIcone) olhoFechadoIcone.classList.add('hidden');
        }

    });

});

//Efeitos

const formInputs = document.querySelectorAll('.form-input');

formInputs.forEach(input => {

    input.addEventListener('focus', () => {

        if (input.parentElement) {
            input.parentElement.style.transform = 'scale(1.02)';
        }

    });

    input.addEventListener('blur', () => {

        if (input.parentElement) {
            input.parentElement.style.transform = 'scale(1)';
        }

    });

});