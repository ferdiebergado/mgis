<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreRegionRequest;
use App\Repositories\Region\RegionRepositoryInterface;

class RegionController extends Controller
{
    /**
     * The Region Repository.
     * @var \App\Repositories\Region\RegionRepositoryInterface
     */
    protected $region;

    /**
     * The success message.
     * @var string
     */
    protected $success;

    /**
     * Class constructor.
     */
    public function __construct(RegionRepositoryInterface $region)
    {
        $this->region = $region;
        $this->success = __('messages.success');
        $this->authorizeResource(Region::class, 'region');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            return $this->region->allWithCount()->get()->toArray();
        }

        return view('region.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('region.partial', ['region' => new Region, 'action' => 'store']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegionRequest $request)
    {
        $active = $request->has('active');

        $request->merge(compact('active'));

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
        $region = $this->region->findOneOrFail($region->id);
        return view('region.partial', ['region' => $region, 'action' => 'update']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRegionRequest $request, Region $region)
    {
        $active = $request->has('active');

        $request->merge(compact('active'));

        $this->region->update($request->only(['name', 'sequence', 'area', 'active']), $region->id);

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
        return $this->region->delete($region->id);
    }
}
