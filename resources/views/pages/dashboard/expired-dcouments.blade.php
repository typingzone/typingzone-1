<div class="card-body">
    <div class="table-responsive dataview">
        <table class="table table-sm table-hover" id="dashboard-expired-documents">
            <thead>
                <tr>
                    <th class="no-sort">
                        <label class="checkboxs">
                            <input type="checkbox" id="select-all">
                            <span class="checkmarks"></span>
                        </label>
                    </th>
                    <th>SNO</th>
                    <th>Document Name</th>
                    <th>Expiry Date</th>
                    <th class="no-sort">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expiredDocuments as $document)
                <tr>
                    <td>
                        <label class="checkboxs">
                            <input type="checkbox">
                            <span class="checkmarks"></span>
                        </label>
                    </td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $document->documentName->document_name }}</td>
                    <td><span class="badge badge-linesuccess">{{ $document->expiry_date }}</span></td> 
                    <td class="action-table-data">
                        <div class="edit-delete-action">
                            <a class="me-2 p-2" href="#">
                                <i data-feather="eye" class="feather-eye"></i>
                            </a>
                            <a class="me-2 p-2" href="#">
                                <i data-feather="download" class="feather-eye"></i>
                            </a>
                            <a class="confirm-text p-2" href="javascript:void(0);">
                                <i data-feather="trash-2" class="feather-trash-2"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>