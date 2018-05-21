<ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class="active">
        <a href="#datos" aria-controls="data" role="tab" data-toggle="tab">
            
           1. - Datos principales
        </a>
    </li>
    <li role="presentation">
        <a href="#productos" aria-controls="productos" role="tab" data-toggle="tab">
            2. -Productos
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="datos">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group" style="margin-top: 5px;">
                    <label for="">Cédula o Rif</label>
                    <input type="hidden" value="{{ $client->id }}" name="client_id">
                    <input type="text" name="" value="{{ $client->dni }}" class="form-control border-input" readonly="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Nombre o Razón social</label>
                    <input type="text" name="" value="{{ $client->name }}" class="form-control border-input" readonly="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-check">
                      <input  name="address_client" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" v-model="clientAdrress">
                      <label class="form-check-label" for="defaultCheck1">
                        Usar dirección del cliente
                      </label>
                    </div>                                     
                </div>  
            </div>
        </div>

        <div class="row" v-show="clientAdrress">
            <div class="col-md-6">
                <div class="form-group" v-if="client.city">
                    <label for="">Estado</label>
                    {{ Form::text('state', null, ['class' => 'form-control border-input', ':value' => 'client.city.state.name', 'disabled' => 'disabled'])}}
                </div> 
            </div>  

            <div class="col-md-6">
                <div class="form-group" v-if="client.city">
                    <label for="">Ciudad</label>
                    {{ Form::text('state', null, ['class' => 'form-control border-input', ':value' => 'client.city.name', 'disabled' => 'disabled'])}}   
                </div>
            </div>  
        </div>


        <div class="row" v-show="clientAdrress">
            <div class="col-md-12">
                <div class="form-group" v-if="client.address">
                    <label for="">Dirección fiscal</label>
                    {{ Form::textarea('address', null, ['class' => 'form-control border-input', 'rows' => '3', ':value' => 'client.address', 'disabled' => 'disabled']) }}
                </div>
            </div>
        </div>

        <div class="row" v-show="!clientAdrress">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Estado</label>
                    <select name="state_id" id="" class="form-control border-input" v-model="state_id" @change="getCitiesAndMunicipalities()">
                        <option value="">Seleccione</option>
                        <option :value="id" v-for="(state, id) in states">@{{ state }}</option>
                    </select>
                </div>
            </div>  

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Ciudad</label>
                    <select name="city_id" id="city_id" class="form-control border-input" v-model="city_id">
                        <option value="">Seleccione</option>
                        <option :value="c.id" v-for="c in cities">@{{ c.name }}</option>
                    </select>   
                </div>
            </div>  
        </div>

        <div class="row" v-show="!clientAdrress">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Dirección fiscal</label>
                    {{ Form::textarea('address', null, ['class' => 'form-control border-input', 'rows' => '3']) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
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
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" >Forma de envío</label>
                    <select name="payment_id" id="" class="form-control border-input">
                        @forelse($shippings as $id => $shipping)
                            <option value="{{ $id }}">{{ $shipping }}</option>
                        @empty
                            <option value="">No se encontraron resultados</option>
                        @endforelse
                    </select>
                </div>
            </div>
        </div>

        
    </div>

    <div class="tab-pane" id="productos">
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
    </div>
</div>
