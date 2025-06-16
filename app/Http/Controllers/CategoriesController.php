<?php

namespace App\Http\Controllers;

use App\Models\Category;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Str; // من احل التوايغ الخاصة بالنصوص


class CategoriesController extends Controller
{
    //Action 
    public function index()
    {
        // DB::table('categories')->insert([
        //     'name' => 'laravel',
        //     'slug'=>'sleug',
        //     'parent_id' => 1,
        //     'description' =>'null',
        //     'art_path' => 'null',

        // ]);
        // DB::table('categories')->delete();

        $category = Category::get();



        if ($category == null) {
            abort(404);
        }

       return view('categories.index',[
        'categories' => $category,
        
       ]);
    }

    public function show($id)
    {

        $category = Category::where('id', '=', $id)->get();

        // note: $category=$categories1


        //$category = Category::find($id);//errors because the function first()


        if ($category == null) {
            return  print('The psge is not exist');

            // abort(404);
        }



        return response()->json($category);
    }

    public function create()
    {
        $parents = Category::all();
        return view('categories.create', compact('parents'));
    }

    public function store(Request $request)
    {   //اختصارات للوصول لقيمة الحقل المرسل

        // dd($request->name,
        //  $request->input('name')
        //     ,$request->post('name') // تجيب البيانات من البوست ميثود
        //    ,$request->get('name')
        //     ,$request['name'],
        //     $request->query('name')// تجيب البيانات من الرابط(بغد علامة الاستفهام )
        // );
        $clean = $request->validate([  //validation
            // 'name'=>'required|string|max:255|between:2,255'  ,
            'name' => ['string', 'required', 'between:2,255'],
            'parent_id' => ['nullable', 'int', 'exists:categories,id'],
            'description' => ['nullable', 'string'],
            'art_file' => ['nullable', 'image'], //'mimes":png,jpg,'file''

        ]);
        // dd($clean);||$clean['name] بجيب البيانات الي عملتلها تحقق والي ماعملتلها نقدر نجيبها بالريكويست الي تحت
        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_id');
        $category->slug = Str::slug($category->name); // من احل عمليات البحث
        $category->save();
        //PRG
        return redirect('/categories{id}')->with('success', 'Success created!');
        // DB::table('caregories')-> insert([]);

    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit ', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_id');
        $category->slug = Str::slug($category->name); // من احل عمليات البحث
        $category->save();
        return redirect('/categories')->with('success', 'Success Updated!');
    }

    public function destroy($id)
    {
        Category::where('id', '=', $id)->delete();
        //DB::table('categories')->where('id','=',$id)->delete();
        // Category::where('id',$id)->delete();
        // Category::destroy($id);
        // $category=Category::findOrFail($id);
        // $category->delete();
        return redirect('categories/create')->with('success', 'Success Deleted!');
    }
}
