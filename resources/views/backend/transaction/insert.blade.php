<x-component.backend.layouts>
    <form action="/backend/addtrans" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="row form-group">
            <div class="col-sm-4 text-start label-column"><label>Customers Name</label></div>
            <div class="col-sm-6 input-column">
                <select name="id_cust" class="form-control">
                    @foreach ($cust as $add)
                        <option value="{{ $add->id }}">{{ $add->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-4 text-start label-column"><label>Packet Name</label></div>
            <div class="col-sm-6 input-column">
                <select name="id_pack" class="form-control">
                    @foreach ($pack as $add)
                        <option value="{{ $add->id }}">{{ $add->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="qty">Qty</label>
            <input type="number" id="qty" class="form-control" name="qty" min="1" required />
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4">Add Transaction</button>
    </form>
</x-component.backend.layouts>