<div class="card border-secondary mb-3 shadow-sm" style="max-width: 20rem;">
    <div class="card-header bg-white">
        <div class="d-flex justify-content-between align-items-center">
            <strong class="text-dark">{{ $project->name }}</strong>
        </div>
        <small class="text-muted">
            {{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}
            <i class="fa-solid fa-arrow-right mx-1"></i>
            {{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}
        </small>
    </div>
    <div class="card-body text-secondary">
        <div class="row align-items-center">
            <div class="col-6">
                <h6 class="card-title mb-0 ">
                   {{ $project->tasks_count }} Tasks
                </h6>
            </div>
            <div class="col-6 text-end">
                <div 
                    class="avatar d-inline-flex align-items-center justify-content-center rounded-circle bg-primary" 
                    style="width: 40px; height: 40px;" 
                    data-bs-toggle="tooltip" 
                    data-bs-placement="top" 
                    title="{{ $project->creator->name }}">
                    <span class="text-white fw-bold">
                        {{ strtoupper(substr($project->creator->name, 0, 1)) }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
