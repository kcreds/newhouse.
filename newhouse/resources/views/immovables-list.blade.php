@extends('layouts.admin_header')

@section('admin_content')
    <div class="cont">
        @if (session()->has('message'))
            <div class="alert col-lg-4 alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <br>
        @endif
        <div class="col-sm-12 mt-5 addbtn">
            <a href="{{ url('/admin/nieruchomosci/dodaj') }}" class="btn btn-primary ">Dodaj</a>
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
                @php $count = 0; @endphp
                @foreach ($immovables as $item)
                    @php $count++; @endphp
                    <tr>
                        <th scope="row">{{ $count }}</th>
                        <td>{{ $item->name }}</td>
                        <td class="text-break">{!! $item->short_desc !!}</td>
                        <td><a href="{{ route('immovables_edit', ['id' => $item->id]) }}"
                                class="btn btn-primary me-1 mt-1">Edytuj
                                <a href="{{ route('immovables_delete', ['id' => $item->id]) }}" class="btn btn-danger mt-1"
                                    onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</a>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
</div>
