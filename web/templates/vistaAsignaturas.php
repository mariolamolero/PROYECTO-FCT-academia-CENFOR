<?php ob_start() ?>

			
         
<div id="contenido">

<div class="row">
        <?php foreach ($params['asignaturas'] as $asignatura): ?>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center text-primary"><?= strtoupper($asignatura) ?></h5>
                        <p class="card-text text-center">Recursos disponibles para <?= $asignatura ?></p>
                        <div class="text-center">
                           <a href="index.php?ctl=verBloques&nombre=<?= urlencode($asignatura) ?>" class="btn btn-success">Acceder</a> 

              
    </div>
</a>


                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </div>


<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>
 <!--   ESTO ES PARA HACER FIJAS LAS CARDS
<div class="container py-5">
        <h2 class="text-center mb-4">Mis asignaturas</h2>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Matemáticas</h5>
                        <p class="card-text">Material de Matemáticas</p>
                        <a href="index.php?ctl=matematicas" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Física</h5>
                        <p class="card-text">Material de Física</p>
                        <a href="index.php?ctl=fisica" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Química</h5>
                        <p class="card-text">Material de Química</p>
                        <a href="index.php?ctl=quimica" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Biología</h5>
                        <p class="card-text">Material de Biología</p>
                        <a href="index.php?ctl=biologia" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

<!--PARA HACER LAS CARDS DE MANERA DINAMICA. SOLO APARECERAN A LAS QUE EL ALUMNO ESTÉ INSCRITO -->

