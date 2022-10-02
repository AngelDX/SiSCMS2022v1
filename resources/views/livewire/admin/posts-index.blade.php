<div class="card">
    <div class="card-header d-flex justify-content">
        <div class="col-md-10">
            <input wire:model="search" class="form-control" placeholder="Ingrese nombre del post" type="text">
        </div>
        <div>
            <a href="{{route('admin.posts3.create')}}" class="btn btn-secondary">Agregar post</a>
        </div>
    </div>
    <div class="card-body">
        @if ($posts->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th wire:click="order('id')" role="button">ID
                        @if($sort=='id')
                        @if($direction=='asc')
                            <i class="fas fa-sort-alpha-up"></i>
                        @else
                            <i class="fas fa-sort-alpha-down-alt"></i>
                        @endif
                    @else
                        <i class="fas fa-sort"></i>
                    @endif
                    </th>
                    <th wire:click="order('name')" role="button">Titulo
                        @if($sort=='name')
                            @if($direction=='asc')
                                <i class="fas fa-sort-alpha-up"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt"></i>
                            @endif
                        @else
                            <i class="fas fa-sort"></i>
                        @endif
                    </th>
                    <th>Estado</th>
                    <th>Usuario</th>
                    <th>Categoria</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td>
                            <span class="btn {{($post->status==1)?'badge bg-warning':'badge bg-success'}} btn-sm">{{($post->status==1)?'Revisión':'publicado'}}</span>
                        </td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category->name}}</td>
                        <td width="10px">
                            <a href="{{ route('admin.posts3.edit', $post) }}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.posts3.destroy',$post)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <strong>No hay ningun registro</strong>
        @endif
    </div>
    <div class="card-footer d-flex justify-content-end">
        {!! $posts->links() !!}
    </div>
</div>
