<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeBudget;

class HomebudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home_budgets = HomeBudget::with('category')->orderBy('date', 'desc')->paginate(5);
        $income = $home_budgets->where('category_id', 6)->sum('price');
        $payment = $home_budgets->where('category_id', '!=', 6)->sum('price');

        return view('homebudget.index', compact('home_budgets', 'income', 'payment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric'
        ]);

        $result = HomeBudget::create([
            'date' => $request->date,
            'category_id' => $request->category,
            'price' => $request->price,
        ]);

        if (!empty($result)) {
            session()->flash('flash_message', '支出を登録しました。');
        } else {
            session()->flash('flash_error_message', '支出を登録できませんでした。');
        }

        return redirect('/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $home_budget = HomeBudget::find($id);

        return view('homebudget.edit', compact('home_budget'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric'
        ]);

        $result = HomeBudget::where('id', $id);
        if ($result->exists()) {
            $result->update([
                'date' => $request->date,
                'category_id' => $request->category,
                'price' => $request->price,
            ]);

            session()->flash('flash_message', '支出を更新しました。');
        } else {
            session()->flash('flash_error_message', '支出を更新できませんでした。');
        }

        return redirect('/index');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $home_budget = HomeBudget::find($id);
        $home_budget->delete();
        session()->flash('flash_message', '支出を削除しました。');
        
        return redirect('/index');
    }
}
