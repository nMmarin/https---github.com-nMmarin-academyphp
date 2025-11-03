
<tr>
    <td>{{ $user['id'] }}</td>
    <td>{{ $user['name'] }}</td>
    <td>@include('partials.button', ['userId' => $user['id']])</td>
</tr>
<tr class="description-row d-none" id="desc-{{ $user['id'] }}">
    <td colspan="3" class="bg-light">
        <strong>Описание:</strong> {{ $user['description'] }}
    </td>
</tr>
