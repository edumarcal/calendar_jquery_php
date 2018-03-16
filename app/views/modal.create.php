<div class="modal" tabindex="-1" role="dialog" id="modalCreate">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form action="/event/create" method="POST">

        <div class="modal-header">
          <h5 class="modal-title">Novo Evento</h5>
          <button type="button" class="close btnClose" data-dismiss="modalCreate" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">        
          
          <div class="form-group">
            <label for="description">Título:</label>
            <input class="form-control" type="text" name="title" placeholder="Título">
          </div>

          <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea class="form-control" name="description" rows="3" placeholder="Descrição"></textarea>
          </div>

          <div class="form-group">
            <label for="data">Data inicial evento:</label>
            <input class="form-control" type="date" placeholder="Data inicial" name="start">
          </div>
          
          <div class="form-group">
            <label for="data">Horário de inicial evento:</label>
            <input class="form-control" type="text" placeholder="Data inicial" name="startHour">
          </div>

          <div class="form-group">
            <label for="data">Data final do evento:</label>
            <input class="form-control" type="date" placeholder="Data final" name="end">
          </div>

          <div class="form-group">
            <label for="data">Horário de final evento:</label>
            <input class="form-control" type="text" placeholder="Data inicial" name="endHour">
          </div>

          <div class="form-group">
            <label for="data">Adicionar link:</label>
            <input class="form-control" type="text" name="url" id="url" placeholder="Adicionar link">
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Salvar"><i class="fa fa-floppy-o"></i></button>
          <button type="button" class="btn btn-secondary btnClose" data-dismiss="modalCreate" data-toggle="tooltip" title="Sair"><i class="fa fa-sign-out"></i></button>
        </div>

      </form>
    </div>
  </div>
</div>