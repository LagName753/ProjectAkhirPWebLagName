<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Departments</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Departments</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of Departments</h3>
                            <div class="card-tools">
                                <button wire:click="show_create_form" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> Add New Department
                                </button>
                            </div>
                        </div>
                        
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Head of Department</th>
                                            <th>Block</th>
                                            <th>Description</th>
                                            <th style="width: 150px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($departments as $department)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if($department->photo_path)
                                                        <img src="{{ asset('storage/'.$department->photo_path) }}" alt="{{ $department->name }}" class="img-circle img-size-32 mr-2" style="width: 32px; height: 32px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ asset('images/logo.png') }}" alt="Default" class="img-circle img-size-32 mr-2" style="width: 32px; height: 32px;">
                                                    @endif
                                                </td>
                                                <td>{{ $department->name }}</td>
                                                <td>
                                                    {{-- PERBAIKAN UTAMA DI SINI --}}
                                                    {{-- Menggunakan optional() agar tidak error jika HOD null --}}
                                                    {{ optional($department->hod)->name ?? 'Not Assigned' }}
                                                </td>
                                                <td>
                                                    {{ optional($department->block)->blockname ?? 'No Block' }}
                                                </td>
                                                <td>{{ Str::limit($department->description, 50) }}</td>
                                                <td>
                                                    <button wire:click="show_edit_form({{ $department->id }})" class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button wire:click="delete({{ $department->id }})" onclick="confirm('Apakah Kamu Yakin Ingin Menghapus?') || event.stopImmediatePropagation()" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">No departments found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="card-footer clearfix">
                            {{ $departments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>