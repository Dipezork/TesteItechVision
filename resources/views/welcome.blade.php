@extends('default.template')

@section('content')

<form id="frmAccessList">
    @csrf
    {{--<input type="hidden" name="_token" id="_token" value="XXXXXXXXXXXXXXXXXXXXXXXXXXXXX">--}}
    <label for="group">Grupo</label>
    <select name="group" id="group" required="">
        <option value="">-</option>
        <option value="1">Grupo 1 </option>
        <option value="1">Grupo 2 </option>
    </select>
    <label for="id_user_authorization">Autorizado por:</label>
    <select name="id_user_authorization" id="id_user_authorization" required="">
        <option value="">-</option>
        <option value="1">João da Silva </option>
        <option value="2">Pedro Souza </option>
    </select>
    <label>Placa do veículo</label>
    <input type="plate" id="plate" placeholder="Placa" name="plate" required="" maxlength="8">
    <label for="is_permanent">Liberação permanente?</label>
    <input type="checkbox" id="is_permanent" name="is_permanent" value="1">
    <label>Entrada</label>
    <input type="text" id="start_date" name="start_date" placeholder="Data de entrada" required>
    <label>Saída</label>
    <input type="text" id="end_date" name="end_date" placeholder="Data de saída" value="" required="">
    <label>Descrição</label>
    <textarea rows="3" id="description" name="description" placeholder="Descrição"></textarea>
    <button type="submit">Salvar</button>
</form>

@endsection

@push('script')
    <script>
        $(document).ready(function()
        {
            $('#frmAccessList').submit( function(e) {

                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: 'user',
                    data: $(this).serialize(),
                    success: function(data) {
                    console.log(data)
                    },
                    error: function(data) {
                    console.log('erro');
                    }
                });
            });
        });
    </script>
@endpush

