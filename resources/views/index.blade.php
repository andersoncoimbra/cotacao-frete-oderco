<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Oderço Cotações</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    </head>
    <body>
        <div class="content">
            <div class="row justify-content-md-center">
                <div class="col-5">
                    <div class="card">
                        <div class="card-header">
                            <h3>Cadastro de cotações de frete</h3>
                        </div>
                        <div class="card-body">
                            <form id="form1">
                                <div class="form-group">
                                    <label for="transportadora_id">Transpotadora</label>
                                    <select name="transportadora_id" id="transportadora_id" class="form-select">
                                        <option value="">Selecione a Transportadora</option>
                                        @foreach($transportadoras as $transportadora)
                                            <option value="{{ $transportadora->id }}">{{ $transportadora->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="uf">UF</label>
                                    <select name="uf" id="uf" class="form-select">
                                        <option value="">Selecione a UF</option>
                                        <!-- UF dos Estados Brasileiros -->
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AM</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="MG">MG</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SP">SP</option>
                                        <option value="SE">SE</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="percentual_cotacao">Percentual Cotação</label>
                                    <input type="text" name="percentual_cotacao" id="percentual_cotacao" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="valor_extra">Valor Extra</label>
                                    <input type="text" name="valor_extra" id="valor_extra" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-header">
                            <h3>Cotar Frete</h3>
                        </div>
                        <div class="card-body">
                            <form id="form2">
                                <div class="form-group">
                                    <label for="uf">UF</label>
                                    <select name="uf" id="uf" class="form-select">
                                        <option>Selecione uma UF</option>
                                        @foreach ($ufs as $uf)
                                            <option value="{{ $uf->uf }}">{{ $uf->uf }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="valor_pedido">Valor Pedido</label>
                                    <input type="text" name="valor_pedido" id="valor_pedido" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Cotar</button>
                            </form>
                            <span>Melhores Valores</span>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Transpotadora</th>
                                        <th>Valor Cotação</th>
                                    </tr>
                                </thead>
                                <tbody id="melhores">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-10">
                    <div class="card">
                        <div class="card-header">
                            <h3>Cotações</h3>
                        </div>
                        <div class="card-body">
                            <table id="cotacoes" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>UF</th>
                                        <th>Percentual Cotação</th>
                                        <th>Valor Extra</th>
                                        <th>Transportadora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <!-- Scripts -->
        <!-- Carregar cotações -->
        <script>
            $(document).ready(function() {
                $.ajax({
                    url: '{{ route('cotacoes') }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        $.each(data, function(key, value) {
                            html += '<tr>';
                            html += '<td>' + value.id + '</td>';
                            html += '<td>' + value.uf + '</td>';
                            html += '<td>' + value.percentual_cotacao + '</td>';
                            html += '<td>' + value.valor_extra + '</td>';
                            html += '<td>' + value.transportadora_id + '</td>';
                            html += '</tr>';
                        });
                        $('#cotacoes tbody').html(html);
                    },
                    error: function(data) {
                        $('#cotacoes tbody').html("Sem dados");
                    }
                });
            });
        </script>

        <!-- Script Cadastrar frete -->
        <script>
            $('#form1').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var formData = form.serialize();
                $.ajax({
                    url: '{{ route('cotacoes.store') }}',
                    type: 'POST',
                    data: formData,
                    success: function(data) {
                        console.log(data);
                        $('.table tbody').html('Carregando...');
                        $.ajax({
                            url: '{{ route('cotacoes') }}',
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                var html = '';
                                $.each(data, function(key, value) {
                                    html += '<tr>';
                                    html += '<td>' + value.id + '</td>';
                                    html += '<td>' + value.uf + '</td>';
                                    html += '<td>' + value.percentual_cotacao + '</td>';
                                    html += '<td>' + value.valor_extra + '</td>';
                                    html += '<td>' + value.transportadora_id + '</td>';
                                    html += '</tr>';
                                });
                                $('.table tbody').html(html);
                            }
                        });
                    },
                    error: function(data) {
                       alert('Erro ao salvar' + data);
                    }
                });
            });
        </script>
        <!-- Script para cotar frete -->
        <script>
            $('#form2').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var formData = form.serialize();
                $.ajax({
                    url: '{{ route('cotacoes.cotar') }}',
                    type: 'PUT',
                    data: formData,
                    success: function(data) {
                        console.log(data);
                        $('#melhores').html('Carregando...');
                        var html = '';
                                var contador = 1;
                                $.each(data, function(key, value) {
                                    html += '<tr>';
                                    html += '<td>' + contador + '</td>';
                                    html += '<td>' + value.transportadora + '</td>';
                                    html += '<td>' + value.valor + '</td>';
                                    html += '</tr>';
                                    contador++;
                                });
                        $('#melhores').html(html);
                    },
                    error: function(data) {
                       alert('Erro ao Cotar' + data);
                    }
                });
            });
        </script>
    </body>
</html>
