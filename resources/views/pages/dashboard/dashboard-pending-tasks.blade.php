<div class="card-body">
    <div class="table-responsive dataview">
        <table class="table dashboard-recent-products">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Services</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendingTasks as $task)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $task->customer_name }}</td>
                    <td>
                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-html="true" title="<ul>
                        @php $services = is_string($task->services) ? explode(',', $task->services) : json_decode($task->services, true); @endphp
                        @foreach($services as $service)
                            <li>{{ trim($service) }}</li>
                        @endforeach
                    </ul>">
                        <i class="fa fa-info-circle"></i>
                    </a>
                </td>
                <td><span class="badge badge-warning">{{ucfirst($task->status) }}</span></td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>