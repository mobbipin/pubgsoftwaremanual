<x-cms-master-layout>
    @push('styles')
        <style>
            .mr-10 {
                margin-right: 10px;
            }

        </style>
        <script src="{{ asset('cms/libs/js/bootstrap.min.js') }}"></script>
    @endpush

    <x-breadcrumb :title="$pageTitle" :item="3" :method="'Edit Details Of'" />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-wrap align-items-center">
                        <h4 class="card-title">{{ $user->name }} Details</h4>

                        <div class="ms-auto">
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <!-- Customer Info -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button fw-medium collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    <i class='bx bx-info-circle fw-bold mr-10'></i> Customer Info
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body text-muted">
                                    <x-form-base :route="'admin.users.update'" :requiredParam="$user" :title="$pageTitle" :subTitle="$subTitle"
                                        :method="'PUT'">

                                        <!-- Full Name -->
                                        <x-input-field :label="'Name'" :name="'name'" :placeholder="'Please enter full name here.'"
                                            :col="6" :required="true" :autofocus="true"
                                            :value="$user->name" />

                                        <!-- Email Address -->
                                        <x-input-field :label="'Email Address'" :name="'email'" :placeholder="'Please enter email address here.'"
                                            :col="6" :required="true" :value="$user->email" />

                                        <!-- Roles -->
                                        <x-select-field-name :label="'Roles'" :name="'role_id'" :placeholder="'Select a User Role'"
                                            :col="6" :values="$roles" :required="true"
                                            :selected="$user->roles->pluck('id')->first()" />

                                        <!-- Phone Number  -->
                                        <x-input-field :label="'Phone Number'" :name="'phone'" :placeholder="'Please enter phone number here.'"
                                            :col="6" :required="true" :value="$user->phone" />

                                        <!-- City -->
                                        <x-input-field :label="'City'" :name="'city'" :placeholder="'Please enter city here.'"
                                            :col="6" :required="true" :value="$user->city" />

                                        <!-- Address -->
                                        <x-text-area-field :label="'Address'" :name="'address'" :placeholder="'Vendor Address Here.'"
                                            :value="$user->address" />

                                        <!-- Editor Image -->
                                        <x-file-browser-image :label="'Editor Avatar Image'" :name="'image'"
                                            :defaultFile="$user->getFirstOrDefaultMediaUrl('image', 'thumb')" />

                                        <x-button />

                                    </x-form-base>
                                </div>
                            </div>
                        </div>


                        <!-- Activity Log -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSix">
                                <button class="accordion-button fw-medium collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false"
                                    aria-controls="flush-collapseSix">
                                    <i class='bx bxs-book fw-bold mr-10'></i> Activity Log
                                </button>
                            </h2>
                            <div id="flush-collapseSix" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body text-muted">
                                    <table id="activity-datatable"
                                        class="table table-bordered dt-responsive nowrap w-100" width="100%">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Activity Log Type</th>
                                                <th>Description</th>
                                                <th>Created On</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- end accordion -->

                </div>
            </div>
        </div>
    </div>

    <x-file-manager />

    @push('scripts')
        <script>
            $('.accordion-item').on('show.bs.collapse', function(e) {
                setTimeout(function() {
                    $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
                }, 5);

            });


            $(function() {


                $('#activity-datatable').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "ordering": true,
                    "autoWidth": false,
                    "serverside": true,
                    "processing": true,
                    "scrollX": true,
                    "scrollY": false,
                    "ajax": "{!! route('admin.users.activity.logs', $user->id) !!}",
                    "columns": [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'log_name',
                            name: 'log_name'
                        },
                        {
                            data: 'description',
                            name: 'description'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                    ]
                });
            });
        </script>
    @endpush

</x-cms-master-layout>
