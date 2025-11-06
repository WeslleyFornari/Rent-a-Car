<?php

namespace RW940cms\Http\Controllers\Painel;

use Illuminate\Http\Request;
use RW940cms\Repositories\FormContatoRepository;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;


class FaleConoscoController extends Controller
{
    public function __construct(
        FormContatoRepository $formcontatoRepository){
         $this->formcontatoRepository = $formcontatoRepository;
       
        
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = $this->formcontatoRepository->scopeQuery(function($query){
    return $query->orderBy('created_at','desc');
})->paginate(10);
        $prevPage = $this->formcontatoRepository->prevPage();
        $nextPage = $this->formcontatoRepository->nextPage();
        return view("painel.fale_conosco.index",compact('contatos','prevPage','nextPage'));      
    }


    public function store(Request $request)
    {
       $this->formcontatoRepository->create($request->all());
        return response()->json(['status'=>'enviado']);   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ler($id){
        $this->formcontatoRepository->update(['lido'=>1],$id);
        $ler = $this->formcontatoRepository->find($id);

        $contatos = $this->formcontatoRepository->scopeQuery(function($query){
                        return $query->orderBy('created_at','desc');
                    })->paginate(10);
        $prevPage = $this->formcontatoRepository->prevPage();
        $nextPage = $this->formcontatoRepository->nextPage();

        return view("painel.fale_conosco.index",compact('contatos','ler','prevPage','nextPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
    $data = $request->all();
       foreach ($data['contato'] as $key => $value) {
           $this->formcontatoRepository->delete($value);
       }
       return redirect()->route('admin.fale-conosco.index');   
    }
    public function deleteItem($id)
    {
       
        $this->formcontatoRepository->delete($id);
        return redirect()->route('admin.fale-conosco.index');   
    }
}
