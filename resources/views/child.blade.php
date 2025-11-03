
@extends('layouts.parent')

@section('title', 'Список пользователей')

@section('content')
    <table class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @include('partials.tablerow', ['user' => $user])
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.toggle-description').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const row = document.getElementById('desc-' + id);
                row.classList.toggle('d-none');
            });
        });
    });
</script>
@endpush
