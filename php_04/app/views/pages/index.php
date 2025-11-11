<h1><?php echo $data['titulo']; ?></h1>

<h2>Lista de usuarios</h2>
<ul>
<?php foreach($data['usuarios'] as $usuario): ?>
    <li>
        <strong><?php echo $usuario->nombre; ?></strong> — 
        <?php echo $usuario->correo; ?>
    </li>
<?php endforeach; ?>
</ul>
