@foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td width="120">
            <div class='btn-group'>
                <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'>
                    <i class="far fa-eye"></i>
                </a>

                <a href="{{ route('users.assignroles', [$user->id]) }}" class='btn btn-default btn-xs'>
                    <i class="far fa-user-tag"></i>
                </a>

                <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'>
                    <i class="far fa-edit"></i>
                </a>
            </div>
        </td>
    </tr>
@endforeach