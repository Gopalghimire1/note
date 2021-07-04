<option></option>
@foreach ($faculties as $faculty)
    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
@endforeach
