<?php

namespace App\Repositories;

use App\Contracts\pruebaInterface;
use App\Models\prueba;
use Illuminate\Http\Request;

class pruebaRepository implements pruebaInterface
{
    private $pruebaRepository;

    public function __construct(prueba $prueba)
    {
        $this->pruebaRepository = $prueba;
    }

    /**
     * Retorna todos los registros sin paginación, útil para listas simples
     */
    public function get()
    {
        $query = $this->pruebaRepository->query();
        $query->selectRaw("id as value, name as label");
        return $query->get();
    }

    /**
     * Retorna todos los registros con paginación y soporte para búsqueda
     */
    public function getAll(Request $request)
    {
        $perPage = $request->input('per_page', 15);
        $search = $request->input('search');
        $query = $this->pruebaRepository->query();
        
        // Filtro de búsqueda
        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Paginación
        return $query->paginate($perPage);
    }

    /**
     * Encuentra un registro por su ID
     */
    public function find($id)
    {
        return $this->pruebaRepository->find($id);
    }

    /**
     * Crea un nuevo registro
     */
    public function create(array $data)
    {   
        unset($data["id"]);
        return $this->pruebaRepository->firstOrCreate($data);
    }

    /**
     * Actualiza un registro existente
     */
    public function update($id, array $data)
    {
        $item = $this->pruebaRepository->findOrFail($id);
        $item->update($data);
        return $item;
    }

    /**
     * Elimina un registro por su ID
     */
    public function delete($id)
    {
        $item = $this->pruebaRepository->findOrFail($id);
        $item->delete();
        return $item;
    }
}
