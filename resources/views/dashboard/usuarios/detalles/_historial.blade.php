<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th>Navegador</th>
                <th>SO</th>
                <th>Dispositivo</th>
                <th>URL</th>
                <th>Hora y fecha</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($user->historial as $suceso)
            <tr>
                <td class="align-middle">{{$suceso->terminal->browser . ' ' . $suceso->terminal->browser_version}}</td>
                <td class="align-middle">{{$suceso->terminal->os . ' ' . $suceso->terminal->os_version}}</td>
                <td class="align-middle">{{$suceso->terminal->device == 'unknown' ? 'No disponible' : $suceso->terminal->device}}</td>
                <td class="align-middle">{{$suceso->current_url}}</td>
                <td class="align-middle">{{$suceso->fechaLeible()}}</td>
            </tr>
            @empty
            <td colspan="5">Sin usuarios registrados</td>
            @endforelse
        </tbody>
    </table>
</div>
