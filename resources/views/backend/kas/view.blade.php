@extends('backend.layout.base')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="page-title-box">
                <h4>{{ $title }}</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ Helper::apk()->app_name }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript: void(0);">{{ $title }}</a></li>

                </ol>
            </div>
        </div>
        {{-- <div class="col-sm-6">
            <div class="state-information d-none d-sm-block">
                <div class="state-graph">
                    <div id="header-chart-1"></div>
                    <div class="info">Balance $ 2,317</div>
                </div>
                <div class="state-graph">
                    <div id="header-chart-2"></div>
                    <div class="info">Item Sold 1230</div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="addKas" type="button" class="btn btn-dark waves-effect waves-light ">Add</a>
                    <br>
                    <br>
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Jenis</th>
                                        <th>Description</th>
                                        <th>Jumlah</th>
                                        <th>Nominal</th>
                                        <th>created_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($kas as $a)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td width="auto">{{ $a->title }}</td>
                                            <td width="auto">{{ $a->jenis }}</td>
                                            <td width="auto">{{ $a->description }}</td>
                                            <td width="auto">{{ $a->count }}</td>
                                            <td width="auto">Rp. {{ number_format($a->sum) }}</td>
                                            <td width="auto">{{ $a->created_at }}</td>
                                            
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-4">

                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#EditUsers{{ $a->id }}"><i
                                                                class="far fa-edit" style="color: black"></i></a>
                                                    </div>
                                                   
                                                    <div class="col-md-4">
                                                        <a href="#" onclick="deleteItem(this)"
                                                            data-id="{{ $a->id }}"><i
                                                                class="fas
                                                            fa-trash-alt"
                                                                style="color:red"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <div class="modal fade" id="EditUsers{{ $a->id }}" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" role="dialog"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Kas
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="/kas/editProses" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">

                                                            <input type="text" name="id"
                                                                value="{{ $a->id }}" hidden>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="full_name">Title</label>
                                                                        <input type="text" class="form-control"
                                                                            id="title" name="title"
                                                                            value="{{ $a->title }}"
                                                                            placeholder="Masukan Title" required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label"
                                                                            for="status">Jenis</label>
                                                                        <select class="form-control" name="jenis"
                                                                            id="jenis" required>
                                                                            <option value="">-- Pilih --</option>
                                                                            @foreach ($jenis as $r)
                                                                                <option value="{{ $r }}"
                                                                                    {{ $r == $a->jenis ? 'selected' : '' }}>
                                                                                    {{ $r }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="phone">Jumlah</label>
                                                                        <input type="text" class="form-control"
                                                                            id="count" name="count"
                                                                            value="{{ $a->count }}"
                                                                            placeholder="Masukan Nomor Telepon" required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="phone">Nominal</label>
                                                                        <input type="text" class="form-control"
                                                                            id="sum" name="sum"
                                                                            value="{{ $a->sum }}"
                                                                            placeholder="Masukan Nominal" required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label"
                                                                            for="email">Description</label>
                                                                        <input type="text" class="form-control"
                                                                            id="description" name="description"
                                                                            value="{{ $a->description }}"
                                                                            placeholder="Masukan Description" required />
                                                                    </div>
                                                                </div>
                                                                
                                                                

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light waves-effect"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary waves-effect waves-light">Save</button>
                                                            </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <script>
        function deleteItem(e) {

            let id = e.getAttribute('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    setInterval(function() {
                            location.reload();
                        }, 30000),
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        ),
                        $.ajax({
                            type: 'GET',
                            url: '{{ url('kas/delete/') }}/' + id,
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(data) {

                                if (data.success) {

                                    swalWithBootstrapButtons.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        "success",

                                    );

                                }

                            }
                        });



                }
                if (result.isConfirmed) location.reload()
            })

        }
    </script>
@endsection
