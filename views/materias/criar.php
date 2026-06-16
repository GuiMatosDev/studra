<?php

session_start();

//Icones
require_once '../../config/icones.php';
$icones = obter_icones();

//Validação usuário
if (!isset($_SESSION['usuario_id']))
{
    header('Location: ../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Nova Matéria</title>
    <link rel="stylesheet" href="../../assets/css/forms.css">

    <link 
        rel="icon" 
        type="image/svg+xml" 
        href="../../assets/img/logo-studra.svg"
    >
    
</head>
    <body>

        <div class="form-page">

            <div class="form-container">

                <!-- Header -->

                <div class="form-header">

                    <h1 class="form-title">
                        Nova Matéria
                    </h1>

                    <p class="form-subtitle">
                        Organize seus estudos criando uma nova matéria.
                    </p>

                </div>

                <!-- Form -->

                <form
                    action="../../controllers/materia_controller.php?acao=criar"
                    method="POST"
                >

                    <!-- Nome -->

                    <div class="form-group">

                        <label for="nome">

                            Nome da Matéria

                        </label>

                        <input
                            type="text"
                            id="nome"
                            name="nome"
                            placeholder="Ex: Programação"
                            required
                        >

                    </div>

                    <!-- Descrição -->

                    <div class="form-group">

                        <label for="descricao">

                            Descrição

                        </label>

                        <textarea
                            id="descricao"
                            name="descricao"
                            placeholder="Descreva a matéria..."
                        ></textarea>

                    </div>

                    <!-- Ícone -->

                    <div class="form-group">

                        <label for="iconeSelect">

                            Ícone

                        </label>

                        <select
                            name="icone"
                            id="iconeSelect"
                            required
                        >

                            <?php foreach ($icones as $nome => $icone): ?>

                                <option value="<?= $nome ?>">

                                    <?= $icone ?>
                                    <?= ucfirst($nome) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <!-- Botões -->

                    <div class="form-actions">

                        <a
                            href="../dashboard.php#materias"
                            class="btn btn-secondary"
                        >
                            Voltar
                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Criar Matéria
                        </button>

                    </div>

                </form>

            </div>

        </div>

        <!-- Script -->

        <script>

        const icones = <?= json_encode($icones); ?>;

        const select = document.getElementById('iconeSelect');

        const preview = document.getElementById('iconPreview');

        //Ícone inicial
        preview.textContent = icones[select.value];

        //Troca ao selecionar
        select.addEventListener('change', () => {

            preview.textContent = icones[select.value];
        });

        </script>

</body>
</html>