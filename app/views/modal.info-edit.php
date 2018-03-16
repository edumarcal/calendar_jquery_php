<div class="modal" tabindex="-1" role="dialog" id="modalEdit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <input type="text" class="form-control" name="title" value="<?= $event->title; ?>" disabled>
        <button type="button" class="close btnEditClose" data-dismiss="modalEdit" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">        
        
        <div class="form-group">
          <label for="description">Descrição</label>
          <textarea class="form-control" name="description" rows="3" disabled><?= $event->description; ?></textarea>
        </div>

        <div class="form-group">
          <label for="data">Dia do evento</label>
          <input class="form-control" type="date" placeholder="Data" name="start" value="<?= $event->start; ?>" disabled>
        </div>

        <div class="form-group">
          <label for="data">Horário incial do evento</label>
          <input class="form-control" type="text" placeholder="Data" name="startHour" disabled>
        </div>
        
        <?php if (isset($event->end)) : ?>
        <div class="form-group">
          <label for="data">Dia final do evento</label>
          <input class="form-control" type="date" placeholder="Data" name="end" value="<?= $event->end; ?>" disabled>
        </div>

        <div class="form-group">
          <label for="data">Horário final do evento</label>
          <input class="form-control" type="text" name="endHour" disabled>
        </div>
        <?php endif; ?>

        <?php if (isset($event->url)) : ?>
        <div class="form-group">
          <label for="data">Acesse: </label>
          <a href="<?= $event->url; ?>" target="_blank" name="url" disabled><?= $event->url; ?></a>
        </div>
        <?php endif; ?>

      </div>

       <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnEdit" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i></button>
        <button type="button" class="btn btn-success" id="btnSave" data-toggle="tooltip" title="Salvar"><i class="fa fa-floppy-o"></i></button>
        <button type="button" class="btn btn-danger" id="btnDelete" data-toggle="tooltip" title="Apagar"><i class="fa fa-trash-o"></i></button>
        <button type="button" class="btnEditClose btn btn-secondary" data-dismiss="modalEdit" data-toggle="tooltip" title="Sair"><i class="fa fa-sign-out"></i></button>
      </div>

    </div>
  </div>
</div>