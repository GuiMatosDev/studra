<?php

session_start();

require_once '../../config/database.php';

require_once '../../models/materia_model.php';

require_once '../../config/icones.php';

$model = new materia_model($pdo);

$materias = $model->listar_arquivadas(
    $_SESSION['usuario_id']
);

$icones = obter_icones();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>
        Matérias Arquivadas
    </title>

    <link
        rel="stylesheet"
        href="../../assets/css/dashboard.css"
    >

</head>

<body>

<div class="content-area">

    <div class="section-card">

        <div class="view-header">

            <h1>
                Matérias Arquivadas
            </h1>

            <a
                href="../dashboard.php#materias"
                class="btn btn-primary"
            >
                Voltar
            </a>

        </div>

        <div class="subjects-grid">

            <?php foreach ($materias as $materia): ?>

                <a
                    href="visualizar.php?id=<?php echo $materia['id']; ?>"
                    class="subject-card"
                >

                    <div class="subject-icon">

                        <?php
                            echo $icones[$materia['icone']] ?? '📘';
                        ?>

                    </div>

                    <div class="subject-content">

                        <h3>
                            <?php echo $materia['nome']; ?>
                        </h3>

                        <span class="text-gray">
                            Arquivada
                        </span>

                    </div>

                </a>

            <?php endforeach; ?>

        </div>

    </div>

</div>

</body>
</html>