<?php

namespace App\Http\Controllers\V1\prueba;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\pruebaRepository;

class pruebaController extends Controller
{
    private $pruebaRepository;

    public function __construct(pruebaRepository $pruebaRepository)
    {
        $this->pruebaRepository = $pruebaRepository;
    }

    public function index(Request $request)
    {
        try {
            $prueba = $this->pruebaRepository->getAll($request);
            return response()->success(compact('pruebas'), "Listado de pruebas");
        } catch (\Exception $e) {
            return response()->error($e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        try {
            $prueba = $this->pruebaRepository->find($id);
            return response()->success(compact('prueba'), "prueba encontrado");
        } catch (\Exception $e) {
            return response()->error($e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $prueba = $this->pruebaRepository->create($data);
            return response()->success(compact('prueba'), "prueba creado");
        } catch (\Exception $e) {
            return response()->error($e->getMessage(), 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $prueba = $this->pruebaRepository->update($id, $data);
            return response()->success(compact('prueba'), "prueba actualizado");
        } catch (\Exception $e) {
            return response()->error($e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $prueba = $this->pruebaRepository->delete($id);
            return response()->success(compact('prueba'), "prueba eliminado");
        } catch (\Exception $e) {
            return response()->error($e->getMessage(), 500);
        }
    }
}
