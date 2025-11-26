<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Appointments</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Appointments</li>
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
                        <form wire:submit.prevent="add_appointment">
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label>Patient Name</label>
                                    <select class="form-control" wire:model="patient">
                                        <option value="">Choose Patient</option>
                                        @foreach($patients as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('patient') <span class="text-danger error">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label>Doctor Name</label>
                                    <select class="form-control" wire:model="doctor">
                                        <option value="">Choose Doctor</option>
                                        @foreach($doctors as $d)
                                            <option value="{{ $d->id }}">
                                                {{ $d->employee->name ?? 'Doctor' }} ({{ $d->employee->specialization ?? 'General' }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('doctor') <span class="text-danger error">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label>Check-in Time</label>
                                    <input type="time" wire:model="start_timeee" class="form-control">
                                    @error('start_timeee') <span class="text-danger error">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label>Check-out Time</label>
                                    <input type="time" wire:model="endtime" class="form-control">
                                    @error('endtime') <span class="text-danger error">{{ $message }}</span> @enderror
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-block">{{ $button_text }}</button>
                                @if($edit_appointment_id)
                                    <button type="button" wire:click="reset_fields" class="btn btn-secondary btn-block">Cancel Edit</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Appointment List</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Patient</th>
                                            <th>Doctor</th>
                                            <th>Check-in</th>
                                            <th>Check-out</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($appointments as $appointment)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $appointment->patient->name ?? 'Unknown' }}</td>
                                                <td>{{ $appointment->doctor->employee->name ?? 'Unknown' }}</td>
                                                <td>{{ $appointment->intime }}</td>
                                                <td>{{ $appointment->outtime }}</td>
                                                <td>
                                                    <button wire:click="edit({{ $appointment->id }})" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button wire:click="delete({{ $appointment->id }})" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No appointments found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>