<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchSaunaRequest;
use App\Http\Requests\StoreSaunaRequest;
use App\Http\Requests\UpdateSaunaRequest;
use App\Models\Sauna;
use Illuminate\Support\Facades\Storage;

class SaunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saunas = Sauna::orderBy('id')->paginate(5);
        return view('admin.saunas.index',compact('saunas')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.saunas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSaunaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaunaRequest $request)
    {
        $img = $request->file('img_path');
        if (isset($img)) {
            $path = $img->store('img','public');
            if ($path) {
                $sauna = Sauna::create([
                'name' => $request->name,
                'bath' => $request->bath,
                'sauna' => $request->sauna,
                'outdoor' => $request->outdoor,
                'evaluation' => $request->evaluation,
                'comment' => $request->comment,
                'img_path' => $path
                ]);
            }
        }
        return redirect(
            route('admin.saunas.show', ['sauna' => $sauna])
        )->with('success', '新しい施設の登録が完了しました。');
    }

    public function search(SearchSaunaRequest $request)
    {

         /* テーブルから全てのレコードを取得する */
           $saunas= Sauna::query();

        /* キーワードから検索処理 */
        $keyword = $request->input('keyword');
        if (!empty($keyword)) {//$keyword　が空ではない場合、検索処理を実行します
            $saunas->where('name', 'LIKE', "%{$keyword}%");
        }

        /* ページネーション */
        $saunas = $saunas->paginate(5);

        return view('admin.saunas.index', ['saunas' => $saunas]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sauna  $sauna
     * @return \Illuminate\Http\Response
     */
    public function show(Sauna $sauna)
    {
        return view('admin.saunas.show', [
            'sauna' => $sauna,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sauna  $sauna
     * @return \Illuminate\Http\Response
     */
    public function edit(Sauna $sauna)
    {
        return view('admin.saunas.edit',[
            'sauna' => $sauna,
        ]);
    }

    public function confirm(UpdateSaunaRequest $request, Sauna $sauna)
    {
        $sauna->name = $request->name;
        $sauna->bath = $request->bath;
        $sauna->sauna = $request->sauna;
        $sauna->outdoor = $request->outdoor;
        $sauna->evaluation= $request->evaluation;
        $sauna->comment = $request->comment;
        return view('admin.saunas.confirm', [
            'sauna' => $sauna,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaunaRequest  $request
     * @param  \App\Models\Sauna  $sauna
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaunaRequest $request, Sauna $sauna)
    {
        $img_path=$sauna->img_path;
        $data=[
                'name' => $request->name,
                'bath' => $request->bath,
                'sauna' => $request->sauna,
                'outdoor' => $request->outdoor,
                'evaluation' => $request->evaluation,
                'comment' => $request->comment,
        ];

        if ($request->hasFile('img_path')) {
            if ($img_path !=='' && !is_null($img_path)) {
                Storage::disk('public')->delete($img_path);
            }
            $path=$request->file('img_path')->store('img_path','public');
            $data['img_path']=$path;
        }
        $sauna->update($data);
        return redirect()
        ->route('admin.saunas.show', ['sauna' => $sauna])
        ->with('success', '更新が完了しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sauna  $sauna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sauna $sauna)
    {
        $sauna->delete();
        return redirect(route('admin.saunas.index'));
    }
}
