<!-- templates/Articles/add.php -->
<div class="articles form">
    <h2>Agregar Artículo</h2>
    <?= $this->Form->create($article) ?>
    <fieldset>
        <?php
            echo $this->Form->control('titulo', ['label' => 'Título']);
            echo $this->Form->control('cuerpo', ['label' => 'Contenido', 'rows' => '3']);
            echo $this->Form->control('publicado', ['label' => 'Publicado']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>