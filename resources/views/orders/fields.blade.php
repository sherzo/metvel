<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Cédula o Rif</label>
            <input type="hidden" value="{{ $provider->id }}" name="client_id">
            <input type="text" name="" value="{{ $provider->dni }}" class="form-control border-input" readonly="">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="">Nombre o Razón social</label>
            <input type="text" name="" value="{{ $provider->name }}" class="form-control border-input" readonly="">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Forma de pago</label>
            <select name="shipping_id" id="" class="form-control border-input">
                @forelse($payments as $id => $payment)
                    <option value="{{ $id }}">{{ $payment }}</option>
                @empty
                    <option value="">No se encontraron resultados</option>
                @endforelse
            </select>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Seleccione los productos</label>
            <select name="" id="" v-model="product_id" class="form-control border-input" @change="addProduct">
                <option value="">
                    Seleccione
                </option>
                <option :value="i" v-for="(p,i) in products" @click="addProduct">
                    @{{ p.name }}
                </option>
            </select>
        </div>                
    </div>
</div>

<div class="row text-center" v-show="selected.length > 0">
    <div class="col-md-12 col-lg-8">
        <table class="table">
            <thead>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Importe</th>
                <th>Quitar</th>
            </thead>
            <tbody>
                <tr v-for="(s,i) in selected">
                    <td>@{{ s.name }}
                        <input type="hidden" name="product_id[]" :value="s.id">
                    </td>
                    <td>
                        <input name="quantity[]" type="number" class="border-input form-control" v-model.number="s.quantity" min="1" max="20">
                    </td>
                    <td>
                        <input type="number" name="amount[]" v-model.number="s.price" class="form-control border-input">
                    </td>
                    <td>
                        <input type="text" :value="s.price * s.quantity" class="form-control border-input" readonly="">
                    </td>
                    <td>
                        <button class="btn btn-xs btn-danger" @click.prevent="removeProduct(i)">
                            <i class="fa fa-close"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-right"><b>Total:</b></td>
                    <td class="left-center">
                        <input type="text" :value="total" class="form-control border-input">
                    </td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
