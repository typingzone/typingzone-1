@php
    $assignedTasks = App\Models\Order::where('assign_to', Auth::user()->id)
                                    ->where('status', 'pending')
                                    ->where('read_status', 0)
                                    ->orderBy('id', 'desc')
                                    ->limit(5)
                                    ->get();
@endphp
<li class="nav-item dropdown nav-item-box">
    <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
        <i data-feather="bell"></i>
        <span class="badge rounded-pill">{{ $assignedTasks->count() }}</span>
    </a>
    <div class="dropdown-menu notifications">
        <div class="topnav-dropdown-header">
            <span class="notification-title">Notifications</span>
            <a href="javascript:void(0)" class="clear-noti">Clear All</a>
        </div>
        <div class="noti-content">
            <ul class="notification-list">
                @foreach($assignedTasks as $task)
                <li class="notification-message" id="notification-{{ $task->id }}">
                    <a href="{{ url('orders/'.$task->id) }}">
                        <div class="media d-flex">
                            <span class="avatar flex-shrink-0">
                                <img alt="" src="https://static-00.iconduck.com/assets.00/task-ongoing-icon-512x512-mi2ty2za.png">
                            </span>
                            <div class="media-body flex-grow-1">
                                <p class="noti-details">
                                    <span class="noti-title">{{ $task->customer_name }}</span> assigned new task <span class="noti-title">{{ $task->description }}</span>
                                </p>
                                <p class="noti-time">
                                    <span class="notification-time">{{ $task->created_at->diffForHumans() }}</span>
                                </p>
                            </div>
                        </div>
                    </a>
                
                </li>
                @endforeach
            </ul>
        </div>
        <div class="topnav-dropdown-footer">
            <a href="{{ url('orders') }}">View all Notifications</a>
        </div>
    </div>
</li>

