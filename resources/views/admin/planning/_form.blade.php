<div class="row">
    <div class="col-md-4 mb-3">
        <label for="start">Début</label>
        <input type="time" class="form-control" id="start" name="start" value="{{ old("start", empty($event->start) ? "" : $event->start->format("H:i")) }}">
        @error('start')
                <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
        @enderror
    </div>
    
    <div class="col-md-4 mb-3">
        <label for="end">Fin</label>
        <input type="time" class="form-control" id="end" name="end" value="{{ old("end", empty($event->end) ? "" : $event->end->format("H:i")) }}">

        @error('end')
                <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="day">Jour</label>
            <select class="form-control" id="day" name="day">
                <option @selected(old("day") == 1 || (($event->day ?? "") == 1)) value="1">Vendredi</option>
                <option @selected(old("day") == 2 || (($event->day ?? "") == 2)) value="2">Samedi</option>
                <option @selected(old("day") == 3 || (($event->day ?? "") == 3)) value="3">Dimanche</option>
            </select>
          </div>
        @error('day')
            <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
        @enderror
    </div>

    <div class="col-md-6 form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old("title", $event->title ?? "") }}">

        @error('title')
            <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
        @enderror
    </div>

    <div class="col-md-6 form-group">
        <label for="day">Couleur</label>
        <select class="form-control" id="color" name="color">
            <option @selected(old("color") == 1 || (($event->color ?? "") == 1)) value="1">Bleu</option>
            <option @selected(old("color") == 2 || (($event->color ?? "") == 2)) value="2">Violet</option>
            <option @selected(old("color") == 3 || (($event->color ?? "") == 3)) value="3">Vert</option>
            <option @selected(old("color") == 4 || (($event->color ?? "") == 4)) value="4">Orange</option>
            <option @selected(old("color") == 5 || (($event->color ?? "") == 5)) value="5">Rose</option>
            <option @selected(old("color") == 6 || (($event->color ?? "") == 6)) value="6">Gris</option>
            <option @selected(old("color") == 7 || (($event->color ?? "") == 7)) value="7">Rouge</option>
        </select>
      </div>
    @error('day')
        <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
    @enderror

    <div class="col-md-12 form-group">
        <label for="content">Description</label>
        <textarea class="form-control" id="content" name="content" rows="3">{{ old("content", $event->content ?? "") }}</textarea>

        @error('content')
            <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
        @enderror
    </div>

    <div class="col mb-3">
        <div class=" custom-control custom-switch">
            <input @checked(old('active', $event->active ?? true)) type="checkbox" name="active" class="custom-control-input" id="active">
            <label class="custom-control-label" for="active">Activer</label>
        </div>
        @error('active')
            <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
        @enderror
    </div>
    
</div>