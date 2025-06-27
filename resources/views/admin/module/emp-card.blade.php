<div class="col-xxl-3 col-xl-4 col-md-6">
      <div class="card h-100 shadow-sm border-0 rounded-4">
          <div class="card-body d-flex align-items-center p-3">
              <div class="me-3 text-center">
                  <div class="rounded-circle d-flex align-items-center justify-content-center emp-icon">
                      <span class="fs-4 fw-bold text-white">
                          {{ strtoupper(substr($user->name, 0, 1)) }}
                      </span>
                  </div>
              </div>
              <div class="flex-grow-1">
                  <div class="fw-bold fs-6 mb-1">
                      <a href="{{ route('employee.show', $user->id) }}" class="text-dark text-decoration-none">
                          {{ $user->name }}
                      </a>
                  </div>
                  <div class="text-muted small mb-1">
                      <i class="fas fa-envelope me-1"></i>{{ $user->email }}
                  </div>
                  @if ($user->phone)
                      <div class="text-muted small">
                          <i class="fas fa-phone me-1"></i>{{ $user->phone }}
                      </div>
                  @endif
              </div>
              <div class="ms-3 text-end">
                  <div class="badge bg-success text-uppercase mb-1">
                      {{ $user->status }}
                  </div>
                  <div class="text-muted small">
                      {{ $user->designation }}
                  </div>
              </div>
          </div>
      </div>
  </div>
