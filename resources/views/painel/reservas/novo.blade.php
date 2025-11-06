@extends('layouts.painel')
@section('title')
Home | Novo Usuário
@stop

@section('content')

<section class="content-header p-all-0 m-top-md">
                    <h1 class="col-sm-6">Cadastrar Grupo</h1>
                    <div class="col-sm-6">
                    <div class="list-action">
                      <ul>
                        <li><button type="button" class="btn btn-flat btn-default">Sair</button></li>
                        <li><button type="button" class="btn btn-flat btn-primary">Salvar e Sair</button></li>
                        <li><button type="button" class="btn btn-flat btn-success">Salvar</button></li>
                      </ul>
                    </div>
              </div>
    <div class="clearfix"></div>
  </section>


<div class="panel">
  <div class="panel-heading">
    
     <h2 class="panel-title"><strong></strong></h2> 
    
  </div>
  <div class="panel-body">
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-12">
          <h4>
            <input type="radio" name="iCheck" class="flat-green" checked> Pessoa Física 
            <input type="radio" name="iCheck" class="flat-green"> Pessoa Jurídica
          </h4>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label for="">Empresa</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="">Telefone</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="">Celular</label>
            <input type="text" class="form-control">
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label for="">CEP</label>
            <input type="text" class="form-control cepMask">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="">Endereço</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-sm-1">
          <div class="form-group">
            <label for="">Número</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label for="">Bairro</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="">Complemento</label>
            <input type="text" class="form-control">
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label for="">Cidade</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-sm-1">
          <div class="form-group">
            <label for="">UF</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label for="">Data Inicio</label>
            <input type="text" class="form-control dataMask">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label for="">Hora Inicio</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label for="">Data Termino</label>
            <input type="text" class="form-control dataMask">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label for="">Hora Termino</label>
            <input type="text" class="form-control">
          </div>
        </div>                                 
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label for="">Grupo</label>
              <select name="" id="" class="form-control">
               <option value="">Grupo A</option>
               <option value="">Grupo B</option>
               <option value="">Grupo C</option>
             </select>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="">Veículo</label>
            <input type="text" class="form-control">
          </div>
        </div>  
        <div class="col-sm-3">
          <div class="form-group">
            <label for="">Final Placa</label>
            <input type="text" class="form-control">
          </div>
        </div>  
        <div class="col-sm-3">
          <div class="form-group">
            <label for="">Cor</label>
            <input type="text" class="form-control">
          </div>
        </div>  

      </div>      
    </div>

  </div>
</div>

@endsection

@section('pos-script')

@endsection