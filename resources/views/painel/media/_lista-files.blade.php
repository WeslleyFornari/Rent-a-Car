@foreach($files as $file)
								<li class="">
									@if(in_array($file->type,['jpg','png','gif','tif']))
									<a href=""><img src="{{asset($file->folder_parent.$file->folder.$file->file)}}" alt=""></a>
									
									@else
									<a href="" style="width: 130px; height: 85px;">
										<i class="fa fa-file fa-4x"></i>
									</a>
									
									@endif
									<hr class="m-all-xs">
									<div class="row">
									<div class="col-sm-6 text-left"><input type="checkbox" name="file[]"  class="checkFile"  value="{{$file->id}}"></div>
									<div class="col-sm-6  text-right pull-right"><button class="btn btn-danger btn-xs removeImg" data-id="{{$file->id}}"><i class="fa fa-trash"></i></button></div>
									</div>
									
								</li>
								@endforeach