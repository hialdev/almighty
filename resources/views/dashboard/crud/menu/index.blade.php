@extends('dashboard.layout.app')
@section('title_dashboard','Menu Index')
@section('dashcontent')
<section class="row">
    <div class="col-12 p-4 bg-white rounded-3">
        <h3 class="float-start">Menu</h3>
        <a href="{{ route('menu.create') }}" class="btn btn-md btn-primary mb-3 float-end">Add
            Menu</a>

        <div class="mt-4 table-responsive w-100">
            <table class="table table-lg">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Menu</th>
                        <th scope="col">Icon</th>
                        <th scope="col">URL</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menus as $data)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $data->menu }}</td>
                        <td>{{ $data->icon }}</td>
                        <td>{{ $data->url }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('menu.destroy',$data->id) }}" method="POST">
                                <a href="{{ route('menu.show',$data->id) }}" class="btn btn-sm btn-success">SHOW</a>
                                <a href="{{ route('menu.edit',$data->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center text-mute" colspan="9">Data tidak tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection