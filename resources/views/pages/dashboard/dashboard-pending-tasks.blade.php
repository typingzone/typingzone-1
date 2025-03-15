<div class="card-body">
    <div class="table-responsive dataview">
        <table class="table dashboard-recent-products">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customers</th>
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
                            @foreach($task->service_names as $service)
                                <li>{{ $service }}</li>
                            @endforeach
                        </ul>">
                            <i class="fa fa-info-circle"></i>
                        </a>
                    </td>
                    <td><span class="badge badge-warning custom-badge">{{ucfirst($task->status) }}</span></td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>