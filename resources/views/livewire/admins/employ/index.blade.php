<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Employees</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Employees</li>
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
                            <h3 class="card-title">List of Employees</h3>
                            <div class="card-tools">
                                <button wire:click="show_create_form" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> Add New Employee
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
                                            <th>Position</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Salary</th>
                                            <th>Status</th>
                                            <th style="width: 150px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($employees as $employee)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if($employee->image)
                                                        <img src="{{ asset('storage/'.$employee->image) }}" alt="{{ $employee->name }}" class="img-circle img-size-32 mr-2" style="width: 32px; height: 32px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ asset('images/logo.png') }}" alt="Default" class="img-circle img-size-32 mr-2" style="width: 32px; height: 32px;">
                                                    @endif
                                                </td>
                                                <td>{{ $employee->name }}</td>
                                                <td><span class="badge badge-info">{{ ucfirst($employee->position) }}</span></td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->phone }}</td>
                                                <td>Rp {{ number_format($employee->salary, 0, ',', '.') }}</td>
                                                <td>
                                                    @if($employee->status == 'active')
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button wire:click="show_edit_form({{ $employee->id }})" class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button wire:click="delete({{ $employee->id }})" onclick="confirm('Apakah Kamu Yakin Ingin Menghapus?') || event.stopImmediatePropagation()" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center">No employees found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="card-footer clearfix">
                            {{ $employees->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>