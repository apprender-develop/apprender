<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Pseudoficha</th>
                <th>Ultima Vez</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td class="align-middle">{{$user->nombreCompleto}}</td>
                <td class="align-middle">{{$user->email}}</td>
                <td class="align-middle">{{$user->pseudoficha}}</td>
                <td class="align-middle">{{$user->historial->last()->created_at}}</td>
                <td class="align-middle">
                    <a class="btn btn-info" href="">Historial</a>
                </td>

            </tr>
            @empty
            <td colspan="5">Sin usuarios registrados</td>
            @endforelse
        </tbody>
    </table>
</div>