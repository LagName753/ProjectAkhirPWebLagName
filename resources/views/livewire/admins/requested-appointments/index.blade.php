<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Appointment Requests</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Requests</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $button_text }}</h3>
                        </div>
                        
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" wire:model="name" class="form-control">
                                @error('name') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" wire:model="email" class="form-control">
                                @error('email') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" wire:model="phone" class="form-control">
                                @error('phone') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea wire:model="address" class="form-control"></textarea>
                                @error('address') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea wire:model="message" class="form-control"></textarea>
                                @error('message') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            @if($edit_request_id)
                                <button wire:click="update({{ $edit_request_id }})" class="btn btn-primary btn-block">Update Request</button>
                                <button wire:click="reset_fields" class="btn btn-secondary btn-block">Cancel</button>
                            @else
                                <p class="text-center text-muted">Select a request from the list to edit.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Requests List</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($requested_appointments as $request)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $request->name }}</td>
                                                <td>{{ $request->email }}</td>
                                                <td>{{ $request->phone }}</td>
                                                <td class="text-center">
                                                    <button wire:click="edit({{ $request->id }})" class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button wire:click="delete({{ $request->id }})" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <button wire:click="approve({{ $request->id }})" onclick="confirm('Approve this request? This will create a patient record.') || event.stopImmediatePropagation()" class="btn btn-sm btn-success" title="Approve">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No requests found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $requested_appointments->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>