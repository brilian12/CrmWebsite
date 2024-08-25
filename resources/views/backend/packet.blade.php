<x-component.backend.layouts>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Paket</h3>
                    <div class="card-tools">
                        <form action="/backend/custsearch" method="GET">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="search" class="form-control float-right" placeholder="Search"
                                    name="search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php $i = 1 @endphp
                            @foreach ($packet as $p)
                                <td>{{ $i++ }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->price }}</td>
                                <td>
                                    <a href="{{ url('/backend/detailcust/' . $p->id) }}"><i class="far fa-address-card"
                                            data-bss-hover-animate="pulse"
                                            style="font-size: 25px;margin-right: 0px;margin-left: 5px;color: rgb(0,191,255);"></i></a>
                                    <a href="{{ url('/backend/updatecustomer/' . $p->id) }}"><i class="far fa-edit"
                                            data-bss-hover-animate="pulse"
                                            style="font-size: 25px;margin-right: 5px;margin-left: 5px;color: rgb(52,82,241);"></i></a>
                                    <a href="{{ url('/backend/deletecust/' . $p->id) }}"><i class="far fa-trash-alt"
                                            data-bss-hover-animate="pulse"
                                            style="font-size: 25px;margin-right: 0px;margin-left: 5px;color: rgb(255,5,5);"></i></a>
                                </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </div>
</x-component.backend.layouts>
