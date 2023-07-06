<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductoFormRequest;
use App\Models\Producto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{

    public function index(Request $request){
        $texto=trim($request->get('texto'));
        $productos=DB::table('productos as a')
            ->join('categoria as c','a.id_categoria','=','c.id_categoria')
            ->select('a.id_producto','a.nombre','a.codigo','a.stock','c.categoria as categoría','a.descripcion','a.imagen','a.estatus')
            ->where('a.nombre','LIKE','%'.$texto.'%')
            ->orwhere('a.codigo','LIKE','%'.$texto.'%')
            ->orderBy('id_producto','desc')
            ->paginate(10);
        return view('almacen.producto.index', compact('productos','texto'));
    }

    public function create(){
        $categorias=DB::table('categoria')->where('estatus','=','1')->get();
        return view('almacen.producto.create',['categorias'=>$categorias]);
    }

    public function store(ProductoFormRequest $request){
        $producto=new Producto;
        $producto->id_categoria=$request->input('id_categoria');
        $producto->codigo=$request->input('codigo');
        $producto->nombre=$request->input('nombre');
        $producto->stock=$request->input('stock');
        $producto->descripcion=$request->input('descripcion');
        $producto->estatus='Activo';

        if($request->hasFile("imagen")){
            $imagen=$request->file("imagen");
            $nombreImagen=Str::slug($request->nombre).".".$imagen->guessExtension();
            $ruta=public_path("/imagenes/productos/");

            copy($imagen->getRealPath(),$ruta.$nombreImagen);
            $producto->imagen=$nombreImagen;
        }

        $producto->save();
        return redirect()->route('producto.index');
        
    }

    public function edit($id){
        $producto=Producto::findOrFail($id);
        $categorias=DB::table('categoria')->where('estatus','=','1')->get();
        return view("almacen.producto.edit",["producto"=>$producto,"categorias"=>$categorias]);
    }

    public function update(ProductoFormRequest $request, $id){
        $producto=Producto::findOrFail($id);
        $producto->id_categoria=$request->input('id_categoria');
        $producto->codigo=$request->input('codigo');
        $producto->nombre=$request->input('nombre');
        $producto->stock=$request->input('stock');
        $producto->descripcion=$request->input('descripcion');
        $imagenAnterior = $producto->imagen;

        
        
        if($request->hasFile("imagen")){
            $imagen=$request->file("imagen");
            $nombreImagen=Str::slug($request->nombre).".".$imagen->guessExtension();
            $ruta=public_path("/imagenes/productos/");
            copy($imagen->getRealPath(),$ruta.$nombreImagen);
            $producto->imagen=$nombreImagen;
            if (!empty($imagenAnterior)) {
                $rutaImagenAnterior = public_path("/imagenes/productos/") . $imagenAnterior;
                if (file_exists($rutaImagenAnterior)) {
                    unlink($rutaImagenAnterior);
                }
            }
        }

        $producto->update();
        return redirect()->route('producto.index');
    }

    public function destroy($id){
        $producto=Producto::findOrFail($id);
        $producto->estatus='Inactivo';
        $producto->update();
        return redirect()->route('producto.index');
    }
}