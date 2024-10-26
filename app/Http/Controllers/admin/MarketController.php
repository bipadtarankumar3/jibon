<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Market;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use League\CommonMark\Node\Block\Document;

class MarketController extends Controller
{
    // public function makret_list(){

    //     $data['Market'] = Market::get();

    //     return view('admin.pages.market.add_market',$data);
    // }

    // Display the list of markets
    public function markets()
    {
        $markets = Market::all();
        return view('admin.pages.market.add_market', compact('markets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Market::create([
            'market_name' => $request->name,
        ]);

        return redirect()->route('admin.markets.index')->with('success', 'Market created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $market = Market::findOrFail($id);
        $market->update([
            'market_name' => $request->name,
        ]);

        return redirect()->route('admin.markets.index')->with('success', 'Market updated successfully.');
    }

    public function destroy($id)
    {
        $market = Market::findOrFail($id);
        $market->delete();

        return redirect()->route('admin.markets.index')->with('success', 'Market deleted successfully.');
    }

}
