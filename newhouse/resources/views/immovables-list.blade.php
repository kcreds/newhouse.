@extends('layouts.admin_header')

@section('admin_content')
    <div class="cont">
        @if (session()->has('message'))
            <div style="margin-bottom: -50px" class="alert col-lg-4 alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <br>
        @endif
        @if (session()->has('error'))
            <div style="margin-bottom: -50px" class="alert col-lg-4 alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <br>
        @endif
        <div class="row">
            <div class="col">
                <div class="col-sm-12 mt-3">
                    <form action="{{ route('immovables_updateTemplate') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="selectedFile" class="h5">Aktualny szablon: </label>
                        <span class="h5">{{ $template ? $template->name : 'Domyślny' }}</span>
                        <br>
                        <div id="fileInputContainer">
                            <input name="template_file" class="btn btn-light" id="selectedFile" type="file"
                                style="display: none;" onchange="handleFileChange(event)" />
                        </div>
                        <input type="button" id="selectedFile" class="btn btn-info" value="Wybierz nowy..."
                            onclick="document.getElementById('selectedFile').click();" />
                        <button class="btn btn-primary" style="display: none;" id="templateButton"
                            type="submit">Zaktualizuj plik
                            szablonu</button>
                        @if ($template)
                            <a href="{{ route('immovables_deleteTemplate') }}" class="btn btn-danger"
                                onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń plik
                                szablonu</a>
                        @endif
                    </form>
                </div>
            </div>

            <div class="col">
                <div class="col-sm-12 mt-5 addbtn">
                    <a href="{{ url('/admin/nieruchomosci/dodaj') }}" class="btn btn-primary">Dodaj nowe ogłoszenie</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mt-5 fs-6">
            <div class="col-sm-12 mt-3 d-flex w-50">
                <form action="{{ route('immovables_list') }}" method="GET">
                    <div class="input-group mb-3">
                        <select name="per_page" class="form-select">
                            <option value="10" @if ($immovables->perPage() == 10) selected @endif>10</option>
                            <option value="25" @if ($immovables->perPage() == 25) selected @endif>25</option>
                            <option value="50" @if ($immovables->perPage() == 50) selected @endif>50</option>
                            <option value="100" @if ($immovables->perPage() == 100) selected @endif>100</option>
                        </select>
                        <button class="btn btn-primary" type="submit">Wyświetl</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 mt-3 addbtn w-50">
                <form action="{{ route('immovables_list') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Szukaj...">
                        <button class="btn btn-primary" type="submit">Szukaj</button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th class="w-auto " scope="col">#</th>
                    <th class="w-25" scope="col">Nazwa</th>
                    <th class="w-50" scope="col">Opis</th>
                    <th class="w-auto " scope="col ">Akcje</th>
                </tr>
            </thead>
            <tbody>
                @if ($immovables->isEmpty())
                    <tr>
                        <td class="h3 text-center" colspan="4">Brak wyników</td>
                    </tr>
                @else
                    @php $count = 0; @endphp
                    @foreach ($immovables as $item)
                        @php $count++; @endphp
                        <tr>
                            <th scope="row">{{ $count }}</th>
                            <td>{{ $item->name }}</td>
                            <td class="text-break">{!! $item->short_desc !!}</td>
                            <td><a href="{{ route('immovables_edit', ['id' => $item->id]) }}"
                                    class="btn btn-primary me-1 mt-1">Edytuj
                                    <a href="{{ route('immovables_delete', ['id' => $item->id]) }}"
                                        class="btn btn-danger mt-1"
                                        onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</a>

                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{ $immovables->appends(request()->except('page'))->links('pagination::bootstrap-5') }}
    </div>
    <script>
        function handleFileChange(event) {
            const fileInput = event.target;
            const templateButton = document.getElementById('templateButton');

            if (fileInput.files.length > 0) {
                templateButton.style.display = 'inline';
            } else {
                templateButton.style.display = 'none';
            }
        }
    </script>
@endsection
