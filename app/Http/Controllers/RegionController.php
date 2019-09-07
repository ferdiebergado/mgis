<?php

namespace App\Http\Controllers;

use App\Region;
use App\Repositories\Region\RegionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegionController extends Controller
{
    protected $region;
    protected $success;
    protected $rules;

    /**
     * Class constructor.
     */
    public function __construct(RegionRepositoryInterface $region)
    {
        $this->region = $region;
        $this->success = __('messages.success');
        $this->rules = [
            'name' => 'required|string|max:50',
            'sequence' => 'required|integer|min:1',
            'area' => 'required|string|size:1|in:L,V,M',
            'active' => 'boolean'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $regions = $this->region->all();
        // if ($request->ajax()) {
        //     return $regions;
        // }

        return view('region.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('region.partial', ['region' => new \App\Region(), 'action' => 'store']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $this->region->firstOrCreate($request->only(['name', 'sequence', 'area', 'active']));

        return redirect()->route('regions.index')->withMessage($this->success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        return view('region.partial', ['region' => $this->region->findOneOrFail($region->id), 'action' => 'update']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'sequence' => 'required|integer|min:1',
            'area' => 'required|string|size:1|in:L,V,M'
        ]);

        $this->region->update($request->only(['name', 'sequence', 'area']), $region->id);

        return redirect()->route('regions.index')->withMessage($this->success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        $region = $this->region->findOneOrFail($region->id);
        $region->delete($region->id);

        return redirect()->back()->withMessage($this->success);
    }
}
