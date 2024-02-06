<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="2" :method="'List Of'" />
    <x-error />
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-wrap align-items-center">
                        <h4 class="card-title">{{ $subTitle }}</h4>

                        <div class="ms-auto">
                            <div>
                                @if (auth()->user()->can('add user'))
                                    <a href="{{ route('admin.' . Str::plural(Str::lower($pageTitle)) . '.create') }}"
                                        type="button" class="btn btn-primary btn-md">
                                        <i class="bx bx-plus"></i> New {{ $pageTitle }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>SN.</th>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            // Datatable
            $(document).ready(() => {
                var DTable = $("#datatable").DataTable({
                    "language": {
                        "lengthMenu": "Show _MENU_",
                    },
                    "dom": "<'row'" +
                        "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                        "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                        ">" +

                        "<'table-responsive'tr>" +

                        "<'row'" +
                        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                        ">",
                    processing: true,
                    serverSide: true,
                    responsive: false,
                    ajax: {
                        url: "{!! route('admin.users.index') !!}",

                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'username',
                            name: 'username'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'role_id',
                            name: 'role_id'
                        },
                        {
                            data: 'phone',
                            name: 'phone',
                            orderable: false
                        },
                        {
                            data: 'city',
                            name: 'city',
                            orderable: false
                        },
                        {
                            data: 'address',
                            name: 'address',
                            orderable: false
                        },
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });



                $('#datatable').on('click', '#delete-btn', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    var id = $(this).data('id');
                    var delete_url = "{{ route('admin.users.destroy', '') }}/" + id;

                    showConfirmationDialog(delete_url, DTable);
                });

            });
        </script>
    @endpush

</x-cms-master-layout>
