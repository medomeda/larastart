<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="frmEtudeSave"> 
                <input type="hidden" name="societe_id" id="societe_id" value="{{ $id }}" />
                <div class="form-group">
                    <label for="ratio_id">Ratio</label>
                    <select name="ratio_id" id="ratio_id" class="form-control">
                        @foreach ($ratios as $key => $value)
                            <option value="{{ $key }}" 
                            @isset($value->id)
                                @if ($key == old('ratio_id', $value->name))
                                    selected="selected"
                                @endif
                            @endisset
                            >{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="periode">Période</label>
                    <select name="periode" id="periode" class="form-control">
                        @foreach (config('parametres.TYPE_PERIODES') as $key => $value)
                            <option value="{{ $key }}" 
                            @isset($etude->periode)
                                @if ($key == old('periode', $etude->periode))
                                    selected="selected"
                                @endif
                            @endisset
                            >{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="valeur">Valeur indicateur</label>
                    <input type="number" class="form-control" name="valeur" id="valeur" placeholder="Saisir la valeur de l'indicateur choisi">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="button" class="save btn btn-primary">Enregistrer</button>
        </div>
        </div>
    </div>
</div>