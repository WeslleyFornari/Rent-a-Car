<div class="col-sm-12 row_sup">
								<div class="col-sm-4 p-left-0">
									<div class="form-group">
										<label for="">Tipo formação:</label>
										<select name="formacao_especializacao[tipo_curso][]" id="tipo_curso" class="form-control btn-flat">
											<option value="">Selecione</option>
											@foreach($cursosFormacao as $key=>$val)
											<option value="{{$val}}" @if($value->tipo_curso == $val) selected @endif   >{{$val}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-sm-4 p-left-0">
									<div class="form-group">
										<label for="">Curso em:</label>
										<input type="text" class="form-control btn-flat" name="formacao_especializacao[curso][]" value="{{$value->curso}}">
									</div>
								</div>
								<div class="col-sm-4 p-left-0">
									<div class="form-group">
										<label for="">Instituição de Ensino:</label>
										<input type="text" class="form-control btn-flat" name="formacao_especializacao[instituicao][]" value="{{$value->instituicao}}">
									</div>
								</div>
								<div class="col-sm-4 p-left-0">
									<div class="form-group">
										<label for="">Status</label>
										<select name="formacao_especializacao[status][]" id="tipo_curso" class="form-control btn-flat">
											<option value="">Selecione</option>
											<option value="Cursando" @if($value->status == "Cursando") selected @endif >Cursando</option>
											<option value="Concluído" @if($value->status == "Concluído") selected @endif >Concluído</option>
										</select>
									</div>
								</div>
							<div class="col-sm-4 p-left-0">
								<div class="form-group">
									<label for="">Data Conclusão:</label>
									<input type="text" class="form-control btn-flat mm-aaaa" name="formacao_especializacao[data_conclusao][]" placeholder="MM/AAAA"  value="{{$value->data_conclusao}}">
								</div>
							</div>
							<div class="col-sm-4" >
								<div class="clear hidden-xs m-top-lg" ></div>
									<a href="" class="btn btn-xs btn-flat btn-danger btRemoveFormacao" ><i class="fa fa-minus"></i> Remover Formação</a>
								</div>
							</div>