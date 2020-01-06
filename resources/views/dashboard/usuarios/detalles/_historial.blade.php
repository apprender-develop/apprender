<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th>Navegador</th>
                <th>SO</th>
                <th>URL</th>
                <th>Hora y fecha</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($user->historial as $suceso)
            <tr>
                <td class="align-middle">{{$suceso->terminal->browser}}</td>
                <td class="align-middle">{{$suceso->terminal->os}}</td>
                <td class="align-middle">{{$suceso->current_url}}</td>
                <td class="align-middle">{{$suceso->fechaLeible()}}</td>
            </tr>
            @empty
            <td colspan="5">Sin usuarios registrados</td>
            @endforelse
        </tbody>
    </table>
</div>