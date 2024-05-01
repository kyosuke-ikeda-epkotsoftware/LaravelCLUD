<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Plan;
use App\Models\Sauna;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::orderBy('id')->paginate(2);
        return view(
            'admin.plans.index',
            compact('plans')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanRequest $request)
    {
        $plan = Plan::create([
            'name' => $request->name,
            'prefecture' => $request->prefecture
        ]);
        return redirect(
            route('admin.plans.index', ['plan' => $plan])
        )->with('messages.success', '新しい施設の登録が完了しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $name = $plan->name;
        $plan->delete();
        $newPlan = Sauna::create(['name' => $name]);
        return redirect(route('admin.saunas.show', ['sauna' => $newPlan])
        )->with('success', '評価やコメント等を編集ボタンより登録して下さいね。');
    }
}
