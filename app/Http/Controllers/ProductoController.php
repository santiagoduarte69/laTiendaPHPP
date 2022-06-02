<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Seleccionar todos los productos de la bd
        $productos = Producto::all();
        // Mostrar el catalogo de productos llevandole la lista del producto
        return view('productos.index')->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //selección de todoas las marcas
        $marcas = Marca::all();
        //selección de todas las categorias
        $categorias = Categoria::all();
        //mostrar la vista,
        //con los marcas y categorias
        return view('productos.new')
                    ->with('marcas', $marcas)
                    ->with('categorias' , $categorias);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {

        //establecer reglas de validacion que apliquen a cada campo
        $reglas =[
            "nombre" => 'required|alpha',
            "desc" => 'required|min:20|max:50',
            "precio" => 'required|numeric',
            "marca" => 'required',
            "categoria" => 'required',
            "imagen" => 'required|image'
        ];

        //mensajes:
        $mensajes = [
            "required" => "campo obligatorio",
            "alpha" => "solo letras",
            "min" => "minimo 20 caracteres",
            "max" => "maximo 50 caracteres",
            "numeric" => "solo numeros",
            "image" => "Solo archivos de imagenes"
        ];

        //crear el objeto validador
        $v = Validator::make($r->all() , $reglas, $mensajes);
        //3.
        //validar la input data
        if($v->fails()){
            //validación fallida
            //redireccionar al formulario
            return redirect('producto/create')
                    ->withErrors($v)
                    ->withInput();
        }else{
            // Acceder a propiedades del archivo cargado
            $archivo = $r->imagen;
            $nombre_archivo = $archivo->getClientOriginalName();

            // Establecer la ubicacion donde se almacenara el archivo
            $ruta=public_path()."/img";

            // Mover el archivo
            $archivo->move($ruta, $nombre_archivo);

            //validación correcta
            $p = new Producto;
            // asignamos valores a los atributos del producto
            $p->nombre = $r->nombre;
            $p->desc = $r->desc;
            $p->precio = $r->precio;
            $p->categoria_id = $r->categoria;
            $p->marca_id = $r->marca;
            $p->imagen = $nombre_archivo;

            //guardar en db
            $p->save();
            return redirect('producto/create')
                ->with('mensajito', "producto registrado");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        echo "aqui van los detalles de producto con id: $producto ";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        echo "aqui va a ir el formulario para actualizar el prod: $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
