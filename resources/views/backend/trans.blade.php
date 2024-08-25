<x-component.backend.layouts>
    <div class="row">
        <div class="card-header">
            <a class="text-decoration-none" href="{{ url('/backend/inserttransaction') }}">
                <p class="text-primary m-0 fw-bold"></p><button class="btn btn-primary" type="button">Tambah Transaksi
                    +</button>
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Transaksi</h3>
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
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Packet</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php $i = 1 @endphp
                            @foreach ($trans as $p)
                                <td>{{ $i++ }}</td>
                                <td>{{ $p->getCust->name }}</td>
                                <td>{{ $p->getPack->name }}</td>
                                <td>{{ $p->total }}</td>
                                <td>
                                    <a href="{{ url('/backend/deletetrans/' . $p->id) }}"><i class="far fa-trash-alt"
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
