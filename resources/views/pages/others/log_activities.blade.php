@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                Log Activities
                @endslot
                @slot('li_1')
                    Manage Log Activities
                @endslot
            @endcomponent
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm datanew table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Log Name</th>
                                <th>Event</th>
                                <th>Causer</th>
                                <th>Properties</th>
                                <th>Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logActivities as $index => $log)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ ucfirst($log->log_name) }}</td>
                                    <td>{{ ucfirst($log->event) }}</td>
                                    <td>{{ $log->causer ? $log->causer->name : 'N/A' }}</td>
                                    <td>
                                        @php
                                            $properties = json_decode($log->properties, true);
                                            $meaningfulProperties = [];
                                        @endphp

                                        @if($log->event === 'updated')
                                            @if(isset($properties['old']) && isset($properties['attributes']))
                                                @php
                                                    $oldData = $properties['old'];
                                                    $newData = $properties['attributes'];
                                                    foreach ($oldData as $key => $oldValue) {
                                                        $newValue = $newData[$key] ?? null;
                                                        if ($oldValue != $newValue) {
                                                            $label = ucfirst(str_replace('_', ' ', $key));
                                                            if ($newValue === null) {
                                                                $meaningfulProperties[] = '<strike>' . $label . ': ' . $oldValue . '</strike>';
                                                            } else {
                                                                $meaningfulProperties[] = $label . ': ' . $oldValue . ' <strong>→</strong> ' . $newValue;
                                                            }
                                                        }
                                                    }
                                                @endphp
                                            @endif
                                        @elseif($log->event === 'deleted')
                                            @if(isset($properties['old']))
                                                @php
                                                    foreach ($properties['old'] as $key => $oldValue) {
                                                        $label = ucfirst(str_replace('_', ' ', $key));
                                                        $meaningfulProperties[] = '<strike>' . $label . ': ' . $oldValue . '</strike>';
                                                    }
                                                @endphp
                                            @endif
                                        @endif

                                        @if(!empty($meaningfulProperties))
                                            <ul>
                                                @foreach($meaningfulProperties as $property)
                                                    <li>{!! $property !!}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span>N/A</span>
                                        @endif
                                    </td>
                                    <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('build/Custom/js/log_activities.js') }}"></script>
@endsection
