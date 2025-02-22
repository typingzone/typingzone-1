@php
    $notifications =  App\Models\Notification::where('assign_to', Auth::id())->orderBy('created_at', 'desc')->limit(5)->get();
@endphp
<li class="nav-item dropdown nav-item-box">
    <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
        <i data-feather="bell"></i>
        <span class="badge rounded-pill" id="notification-count">{{ $notifications->count() }}</span>
    </a>
    <div class="dropdown-menu notifications">
        <div class="topnav-dropdown-header">
            <span class="notification-title">Notifications</span>
            <a href="javascript:void(0)" class="clear-noti" id="clear-all">Clear All</a>
        </div>
        <div class="noti-content">
            <ul class="notification-list" id="notification-list">
                @foreach($notifications as $notification)
                <li class="notification-message" id="notification-{{ $notification->id }}">
                    <a href="{{ url('all-notifications') }}">
                        <div class="media d-flex">
                            <span class="avatar flex-shrink-0">
                                <img alt="" src="https://static-00.iconduck.com/assets.00/task-ongoing-icon-512x512-mi2ty2za.png">
                            </span>
                            <div class="media-body flex-grow-1">
                                <p class="noti-details">
                                    <span class="noti-title">{{ $notification->comment }}</span>
                                </p>
                                <p class="noti-time">
                                    <span class="notification-time">{{ $notification->created_at->diffForHumans() }}</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="topnav-dropdown-footer">
            <a href="{{ url('all-notifications') }}">View all Notifications</a>
        </div>
    </div>
</li>


<script>
    $('#clear-all').click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to clear all notifications!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, clear them!',
        cancelButtonText: 'No, keep them'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("clear-all-notifications") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.fire('Cleared!', 'All notifications have been cleared.', 'success');
                    $('#notification-list').empty();
                    $('#notification-count').text('0');
                },
                error: function() {
                    Swal.fire('Error!', 'There was an issue clearing notifications.', 'error');
                }
            });
        }
    });
});
</script>